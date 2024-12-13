<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\PlaceCategory;
use App\Models\TourGuide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Ambil preferensi dari session
        $preferences = session('preferences');

        $query = Place::query();

        // Filter berdasarkan budget_min
        if (!empty($preferences['budget_min'])) {
            $query->where('price', '>=', $preferences['budget_min']);
        }

        // Filter berdasarkan budget_max
        if (!empty($preferences['budget_max'])) {
            $query->where('price', '<=', $preferences['budget_max']);
        }

        // Filter berdasarkan category
        if (!empty($preferences['categories'])) {
            $query->whereHas('placeCategory', function ($q) use ($preferences) {
                $q->whereIn('id', $preferences['categories']);
            });
        }

        // Ambil hasil dari query
        $places = $query->get();

        // Jika tidak ada hasil, ambil semua data
        if ($places->isEmpty()) {
            $places = Place::all();
        }

        // Ambil kategori yang ditampilkan
        $featuredCategories = PlaceCategory::where('is_featured', true)->get();
        $categories = PlaceCategory::where('is_featured', false)->get();

        // Ambil data tour guide
        $guides = TourGuide::all();

        return view('pages.frontend.home', compact('featuredCategories', 'categories', 'places', 'guides', 'preferences'));
    }
}
