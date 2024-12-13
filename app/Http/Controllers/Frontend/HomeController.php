<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\PlaceCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredCategories = PlaceCategory::where('is_featured', true)->get();
        $categories = PlaceCategory::where('is_featured', false)->get();
        $destinations = Place::all();

        return view('pages.frontend.home', compact('featuredCategories', 'categories', 'destinations'));
    }
}
