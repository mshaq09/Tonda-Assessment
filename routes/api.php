<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\RecommendationController;


Route::get('/test', function () {
    return response('Test API', 200)
                  ->header('Content-Type', 'application/json');
});

// Media Upload Endpoints
Route::post('/media/upload', [MediaController::class, 'upload']);

// Recommendation Endpoints
Route::get('/recommendations/{user_id}', [RecommendationController::class, 'getRecommendations']);