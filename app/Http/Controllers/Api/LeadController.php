<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type'        => 'required|in:consultation,contact,service_inquiry,package_booking,quick_inquiry',
            'name'        => 'required|string|max:150',
            'phone'       => 'required|string|max:30',
            'email'       => 'nullable|email|max:150',
            'destination' => 'nullable|string|max:150',
            'travel_date' => 'nullable|date',
            'budget'      => 'nullable|string|max:100',
            'plan_details'=> 'nullable|string|max:2000',
            'service_slug'=> 'nullable|string|max:50',
            'source_page' => 'nullable|string|max:500',
            'extra_data'  => 'nullable|array',
        ]);

        $lead = Lead::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Your inquiry has been received! Our team will contact you shortly.',
            'id'      => $lead->id,
        ], 201);
    }
}
