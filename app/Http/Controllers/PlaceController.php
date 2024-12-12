<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceStoreRequest;
use App\Http\Requests\PlaceUpdateRequest;
use App\Models\Place;
use App\Models\PlaceCategory;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class PlaceController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('place-category-view'), only: ['index', 'show']),
            new Middleware(PermissionMiddleware::using('place-category-create'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('place-category-update'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('place-category-delete'), only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place::all();

        return view('pages.admin.place.index', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = PlaceCategory::all();

        return view('pages.admin.place.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlaceStoreRequest $request)
    {
        try {
            Place::create([
                'place_category_id' => $request->place_category_id,
                'image' => $request->image->store('assets/place', 'public'),
                'name' => $request->name,
                'slug' => str()->slug($request->name),
                'description' => $request->description,
                'price' => $request->price,
                'address' => $request->address,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
            ]);

            return redirect()->route('admin.place.index')->with('success', 'Tempat wisata berhasil dibuat.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $place = Place::find($id);

        return view('pages.admin.place.show', compact('place'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $place = Place::find($id);
        $categories = PlaceCategory::all();

        return view('pages.admin.place.edit', compact('place', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlaceUpdateRequest $request, string $id)
    {
        try {
            $place = Place::find($id);

            $place->update([
                'place_category_id' => $request->place_category_id,
                'image' => $request->image ? $request->image->store('assets/place', 'public') : $place->image,
                'name' => $request->name,
                'slug' => str()->slug($request->name),
                'description' => $request->description,
                'price' => $request->price,
                'address' => $request->address,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
            ]);

            return redirect()->route('admin.place.index')->with('success', 'Tempat wisata berhasil diperbarui.');
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
            $place = Place::find($id);

            $place->delete();

            return redirect()->route('admin.place.index')->with('success', 'Tempat wisata berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
