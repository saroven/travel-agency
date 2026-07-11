@extends('admin.layouts.app')
@section('title', 'Bespoke Services')
@section('page-title', 'Bespoke Services')
@section('page-subtitle', 'Manage customizable service offerings')

@section('content')
<div class="flex justify-end mb-8">
    <a href="{{ route('admin.services.create') }}" class="bg-emerald-500 hover:bg-emerald-600 active:scale-95 text-white text-sm font-bold px-6 py-3.5 rounded-2xl transition-all flex items-center gap-2 shadow-lg shadow-emerald-500/10">
        <span class="text-base leading-none">+</span> Add Service
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
    @forelse($services as $service)
    <div class="glass-panel rounded-[32px] p-6 hover:border-slate-700 hover:shadow-xl hover:shadow-slate-950/20 transition-all duration-300 flex flex-col justify-between group">
        <div>
            <div class="flex items-center gap-3.5 mb-4 pb-3 border-b border-white/5">
                <div class="w-11 h-11 bg-emerald-500/10 border border-emerald-500/20 rounded-2xl flex items-center justify-center text-xl shadow-lg shadow-emerald-500/5">
                    {{ $service->icon }}
                </div>
                <div>
                    <h3 class="text-white font-display font-bold text-base leading-tight group-hover:text-emerald-400 transition-colors duration-200">{{ $service->title }}</h3>
                    <p class="text-slate-500 text-[10px] font-bold uppercase tracking-widest mt-1">{{ $service->slug }} Offer</p>
                </div>
            </div>
            
            <p class="text-slate-400 text-xs leading-relaxed mb-6 line-clamp-3">{{ $service->subtitle }}</p>
        </div>
        
        <div class="flex flex-col gap-4 border-t border-white/5 pt-4 mt-auto">
            <div class="flex items-center justify-between">
                <span class="text-[10px] font-bold px-2.5 py-1.5 rounded-full backdrop-blur-md {{ $service->is_active ? 'bg-emerald-500/12 text-emerald-400 border border-emerald-500/20' : 'bg-slate-600/40 text-slate-400 border border-white/5' }}">
                    {{ $service->is_active ? 'Active' : 'Hidden' }}
                </span>
            </div>
            
            <div class="flex items-center gap-2">
                <a href="{{ route('admin.services.edit', $service) }}" class="flex-1 text-center bg-white/[0.04] hover:bg-white/[0.08] border border-white/10 text-white text-xs font-bold py-3.5 rounded-xl transition-all shadow-md">
                    Edit
                </a>
                <form method="POST" action="{{ route('admin.services.destroy', $service) }}" onsubmit="return confirm('Delete service {{ addslashes($service->title) }} permanently?')" class="inline-block">
                    @csrf @method('DELETE')
                    <button type="submit" class="bg-red-500/10 hover:bg-red-500/20 border border-red-500/20 text-red-400 text-xs font-bold py-3.5 px-4 rounded-xl transition-all">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full glass-panel rounded-[32px] text-center py-20">
        <p class="text-5xl mb-4 text-slate-700">⚙</p>
        <h3 class="text-white font-display font-bold text-lg mb-2">No services found</h3>
        <p class="text-slate-500 text-sm max-w-xs mx-auto mb-6">Create service offerings to display them on the homepage.</p>
        <a href="{{ route('admin.services.create') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-bold px-6 py-3 rounded-2xl transition-all inline-block shadow-lg shadow-emerald-500/10">Add Service</a>
    </div>
    @endforelse
</div>
@endsection
