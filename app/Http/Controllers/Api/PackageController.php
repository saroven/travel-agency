<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TourPackage;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $query = TourPackage::where('is_active', true);

        if ($request->filled('search')) {
            $query->where('title', 'like', "%{$request->search}%");
        }
        if ($request->filled('duration')) {
            if ($request->duration === '4-5') {
                $query->whereBetween('duration_days', [4, 5]);
            } elseif ($request->duration === '6+') {
                $query->where('duration_days', '>=', 6);
            }
        }
        if ($request->filled('budget')) {
            if ($request->budget === 'under-50k') {
                $query->where('price', '<', 50000);
            } elseif ($request->budget === '50k-70k') {
                $query->whereBetween('price', [50000, 70000]);
            } elseif ($request->budget === 'over-70k') {
                $query->where('price', '>', 70000);
            }
        }

        return response()->json($query->get());
    }

    public function show(string $slug)
    {
        $package = TourPackage::with('itineraryDays')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return response()->json($package);
    }
}
