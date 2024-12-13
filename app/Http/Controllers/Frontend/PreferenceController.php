<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    public function store(Request $request)
    {
        session(['preferences' => $request->all()]);

        return redirect()->route('home');
    }
}
