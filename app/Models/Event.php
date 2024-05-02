<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'popularity',
        // Add more fields as needed
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Define other relationships as needed

    public static function recommendEvents($userPreferences, $interestedEvents, $selectedFilters)
    {
        // Fetch events based on user preferences, interested events, and selected filters
        $recommendedEvents = self::whereIn('category_id', $userPreferences)
                                  ->orWhereIn('id', $interestedEvents)
                                  ->orWhereIn('filter_id', $selectedFilters)
                                  ->orderBy('popularity', 'desc')
                                  ->take(3)
                                  ->get();

        return $recommendedEvents;
    }
}