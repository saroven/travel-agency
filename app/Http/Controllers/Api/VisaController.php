<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VisaRule;
use Illuminate\Http\Request;

class VisaController extends Controller
{
    public function calculate(Request $request, string $country, string $occupation)
    {
        $validOccupations = ['employee', 'business', 'student', 'retired'];

        if (!in_array($occupation, $validOccupations)) {
            return response()->json(['error' => 'Invalid occupation'], 422);
        }

        $rule = VisaRule::where('country_code', $country)->firstOrFail();

        $requirements = $rule->requirements()
            ->where('occupation', $occupation)
            ->orderBy('sort_order')
            ->pluck('requirement');

        return response()->json([
            'title'           => $rule->title,
            'price'           => $rule->formatted_price,
            'processing_time' => $rule->processing_time,
            'requirements'    => $requirements,
        ]);
    }
}
