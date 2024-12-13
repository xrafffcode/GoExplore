<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TourGuide;
use Illuminate\Http\Request;

class TourGuideController extends Controller
{
    public function index()
    {
        return view('pages.frontend.tour-guide.index');
    }

    public function show($slug)
    {
        $guide = TourGuide::where('slug', $slug)->firstOrFail();

        return view('pages.frontend.tour-guide.show', compact('guide'));
    }
}
