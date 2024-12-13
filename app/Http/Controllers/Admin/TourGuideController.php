<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TourGuideStoreRequest;
use App\Http\Requests\TourGuideUpdateRequest;
use App\Models\Place;
use App\Models\TourGuide;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class TourGuideController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('tour-guide-view'), only: ['index', 'show']),
            new Middleware(PermissionMiddleware::using('tour-guide-create'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('tour-guide-update'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('tour-guide-delete'), only: ['destroy']),
        ];
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guides = TourGuide::all();

        return view('pages.admin.tour-guide.index', compact('guides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $places = Place::all();

        return view('pages.admin.tour-guide.create', compact('places'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TourGuideStoreRequest $request)
    {
        try {
            TourGuide::create([
                'place_id' => $request->place_id,
                'image' => $request->image->store('assets/tour-guide', 'public'),
                'name' => $request->name,
                'slug' => str()->slug($request->name),
                'description' => $request->description,
                'price' => $request->price,
                'phone' => $request->phone,
                'total_guides' => $request->total_guides,
                'total_years' => $request->total_years,
            ]);

            return redirect()->route('admin.tour-guide.index')->with('success', 'Tour Guide berhasil dibuat.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $guide = TourGuide::find($id);

        return view('pages.admin.tour-guide.show', compact('guide'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $guide = TourGuide::find($id);
        $places = Place::all();

        return view('pages.admin.tour-guide.edit', compact('guide', 'places'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TourGuideUpdateRequest $request, string $id)
    {
        try {
            $guide = TourGuide::find($id);

            $guide->update([
                'place_id' => $request->place_id,
                'image' => $request->image ? $request->image->store('assets/tour-guide', 'public') : $guide->image,
                'name' => $request->name,
                'slug' => str()->slug($request->name),
                'description' => $request->description,
                'price' => $request->price,
                'phone' => $request->phone,
                'total_guides' => $request->total_guides,
                'total_years' => $request->total_years,
            ]);

            return redirect()->route('admin.tour-guide.index')->with('success', 'Tour Guide berhasil diperbarui.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $guide = TourGuide::find($id);

            $guide->delete();

            return redirect()->route('admin.tour-guide.index')->with('success', 'Tour Guide berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
