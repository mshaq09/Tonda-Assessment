<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        // Add more fields as needed
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
