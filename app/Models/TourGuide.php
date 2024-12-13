<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourGuide extends Model
{
    use HasFactory;

    protected $fillable = [
        'place_id',
        'image',
        'name',
        'slug',
        'description',
        'phone',
        'total_guides',
        'total_years'
    ];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
