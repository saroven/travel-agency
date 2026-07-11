<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required|string|max:200',
            'subtitle' => 'required|string|max:300',
            'icon'     => 'required|string|max:10',
            'overview' => 'required|string',
        ]);

        $slug = Str::slug($request->title);
        // Ensure uniqueness of slug
        $count = Service::where('slug', 'like', "{$slug}%")->count();
        if ($count > 0) {
            $slug = "{$slug}-" . ($count + 1);
        }

        Service::create([
            'slug'            => $slug,
            'title'           => $request->title,
            'subtitle'        => $request->subtitle,
            'icon'            => $request->icon,
            'overview'        => $request->overview,
            'is_active'       => $request->has('is_active'),
            'form_fields_html'=> $request->form_fields_html,
            'benefits'        => $request->input('benefits', []),
            'steps'           => $request->input('steps', []),
            'faqs'            => $request->input('faqs', []),
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title'    => 'required|string|max:200',
            'subtitle' => 'required|string|max:300',
            'icon'     => 'required|string|max:10',
            'overview' => 'required|string',
        ]);

        $service->update([
            'title'           => $request->title,
            'subtitle'        => $request->subtitle,
            'icon'            => $request->icon,
            'overview'        => $request->overview,
            'is_active'       => $request->has('is_active'),
            'form_fields_html'=> $request->form_fields_html,
            'benefits'        => $request->input('benefits', []),
            'steps'           => $request->input('steps', []),
            'faqs'            => $request->input('faqs', []),
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
