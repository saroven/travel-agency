<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\TourPackage;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_leads'        => Lead::count(),
            'new_leads'          => Lead::where('status', 'new')->count(),
            'leads_today'        => Lead::whereDate('created_at', today())->count(),
            'active_packages'    => TourPackage::where('is_active', true)->count(),
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
