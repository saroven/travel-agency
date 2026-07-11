@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('page-title', 'Overview')
@section('page-subtitle', 'Real-time telemetry and management controls')

@section('content')
{{-- Stats Telemetry Panel --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    {{-- Card 1: Total Leads --}}
    <div class="glass-panel glass-panel-glow rounded-3xl p-6 hover:-translate-y-1 transition-all duration-300">
        <div class="flex items-center justify-between mb-4">
            <span class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">Total Leads</span>
            <span class="w-8 h-8 rounded-xl bg-slate-800 flex items-center justify-center text-sm">💬</span>
        </div>
        <p class="text-white font-display font-bold text-3xl tracking-tight">{{ number_format($stats['total_leads']) }}</p>
        <div class="flex items-center gap-1.5 mt-2 text-[10px] font-semibold text-slate-500">
            <span>Historical submissions log</span>
        </div>
    </div>
    
    {{-- Card 2: New Leads --}}
    <div class="glass-panel border-emerald-500/20 rounded-3xl p-6 hover:-translate-y-1 transition-all duration-300" style="box-shadow: 0 0 30px -10px rgba(16, 185, 129, 0.12);">
        <div class="flex items-center justify-between mb-4">
            <span class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">New Leads</span>
            <span class="w-8 h-8 rounded-xl bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 flex items-center justify-center text-xs font-bold animate-pulse">!</span>
        </div>
        <p class="text-emerald-400 font-display font-bold text-3xl tracking-tight">{{ $stats['new_leads'] }}</p>
        <div class="flex items-center gap-1.5 mt-2 text-[10px] font-semibold text-emerald-500/80">
            <span class="w-1 h-1 bg-emerald-400 rounded-full animate-ping"></span>
            <span>Needs immediate care</span>
        </div>
    </div>

    {{-- Card 3: Inquiries Today --}}
    <div class="glass-panel rounded-3xl p-6 hover:-translate-y-1 transition-all duration-300">
        <div class="flex items-center justify-between mb-4">
            <span class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">Inquiries Today</span>
            <span class="w-8 h-8 rounded-xl bg-slate-800 flex items-center justify-center text-sm">⚡</span>
        </div>
        <p class="text-white font-display font-bold text-3xl tracking-tight">{{ $stats['leads_today'] }}</p>
        <div class="flex items-center gap-1.5 mt-2 text-[10px] font-semibold text-slate-500">
            <span>Submissions in last 24h</span>
        </div>
    </div>

    {{-- Card 4: Conversion Rate --}}
    <div class="glass-panel border-indigo-500/20 rounded-3xl p-6 hover:-translate-y-1 transition-all duration-300" style="box-shadow: 0 0 30px -10px rgba(99, 102, 241, 0.12);">
        <div class="flex items-center justify-between mb-4">
            <span class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">Lead Conversion</span>
            <span class="w-8 h-8 rounded-xl bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 flex items-center justify-center text-sm">🎯</span>
        </div>
        <p class="text-indigo-400 font-display font-bold text-3xl tracking-tight">{{ $stats['conversion_rate'] }}%</p>
        <div class="flex items-center gap-1.5 mt-2 text-[10px] font-semibold text-indigo-400/80">
            <span>Processed vs. total leads</span>
        </div>
    </div>

    {{-- Card 5: Active Packages --}}
    <div class="glass-panel rounded-3xl p-6 hover:-translate-y-1 transition-all duration-300">
        <div class="flex items-center justify-between mb-4">
            <span class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">Active Packages</span>
            <span class="w-8 h-8 rounded-xl bg-slate-800 flex items-center justify-center text-sm">✈</span>
        </div>
        <p class="text-white font-display font-bold text-3xl tracking-tight">{{ $stats['active_packages'] }}</p>
        <div class="flex items-center gap-1.5 mt-2 text-[10px] font-semibold text-slate-500">
            <span>Tours live on showcase</span>
        </div>
    </div>

    {{-- Card 6: Active Services --}}
    <div class="glass-panel rounded-3xl p-6 hover:-translate-y-1 transition-all duration-300">
        <div class="flex items-center justify-between mb-4">
            <span class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">Active Services</span>
            <span class="w-8 h-8 rounded-xl bg-slate-800 flex items-center justify-center text-sm">⚙</span>
        </div>
        <p class="text-white font-display font-bold text-3xl tracking-tight">{{ $stats['total_services'] }}</p>
        <div class="flex items-center gap-1.5 mt-2 text-[10px] font-semibold text-slate-500">
            <span>Bespoke travel solutions</span>
        </div>
    </div>

    {{-- Card 7: Visa Country Rules --}}
    <div class="glass-panel rounded-3xl p-6 hover:-translate-y-1 transition-all duration-300">
        <div class="flex items-center justify-between mb-4">
            <span class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">Visa Rules</span>
            <span class="w-8 h-8 rounded-xl bg-slate-800 flex items-center justify-center text-sm">🗺️</span>
        </div>
        <p class="text-white font-display font-bold text-3xl tracking-tight">{{ $stats['total_visa_rules'] }}</p>
        <div class="flex items-center gap-1.5 mt-2 text-[10px] font-semibold text-slate-500">
            <span>Supported country policies</span>
        </div>
    </div>

    {{-- Card 8: Telemetry Status --}}
    <div class="glass-panel rounded-3xl p-6 hover:-translate-y-1 transition-all duration-300">
        <div class="flex items-center justify-between mb-4">
            <span class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">Telemetry</span>
            <span class="w-8 h-8 rounded-xl bg-slate-800 flex items-center justify-center text-sm">🟢</span>
        </div>
        <p class="text-emerald-400 font-display font-bold text-3xl tracking-tight">Active</p>
        <div class="flex items-center gap-1.5 mt-2 text-[10px] font-semibold text-emerald-400/80">
            <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full animate-ping"></span>
            <span>Server serving client requests</span>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    {{-- Recent Leads Table --}}
    <div class="lg:col-span-2 glass-panel rounded-[32px] overflow-hidden">
        <div class="px-6 py-5 border-b border-white/5 flex items-center justify-between bg-white/[0.01]">
            <h3 class="text-white font-display font-bold text-base tracking-tight">Recent Lead Streams</h3>
            <a href="{{ route('admin.leads.index') }}" class="text-emerald-400 text-xs font-bold hover:text-emerald-300 transition-colors flex items-center gap-1">
                View all streams
                <span>→</span>
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-white/5 bg-white/[0.005]">
                        <th class="text-left text-slate-400 text-[10px] font-bold uppercase tracking-wider px-6 py-4">Client Detail</th>
                        <th class="text-left text-slate-400 text-[10px] font-bold uppercase tracking-wider px-4 py-4">Type</th>
                        <th class="text-left text-slate-400 text-[10px] font-bold uppercase tracking-wider px-4 py-4">Status</th>
                        <th class="text-left text-slate-400 text-[10px] font-bold uppercase tracking-wider px-4 py-4">Received</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($recentLeads as $lead)
                    <tr class="hover:bg-white/[0.02] transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 bg-white/[0.04] border border-white/10 rounded-xl flex items-center justify-center text-slate-300 font-bold text-xs uppercase">
                                    {{ substr($lead->name, 0, 2) }}
                                </div>
                                <div class="min-w-0">
                                    <a href="{{ route('admin.leads.show', $lead) }}" class="text-white font-semibold hover:text-emerald-400 transition-colors block truncate">{{ $lead->name }}</a>
                                    <p class="text-slate-500 text-xs mt-0.5 font-medium">{{ $lead->phone }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4">
                            <span class="text-slate-300 text-xs bg-white/[0.05] border border-white/5 px-2.5 py-1 rounded-xl font-medium">{{ str_replace('_', ' ', $lead->type) }}</span>
                        </td>
                        <td class="px-4 py-4">
                            <span class="badge-glow-{{ $lead->status }} text-[10px] font-bold px-3 py-1.5 rounded-full capitalize select-none inline-block">
                                {{ str_replace('_', ' ', $lead->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-4 text-slate-500 text-xs font-semibold whitespace-nowrap">{{ $lead->created_at->diffForHumans() }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-slate-600 font-medium">No lead entries registered.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Right widgets --}}
    <div class="space-y-6">
        {{-- Status Breakdown --}}
        <div class="glass-panel rounded-[32px] p-6">
            <h3 class="text-white font-display font-bold text-base tracking-tight mb-5">Lead Metrics by Status</h3>
            <div class="space-y-4">
                @foreach(['new' => 'New Inquiries', 'contacted' => 'Contacted', 'in_progress' => 'In Progress', 'completed' => 'Completed', 'cancelled' => 'Cancelled'] as $key => $label)
                @php 
                    $count = $leadsByStatus[$key] ?? 0; 
                    $total = $stats['total_leads'] ?: 1; 
                    $pct = round(($count / $total) * 100); 
                @endphp
                <div>
                    <div class="flex justify-between text-xs font-semibold mb-1.5">
                        <span class="text-slate-400">{{ $label }}</span>
                        <span class="text-white font-bold">{{ $count }}</span>
                    </div>
                    <div class="w-full bg-slate-900 rounded-full h-2 border border-white/5 overflow-hidden">
                        <div class="badge-glow-{{ $key }} rounded-full h-full transition-all duration-700" style="width: {{ $pct }}%; background-color: currentColor;"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Leads by Type --}}
        <div class="glass-panel rounded-[32px] p-6">
            <h3 class="text-white font-display font-bold text-base tracking-tight mb-4">Channels</h3>
            <div class="space-y-2">
                @foreach(['consultation' => ['💬', 'Free Consultation'], 'contact' => ['📋', 'General Contact'], 'service_inquiry' => ['⚙', 'Bespoke Inquiry'], 'package_booking' => ['✈', 'Package Booking']] as $type => $meta)
                <div class="flex items-center justify-between py-2.5 border-b border-white/5 last:border-0">
                    <div class="flex items-center gap-3 text-xs font-semibold text-slate-300">
                        <span class="text-sm">{{ $meta[0] }}</span>
                        <span>{{ $meta[1] }}</span>
                    </div>
                    <span class="text-white text-xs font-extrabold bg-white/[0.04] border border-white/5 px-2.5 py-1 rounded-lg">{{ $leadsByType[$type] ?? 0 }}</span>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Operations Desk --}}
        <div class="glass-panel rounded-[32px] p-6">
            <h3 class="text-white font-display font-bold text-base tracking-tight mb-4">Operations Desk</h3>
            <div class="space-y-3">
                <a href="{{ route('admin.packages.create') }}" class="flex items-center justify-center gap-2 w-full bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-bold py-3.5 rounded-2xl transition-all shadow-lg shadow-emerald-500/10 active:scale-98">
                    <span>+</span> Add Tour Package
                </a>
                <a href="{{ route('admin.leads.index') }}?status=new" class="flex items-center justify-center gap-2 w-full bg-white/[0.04] hover:bg-white/[0.08] border border-white/10 text-white text-xs font-semibold py-3.5 rounded-2xl transition-all">
                    Resolve Unprocessed Leads
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
