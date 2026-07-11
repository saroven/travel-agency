@extends('admin.layouts.app')
@section('title', 'Visa Desk')
@section('page-title', 'Visa Desk Rules')
@section('page-subtitle', 'Manage country-wise processing rules and occupation documents')

@section('content')
<div class="flex justify-end mb-8">
    <a href="{{ route('admin.visa.create') }}" class="bg-emerald-500 hover:bg-emerald-600 active:scale-95 text-white text-sm font-bold px-6 py-3.5 rounded-2xl transition-all flex items-center gap-2 shadow-lg shadow-emerald-500/10">
        <span class="text-base leading-none">+</span> Add Country Rules
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
    @forelse($rules as $rule)
    <div class="glass-panel rounded-[32px] p-6 hover:border-slate-700 hover:shadow-xl hover:shadow-slate-950/20 transition-all duration-300 flex flex-col justify-between group">
        <div>
            <div class="flex items-center gap-3.5 mb-5 pb-4 border-b border-white/5">
                <div class="w-11 h-11 bg-blue-500/10 border border-blue-500/20 rounded-2xl flex items-center justify-center text-xl shadow-lg shadow-blue-500/5">
                    <span>🛂</span>
                </div>
                <div>
                    <h3 class="text-white font-display font-bold text-base leading-tight group-hover:text-emerald-400 transition-colors duration-200">{{ $rule->title }}</h3>
                    <p class="text-slate-500 text-[10px] font-bold uppercase tracking-widest mt-1">{{ strtoupper($rule->country_code) }} Desk</p>
                </div>
            </div>
            
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <span class="text-slate-500 text-[9px] font-bold uppercase tracking-wider block mb-0.5">Processing Fee</span>
                    <p class="text-emerald-400 font-display font-bold text-lg">৳{{ number_format($rule->price) }}</p>
                </div>
                <div class="text-right">
                    <span class="text-slate-500 text-[9px] font-bold uppercase tracking-wider block mb-0.5">Time Frame</span>
                    <p class="text-white font-semibold text-sm mt-0.5">{{ $rule->processing_time }}</p>
                </div>
            </div>
            
            <div class="bg-slate-950/40 border border-white/5 rounded-2xl p-4.5 mb-6 text-xs text-slate-400 leading-relaxed font-semibold">
                📝 Includes {{ $rule->requirements->count() }} active occupation-specific document parameters.
            </div>
        </div>

        <div class="flex items-center gap-2 pt-4 border-t border-white/5">
            <a href="{{ route('admin.visa.edit', $rule) }}" class="flex-1 text-center bg-white/[0.04] hover:bg-white/[0.08] border border-white/10 text-white text-xs font-bold py-3 px-4 rounded-xl transition-all">
                Edit
            </a>
            <form method="POST" action="{{ route('admin.visa.destroy', $rule) }}" onsubmit="return confirm('Delete visa rules for {{ addslashes($rule->title) }} permanently?')" class="inline-block">
                @csrf @method('DELETE')
                <button type="submit" class="bg-red-500/10 hover:bg-red-500/20 border border-red-500/20 text-red-400 text-xs font-bold py-3 px-4 rounded-xl transition-all">
                    Delete
                </button>
            </form>
        </div>
    </div>
    @empty
    <div class="col-span-full glass-panel rounded-[32px] text-center py-20">
        <p class="text-5xl mb-4 text-slate-700">🛂</p>
        <h3 class="text-white font-display font-bold text-lg mb-2">No country visa rules found</h3>
        <p class="text-slate-500 text-sm max-w-xs mx-auto mb-6">Create country visa rules to display them on the calculator tool.</p>
        <a href="{{ route('admin.visa.create') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-bold px-6 py-3 rounded-2xl transition-all inline-block shadow-lg shadow-emerald-500/10">Add Country Rules</a>
    </div>
    @endforelse
</div>
@endsection
