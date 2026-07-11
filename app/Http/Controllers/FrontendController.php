<?php

namespace App\Http\Controllers;

use App\Models\TourPackage;
use App\Models\Service;
use App\Models\VisaRule;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $packages = TourPackage::where('is_active', true)->take(6)->get();
        
        $spotlights = TourPackage::where('is_active', true)
            ->where('is_spotlight', true)
            ->get();

        if ($spotlights->isEmpty()) {
            $spotlights = TourPackage::where('is_active', true)->take(3)->get();
        }

        $services = Service::where('is_active', true)->take(6)->get();
        $testimonials = Testimonial::where('is_active', true)->get();
        $visaRules = VisaRule::all();
        return view('frontend.index', compact('packages', 'spotlights', 'services', 'testimonials', 'visaRules'));
    }

    public function packages()
    {
        $packages = TourPackage::where('is_active', true)->get();
        return view('frontend.packages.index', compact('packages'));
    }

    public function packageDetail(string $slug)
    {
        $package = TourPackage::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();
        return view('frontend.packages.show', compact('package'));
    }

    public function services()
    {
        $services = Service::where('is_active', true)->get();
        return view('frontend.services.index', compact('services'));
    }

    public function serviceDetail(string $slug)
    {
        $service = Service::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();
        return view('frontend.services.show', compact('service'));
    }

    public function visa()
    {
        $rules = VisaRule::all();
        return view('frontend.visa', compact('rules'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
