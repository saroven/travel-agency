<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisaRule;
use App\Models\VisaRequirement;
use Illuminate\Http\Request;

class VisaController extends Controller
{
    public function index()
    {
        $rules = VisaRule::with('requirements')->get();
        return view('admin.visa.index', compact('rules'));
    }

    public function create()
    {
        $occupations = ['employee', 'business', 'student', 'retired'];
        return view('admin.visa.create', compact('occupations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'country_code'    => 'required|string|max:10|unique:visa_rules,country_code',
            'title'           => 'required|string|max:200',
            'price'           => 'required|integer|min:0',
            'processing_time' => 'required|string|max:100',
        ]);

        $visa = VisaRule::create($request->only('country_code', 'title', 'price', 'processing_time'));

        // Save requirements per occupation
        $occupations = ['employee', 'business', 'student', 'retired'];
        foreach ($occupations as $occ) {
            $reqs = $request->input("requirements.{$occ}", []);
            foreach (array_filter($reqs) as $i => $req) {
                VisaRequirement::create([
                    'visa_rule_id' => $visa->id,
                    'occupation'   => $occ,
                    'requirement'  => $req,
                    'sort_order'   => $i,
                ]);
            }
        }

        return redirect()->route('admin.visa.index')->with('success', 'Visa rule created successfully.');
    }

    public function edit(VisaRule $visa)
    {
        $occupations = ['employee', 'business', 'student', 'retired'];
        $requirementsByOccupation = [];
        foreach ($occupations as $occ) {
            $requirementsByOccupation[$occ] = $visa->requirements()->where('occupation', $occ)->orderBy('sort_order')->get();
        }
        return view('admin.visa.edit', compact('visa', 'occupations', 'requirementsByOccupation'));
    }

    public function update(Request $request, VisaRule $visa)
    {
        $request->validate([
            'title'           => 'required|string|max:200',
            'price'           => 'required|integer|min:0',
            'processing_time' => 'required|string|max:100',
        ]);

        $visa->update($request->only('title', 'price', 'processing_time'));

        // Sync requirements per occupation
        $occupations = ['employee', 'business', 'student', 'retired'];
        foreach ($occupations as $occ) {
            $visa->requirements()->where('occupation', $occ)->delete();
            $reqs = $request->input("requirements.{$occ}", []);
            foreach (array_filter($reqs) as $i => $req) {
                VisaRequirement::create([
                    'visa_rule_id' => $visa->id,
                    'occupation'   => $occ,
                    'requirement'  => $req,
                    'sort_order'   => $i,
                ]);
            }
        }

        return redirect()->route('admin.visa.index')->with('success', 'Visa rule updated successfully.');
    }

    public function destroy(VisaRule $visa)
    {
        $visa->requirements()->delete();
        $visa->delete();
        return redirect()->route('admin.visa.index')->with('success', 'Visa rule deleted successfully.');
    }
}
