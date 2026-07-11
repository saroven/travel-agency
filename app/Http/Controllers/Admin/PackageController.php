<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourPackage;
use App\Models\ItineraryDay;
use App\Models\PackageImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    public function index()
    {
        $packages = TourPackage::orderBy('created_at', 'desc')->get();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:200',
            'subtitle'      => 'required|string|max:300',
            'category'      => 'required|string|max:100',
            'duration'      => 'required|string|max:50',
            'duration_days' => 'required|integer|min:1',
            'price'         => 'required|integer|min:0',
            'stars'         => 'required|integer|min:1|max:5',
            'reviews_count' => 'required|integer|min:0',
            'overview'      => 'required|string',
            'image'         => 'nullable|image|max:4096',
            'gallery'       => 'nullable|array',
            'gallery.*'     => 'image|max:4096',
            'inclusions'    => 'nullable|array',
            'exclusions'    => 'nullable|array',
            'days'          => 'nullable|array',
            'days.*.title'  => 'required_with:days|string',
            'days.*.description' => 'required_with:days|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('packages', 'public');
        }

        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $count = 1;
        while (TourPackage::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $package = TourPackage::create([
            'slug'          => $slug,
            'title'         => $validated['title'],
            'subtitle'      => $validated['subtitle'],
            'category'      => $validated['category'],
            'duration'      => $validated['duration'],
            'duration_days' => $validated['duration_days'],
            'price'         => $validated['price'],
            'stars'         => $validated['stars'],
            'reviews_count' => $validated['reviews_count'],
            'overview'      => $validated['overview'],
            'image_path'    => $imagePath,
            'inclusions'    => array_filter($request->input('inclusions', [])),
            'exclusions'    => array_filter($request->input('exclusions', [])),
            'is_active'     => $request->boolean('is_active', true),
            'is_spotlight'  => $request->boolean('is_spotlight', false),
        ]);

        // Upload gallery images
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $i => $file) {
                $path = $file->store('packages/gallery', 'public');
                $package->images()->create([
                    'image_path' => $path,
                    'sort_order' => $i,
                ]);
            }
        }

        if ($request->filled('days')) {
            foreach ($request->input('days') as $i => $day) {
                if (!empty($day['title'])) {
                    $package->itineraryDays()->create([
                        'day_number'  => $i + 1,
                        'title'       => $day['title'],
                        'description' => $day['description'],
                    ]);
                }
            }
        }

        return redirect()->route('admin.packages.index')->with('success', 'Package created successfully!');
    }

    public function edit(TourPackage $package)
    {
        $package->load(['itineraryDays', 'images']);
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, TourPackage $package)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:200',
            'subtitle'      => 'required|string|max:300',
            'category'      => 'required|string|max:100',
            'duration'      => 'required|string|max:50',
            'duration_days' => 'required|integer|min:1',
            'price'         => 'required|integer|min:0',
            'stars'         => 'required|integer|min:1|max:5',
            'reviews_count' => 'required|integer|min:0',
            'overview'      => 'required|string',
            'image'         => 'nullable|image|max:4096',
            'gallery'       => 'nullable|array',
            'gallery.*'     => 'image|max:4096',
            'remove_images' => 'nullable|array',
            'inclusions'    => 'nullable|array',
            'exclusions'    => 'nullable|array',
            'days'          => 'nullable|array',
        ]);

        $imagePath = $package->image_path;
        if ($request->hasFile('image')) {
            if ($imagePath) Storage::disk('public')->delete($imagePath);
            $imagePath = $request->file('image')->store('packages', 'public');
        }

        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $count = 1;
        while (TourPackage::where('slug', $slug)->where('id', '!=', $package->id)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $package->update([
            'slug'          => $slug,
            'title'         => $validated['title'],
            'subtitle'      => $validated['subtitle'],
            'category'      => $validated['category'],
            'duration'      => $validated['duration'],
            'duration_days' => $validated['duration_days'],
            'price'         => $validated['price'],
            'stars'         => $validated['stars'],
            'reviews_count' => $validated['reviews_count'],
            'overview'      => $validated['overview'],
            'image_path'    => $imagePath,
            'inclusions'    => array_filter($request->input('inclusions', [])),
            'exclusions'    => array_filter($request->input('exclusions', [])),
            'is_active'     => $request->boolean('is_active', true),
            'is_spotlight'  => $request->boolean('is_spotlight', false),
        ]);

        // Remove marked gallery images
        if ($request->filled('remove_images')) {
            foreach ($request->input('remove_images') as $imgId) {
                $img = $package->images()->find($imgId);
                if ($img) {
                    Storage::disk('public')->delete($img->image_path);
                    $img->delete();
                }
            }
        }

        // Upload new gallery images
        if ($request->hasFile('gallery')) {
            $nextOrder = $package->images()->max('sort_order') + 1;
            foreach ($request->file('gallery') as $i => $file) {
                $path = $file->store('packages/gallery', 'public');
                $package->images()->create([
                    'image_path' => $path,
                    'sort_order' => $nextOrder + $i,
                ]);
            }
        }

        // Sync itinerary days
        $package->itineraryDays()->delete();
        if ($request->filled('days')) {
            foreach ($request->input('days') as $i => $day) {
                if (!empty($day['title'])) {
                    $package->itineraryDays()->create([
                        'day_number'  => $i + 1,
                        'title'       => $day['title'],
                        'description' => $day['description'],
                    ]);
                }
            }
        }

        return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully!');
    }

    public function destroy(TourPackage $package)
    {
        if ($package->image_path) {
            Storage::disk('public')->delete($package->image_path);
        }
        foreach ($package->images as $img) {
            Storage::disk('public')->delete($img->image_path);
        }
        $package->delete();
        return redirect()->route('admin.packages.index')->with('success', 'Package deleted.');
    }
}
