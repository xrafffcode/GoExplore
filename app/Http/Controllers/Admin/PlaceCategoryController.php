<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlaceCategoryStoreRequest;
use App\Http\Requests\PlaceCategoryUpdateRequest;
use App\Models\PlaceCategory;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class PlaceCategoryController extends Controller implements HasMiddleware
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
        $categories = PlaceCategory::all();

        return view('pages.admin.place-category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.place-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlaceCategoryStoreRequest $request)
    {
        try {
            PlaceCategory::create([
                'icon' => $request->icon->store('assets/place-category', 'public'),
                'name' => $request->name,
                'slug' => str()->slug($request->name),
                'is_featured' => $request->is_featured,
            ]);

            return redirect()->route('admin.place-category.index')->with('success', 'Kategori berhasil dibuat.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = PlaceCategory::find($id);

        return view('pages.admin.place-category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = PlaceCategory::find($id);

        return view('pages.admin.place-category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlaceCategoryUpdateRequest $request, string $id)
    {
        try {
            $category = PlaceCategory::find($id);

            $category->update([
                'icon' => $request->icon ? $request->icon->store('assets/place-category', 'public') : $category->icon,
                'name' => $request->name,
                'slug' => str()->slug($request->name),
                'is_featured' => $request->is_featured,
            ]);

            return redirect()->route('admin.place-category.index')->with('success', 'Kategori berhasil diperbarui.');
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
            $category = PlaceCategory::find($id);

            $category->delete();

            return redirect()->route('admin.place-category.index')->with('success', 'Kategori berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
