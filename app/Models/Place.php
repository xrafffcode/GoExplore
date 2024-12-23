<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'place_category_id',
        'image',
        'name',
        'slug',
        'description',
        'price',
        'phone',
        'address',
        'latitude',
        'longitude',
    ];

    public function placeCategory()
    {
        return $this->belongsTo(PlaceCategory::class);
    }

    public function tourGuides()
    {
        return $this->hasMany(TourGuide::class);
    }
}
