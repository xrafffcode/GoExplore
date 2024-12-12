<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
        'name',
        'slug',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function places()
    {
        return $this->hasMany(Place::class);
    }
}
