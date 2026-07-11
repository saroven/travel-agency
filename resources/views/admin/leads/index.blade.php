@extends('admin.layouts.app')
@section('title', 'Leads')
@section('page-title', 'Leads Registry')
@section('page-subtitle', 'Manage lead pipelines and client inquiries')

@section('content')
{{-- Filter Workspace --}}
<div class="glass-panel rounded-3xl p-5 mb-8 flex flex-wrap gap-4 items-center">
    <form method="GET" class="flex flex-wrap gap-4 items-center flex-1">
        <div class="flex-1 min-w-[240px] relative">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search client name, phone, destination..."
                class="w-full bg-slate-950/60 border border-white/10 rounded-2xl px-4 py-3 pl-10 text-white text-sm placeholder-slate-600 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all" />
            <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-500" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
        </div>

        <select name="status" class="bg-slate-950/60 border border-white/10 rounded-2xl px-4 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 cursor-pointer">
            <option value="" class="bg-slate-900">All Statuses</option>
            @foreach(['new','contacted','in_progress','completed','cancelled'] as $s)
            <option value="{{ $s }}" {{ request('status') == $s ? 'selected' : '' }} class="bg-slate-900">{{ ucwords(str_replace('_',' ',$s)) }}</option>
            @endforeach
        </select>

        <select name="type" class="bg-slate-950/60 border border-white/10 rounded-2xl px-4 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 cursor-pointer">
            <option value="" class="bg-slate-900">All Channels</option>
            @foreach(['consultation','contact','service_inquiry','package_booking','quick_inquiry'] as $t)
            <option value="{{ $t }}" {{ request('type') == $t ? 'selected' : '' }} class="bg-slate-900">{{ ucwords(str_replace('_',' ',$t)) }}</option>
            @endforeach
        </select>

        <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 active:scale-95 text-white text-sm font-bold px-6 py-3 rounded-2xl transition-all shadow-lg shadow-emerald-500/10 cursor-pointer">
            Apply Filters
        </button>
        
        <a href="{{ route('admin.leads.export', request()->query()) }}" class="bg-white/[0.04] hover:bg-white/[0.08] border border-white/10 text-white text-sm font-bold px-6 py-3 rounded-2xl transition-all flex items-center gap-1.5 shadow-md">
            <span>📥</span> Export CSV
        </a>
        
        @if(request()->anyFilled(['search', 'status', 'type']))
        <a href="{{ route('admin.leads.index') }}" class="text-slate-400 hover:text-white text-sm font-semibold transition-colors">Clear Filters</a>
        @endif
    </form>
    <div class="h-6 w-[1px] bg-white/5 hidden md:block"></div>
    <span class="text-slate-500 text-xs font-semibold">{{ $leads->total() }} records</span>
</div>

{{-- Data Table --}}
<div class="glass-panel rounded-[32px] overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-white/5 bg-white/[0.005]">
                    <th class="text-left text-slate-400 text-[10px] font-bold uppercase tracking-wider px-6 py-4.5">Client Detail</th>
                    <th class="text-left text-slate-400 text-[10px] font-bold uppercase tracking-wider px-4 py-4.5">Channel</th>
                    <th class="text-left text-slate-400 text-[10px] font-bold uppercase tracking-wider px-4 py-4.5">Target Destination</th>
                    <th class="text-left text-slate-400 text-[10px] font-bold uppercase tracking-wider px-4 py-4.5">Pipeline Status</th>
                    <th class="text-left text-slate-400 text-[10px] font-bold uppercase tracking-wider px-4 py-4.5">Received</th>
                    <th class="text-left text-slate-400 text-[10px] font-bold uppercase tracking-wider px-4 py-4.5">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($leads as $lead)
                <tr class="hover:bg-white/[0.02] transition-colors" id="lead-row-{{ $lead->id }}">
                    <td class="px-6 py-4.5">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 bg-white/[0.04] border border-white/10 rounded-xl flex items-center justify-center text-slate-300 font-bold text-xs uppercase">
                                {{ substr($lead->name, 0, 2) }}
                            </div>
                            <div class="min-w-0">
                                <a href="{{ route('admin.leads.show', $lead) }}" class="text-white font-semibold hover:text-emerald-400 transition-colors block truncate">{{ $lead->name }}</a>
                                <p class="text-slate-500 text-xs mt-0.5 font-medium">{{ $lead->phone }}{{ $lead->email ? ' · ' . $lead->email : '' }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-4.5">
                        <span class="bg-white/[0.05] border border-white/5 text-slate-300 text-xs px-2.5 py-1 rounded-xl font-semibold capitalize">
                            {{ str_replace('_',' ',$lead->type) }}
                        </span>
                    </td>
                    <td class="px-4 py-4.5 text-slate-300 text-xs font-semibold">{{ $lead->destination ?? 'General Inquiry' }}</td>
                    <td class="px-4 py-4.5">
                        <select data-lead-id="{{ $lead->id }}"
                            class="status-select badge-glow-{{ $lead->status }} text-[10px] font-bold px-3 py-1.5 rounded-full border-0 outline-none bg-transparent cursor-pointer capitalize">
                            @foreach(['new','contacted','in_progress','completed','cancelled'] as $s)
                            <option value="{{ $s }}" {{ $lead->status == $s ? 'selected' : '' }} class="bg-slate-900 text-white">{{ str_replace('_',' ',$s) }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td class="px-4 py-4.5 text-slate-500 text-xs font-semibold whitespace-nowrap">{{ $lead->created_at->format('d M Y') }}</td>
                    <td class="px-4 py-4.5">
                        <div class="flex items-center gap-3.5">
                            <a href="{{ route('admin.leads.show', $lead) }}" class="text-emerald-400 hover:text-emerald-300 text-xs font-bold transition-colors">Manage</a>
                            <form method="POST" action="{{ route('admin.leads.destroy', $lead) }}" onsubmit="return confirm('Archive/Delete this lead permanently?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-400/80 hover:text-red-400 text-xs font-bold transition-colors">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-slate-600 font-medium">No records found matching current query.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($leads->hasPages())
    <div class="px-6 py-4.5 border-t border-white/5 bg-white/[0.005]">
        {{ $leads->links() }}
    </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
// Inline status update via API
document.querySelectorAll('.status-select').forEach(select => {
    select.addEventListener('change', async function () {
        const id = this.dataset.leadId;
        const status = this.value;
        try {
            const res = await fetch(`/admin/leads/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ status }),
            });
            const data = await res.json();
            if (data.success) {
                // Update badge class
                this.className = this.className.replace(/badge-glow-\w+/, `badge-glow-${status}`);
                showToast('Status updated successfully');
            }
        } catch (e) {
            showToast('Update failed', true);
        }
    });
});

function showToast(msg, error = false) {
    const t = document.createElement('div');
    t.textContent = msg;
    t.className = `fixed bottom-6 right-6 z-50 px-5 py-3.5 rounded-2xl text-xs font-bold shadow-xl ${error ? 'bg-red-500' : 'bg-emerald-500'} text-white transition-all`;
    document.body.appendChild(t);
    setTimeout(() => t.remove(), 2500);
}
</script>
@endpush
