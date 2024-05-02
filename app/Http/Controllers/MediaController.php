<?php
namespace App\Http\Controllers;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class MediaController extends BaseController
{
    public function upload(Request $request) {
        $uploadedImages = [];
    
        // Validate incoming requests
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust max file size as needed
        ]);
    
        try {
            // Loop through each uploaded image
            foreach ($request->file('images') as $image) {
                // Generate unique filename to prevent conflicts
                $filename = Str::random(20) . '_' . time() . '.' . $image->getClientOriginalExtension();
    
                // Store the original image
                $originalPath = $image->storeAs('uploads/original', $filename);
    
                // Resize and save thumbnail (e.g., 100x100)
                $thumbnailPath = 'uploads/thumbnails/' . $filename;
                $thumbnailUrl = $this->resizeAndSaveToS3($image->getPathname(), $thumbnailPath, 100, 100);
    
                // Resize and save preview (e.g., 500x500)
                $previewPath = 'uploads/previews/' . $filename;
                $previewUrl = $this->resizeAndSaveToS3($image->getPathname(), $previewPath, 500, 500);
    
                // Resize and save full size (no resizing)
                $fullSizePath = 'uploads/fullsize/' . $filename;
                $fullSizeUrl = $this->resizeAndSaveToS3($image->getPathname(), $fullSizePath, null, null); // No resizing
    
                // Store the resized image URLs in an object
                $uploadedImages[] = (object) [
                    'original_url' => $originalPath,
                    'thumbnail_url' => $thumbnailUrl,
                    'preview_url' => $previewUrl,
                    'full_size_url' => $fullSizeUrl,
                ];
            }
    
            // Return uploaded image URLs as a response
            return response()->json(['uploaded_images' => $uploadedImages], 200);
        } catch (\Exception $e) {
            // Handle any errors that occur during the upload process
            return response()->json(['error' => 'An error occurred during image upload.'], 500);
        }
    }
    
    private function resizeAndSaveToS3($sourceImagePath, $destinationPath, $width, $height) {

        // Create Image Manager with Desired Driver
        $manager = new ImageManager(new Driver());

        // Read Image from File System
        $image = $manager->read($sourceImagePath);

        // Resize Image Proportionally
        $image->scale($width, $height);

        // encode edited image
        $resizedImage = $image->encode();
    
        // Save resized image to Amazon S3
        Storage::disk('s3')->put($destinationPath, $resizedImage);
    
        // Return the URL of the saved image
        return Storage::disk('s3')->url($destinationPath);
    }

}