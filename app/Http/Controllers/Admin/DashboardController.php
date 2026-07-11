<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\TourPackage;
use App\Models\Service;
use App\Models\VisaRule;

class DashboardController extends Controller
{
    public function index()
    {
        $totalLeads = Lead::count();
        $convertedLeads = Lead::whereIn('status', ['contacted', 'in_progress', 'completed'])->count();
        $conversionRate = $totalLeads > 0 ? round(($convertedLeads / $totalLeads) * 100, 1) : 0;

        $stats = [
            'total_leads'        => $totalLeads,
            'new_leads'          => Lead::where('status', 'new')->count(),
            'leads_today'        => Lead::whereDate('created_at', today())->count(),
            'active_packages'    => TourPackage::where('is_active', true)->count(),
            'total_services'     => Service::count(),
            'total_visa_rules'   => VisaRule::count(),
            'conversion_rate'    => $conversionRate,
        ];

        $recentLeads = Lead::latest()->take(10)->get();

        $leadsByType = Lead::selectRaw('type, count(*) as count')
            ->groupBy('type')
            ->get()
            ->pluck('count', 'type');

        $leadsByStatus = Lead::selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->get()
            ->pluck('count', 'status');

        return view('admin.dashboard', compact('stats', 'recentLeads', 'leadsByType', 'leadsByStatus'));
    }
}
