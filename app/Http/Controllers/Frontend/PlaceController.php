<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
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

        if ($request->has('keyword')) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        // Ambil hasil dari query
        $recomendations = $query->get();

        // Jika tidak ada hasil, ambil semua data
        if ($recomendations->isEmpty()) {

            if ($request->has('keyword')) {
                $recomendations = Place::where('name', 'like', '%' . $request->keyword . '%')->get();
            } else {
                $recomendations = Place::all();
            }
        }


        $places = Place::query();

        // Filter berdasarkan category
        if ($request->has('category')) {
            $places->whereHas('placeCategory', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        // Filter berdasarkan keyword
        if ($request->has('keyword')) {
            $places->where('name', 'like', '%' . $request->keyword . '%');
        }

        // Ambil hasil dari query
        $places = $places->get();

        return view('pages.frontend.place.index', compact('places', 'recomendations'));
    }

    public function show($slug)
    {
        $place = Place::where('slug', $slug)->firstOrFail();

        return view('pages.frontend.place.show', compact('place'));
    }
}
