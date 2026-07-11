@extends('admin.layouts.app')
@section('title', 'Lead #' . $lead->id)
@section('page-title', 'Lead Detail')
@section('page-subtitle', 'Process client parameters and configure routing notes')

@section('content')
<div class="w-full">
    <div class="flex items-center gap-2 mb-6">
        <a href="{{ route('admin.leads.index') }}" class="text-slate-400 hover:text-white text-xs font-semibold flex items-center gap-1.5 transition-colors">
            <span>←</span> Back to Leads Registry
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Lead Information --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="glass-panel rounded-[32px] p-6 md:p-8">
                <div class="flex flex-wrap items-start justify-between gap-4 mb-6">
                    <div>
                        <h2 class="text-white font-display font-bold text-2xl leading-none tracking-tight">{{ $lead->name }}</h2>
                        <p class="text-slate-400 text-xs mt-2 font-medium">
                            {{ $lead->phone }} @if($lead->email) · {{ $lead->email }} @endif
                        </p>
                    </div>
                    <span class="badge-glow-{{ $lead->status }} text-[10px] font-bold px-3 py-1.5 rounded-full capitalize select-none">
                        {{ str_replace('_',' ',$lead->status) }}
                    </span>
                </div>

                <div class="grid grid-cols-2 gap-6 text-sm border-t border-white/5 pt-6">
                    @if($lead->destination)
                    <div>
                        <p class="text-slate-500 text-[10px] uppercase tracking-wider font-bold mb-1.5">Destination</p>
                        <p class="text-white font-semibold">{{ $lead->destination }}</p>
                    </div>
                    @endif
                    @if($lead->travel_date)
                    <div>
                        <p class="text-slate-500 text-[10px] uppercase tracking-wider font-bold mb-1.5">Planned Date</p>
                        <p class="text-white font-semibold">{{ $lead->travel_date->format('d M Y') }}</p>
                    </div>
                    @endif
                    @if($lead->budget)
                    <div>
                        <p class="text-slate-500 text-[10px] uppercase tracking-wider font-bold mb-1.5">Estimated Budget</p>
                        <p class="text-emerald-400 font-bold">{{ $lead->budget }}</p>
                    </div>
                    @endif
                    <div>
                        <p class="text-slate-500 text-[10px] uppercase tracking-wider font-bold mb-1.5">Submission Channel</p>
                        <p class="text-white font-semibold capitalize">{{ str_replace('_',' ',$lead->type) }}</p>
                    </div>
                    <div>
                        <p class="text-slate-500 text-[10px] uppercase tracking-wider font-bold mb-1.5">Source URL</p>
                        <p class="text-white font-semibold truncate">{{ $lead->source_page ?? 'Direct Access' }}</p>
                    </div>
                    <div>
                        <p class="text-slate-500 text-[10px] uppercase tracking-wider font-bold mb-1.5">Registered Timestamp</p>
                        <p class="text-white font-semibold">{{ $lead->created_at->format('d M Y, h:i A') }}</p>
                    </div>
                </div>

                @if($lead->plan_details)
                <div class="mt-6 pt-6 border-t border-white/5">
                    <p class="text-slate-500 text-[10px] uppercase tracking-wider font-bold mb-2.5">Message / Requirements</p>
                    <div class="bg-slate-950/40 border border-white/5 rounded-2xl p-4.5">
                        <p class="text-slate-300 text-xs md:text-sm leading-relaxed whitespace-pre-line">{{ $lead->plan_details }}</p>
                    </div>
                </div>
                @endif

                @if($lead->extra_data)
                <div class="mt-6 pt-6 border-t border-white/5">
                    <p class="text-slate-500 text-[10px] uppercase tracking-wider font-bold mb-3">Collected Parameters</p>
                    <div class="space-y-2 bg-slate-950/40 border border-white/5 rounded-2xl p-4">
                        @foreach($lead->extra_data as $key => $val)
                        <div class="flex gap-4 text-xs">
                            <span class="text-slate-500 w-32 capitalize font-semibold flex-shrink-0">{{ str_replace('_',' ',$key) }}</span>
                            <span class="text-slate-300 font-semibold">{{ $val }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>

        {{-- Operations Desk --}}
        <div class="space-y-6">
            <form method="POST" action="{{ route('admin.leads.update', $lead) }}">
                @csrf @method('PUT')
                <div class="glass-panel rounded-[32px] p-6 space-y-5">
                    <h3 class="text-white font-display font-bold text-base tracking-tight mb-2">Process Action</h3>

                    <div>
                        <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-2 ml-1">Pipeline Status</label>
                        <select name="status" class="w-full bg-slate-950/60 border border-white/10 rounded-2xl px-4 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 cursor-pointer">
                            @foreach(['new','contacted','in_progress','completed','cancelled'] as $s)
                            <option value="{{ $s }}" {{ $lead->status == $s ? 'selected' : '' }} class="bg-slate-900 text-white">{{ ucwords(str_replace('_',' ',$s)) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-2 ml-1">Assigned Agent</label>
                        <input type="text" name="assigned_to" value="{{ $lead->assigned_to }}"
                            class="w-full bg-slate-950/60 border border-white/10 rounded-2xl px-4 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500"
                            placeholder="Staff or agent name" />
                    </div>

                    <div>
                        <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-2 ml-1">Internal Notes</label>
                        <textarea name="admin_notes" rows="5"
                            class="w-full bg-slate-950/60 border border-white/10 rounded-2xl px-4 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 resize-none"
                            placeholder="Add action logs, discussion summaries, or reminders...">{{ $lead->admin_notes }}</textarea>
                    </div>

                    <button type="submit" class="w-full bg-emerald-500 hover:bg-emerald-600 active:scale-98 text-white font-bold text-sm py-3.5 rounded-2xl transition-all shadow-lg shadow-emerald-500/10 cursor-pointer">
                        Update Registry
                    </button>
                </div>
            </form>

            <form method="POST" action="{{ route('admin.leads.destroy', $lead) }}" onsubmit="return confirm('Permanently delete this lead registry? This cannot be undone.')">
                @csrf @method('DELETE')
                <button type="submit" class="w-full bg-red-500/10 hover:bg-red-500/20 border border-red-500/20 text-red-400 text-xs font-bold py-3.5 rounded-2xl transition-all">
                    Archive / Delete Lead Permanent
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
