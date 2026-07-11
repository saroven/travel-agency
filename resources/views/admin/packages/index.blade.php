@extends('admin.layouts.app')
@section('title', 'Tour Packages')
@section('page-title', 'Tour Packages')
@section('page-subtitle', 'Catalog management for active showcases')

@section('content')
<div class="flex justify-end mb-8">
    <a href="{{ route('admin.packages.create') }}" class="bg-emerald-500 hover:bg-emerald-600 active:scale-95 text-white text-sm font-bold px-6 py-3.5 rounded-2xl transition-all flex items-center gap-2 shadow-lg shadow-emerald-500/10">
        <span class="text-base leading-none">+</span> Add Tour Package
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
    @forelse($packages as $package)
    <div class="glass-panel rounded-[32px] overflow-hidden hover:border-slate-700 hover:shadow-xl hover:shadow-slate-950/20 transition-all duration-300 flex flex-col group">
        @if($package->image_path)
        <div class="h-44 bg-slate-800 overflow-hidden relative border-b border-white/5">
            <img src="{{ asset('storage/' . $package->image_path) }}" class="w-full h-full object-cover group-hover:scale-103 transition-transform duration-500" alt="{{ $package->title }}">
            <span class="absolute top-4 right-4 text-[10px] font-bold px-2.5 py-1.5 rounded-full select-none backdrop-blur-md {{ $package->is_active ? 'bg-emerald-500/12 text-emerald-400 border border-emerald-500/20' : 'bg-slate-600/40 text-slate-400 border border-white/5' }}">
                {{ $package->is_active ? 'Active' : 'Hidden' }}
            </span>
        </div>
        @else
        <div class="h-44 bg-gradient-to-br from-slate-900 to-slate-800 flex items-center justify-center relative border-b border-white/5">
            <span class="text-4xl text-slate-700">✈</span>
            <span class="absolute top-4 right-4 text-[10px] font-bold px-2.5 py-1.5 rounded-full select-none backdrop-blur-md {{ $package->is_active ? 'bg-emerald-500/12 text-emerald-400 border border-emerald-500/20' : 'bg-slate-600/40 text-slate-400 border border-white/5' }}">
                {{ $package->is_active ? 'Active' : 'Hidden' }}
            </span>
        </div>
        @endif
        
        <div class="p-6 flex-1 flex flex-col justify-between">
            <div>
                <span class="text-slate-500 text-[10px] uppercase tracking-widest font-bold block mb-1.5">{{ $package->category }}</span>
                <h3 class="text-white font-display font-bold text-lg leading-snug group-hover:text-emerald-400 transition-colors duration-200 line-clamp-1">{{ $package->title }}</h3>
                <p class="text-slate-400 text-xs mt-2 line-clamp-2 leading-relaxed">{{ $package->subtitle }}</p>
                <p class="text-slate-500 text-xs mt-2.5 font-medium">⏳ Duration: {{ $package->duration }}</p>
            </div>
            
            <div class="flex items-center justify-between mt-6 pt-5 border-t border-white/5">
                <div class="flex flex-col">
                    <span class="text-[9px] font-bold uppercase tracking-wider text-slate-500">Price Value</span>
                    <p class="text-emerald-400 font-display font-bold text-lg leading-tight mt-0.5">৳{{ number_format($package->price) }}</p>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.packages.edit', $package) }}" class="bg-white/[0.04] hover:bg-white/[0.08] border border-white/10 text-white text-xs font-bold px-4 py-2.5 rounded-xl transition-all">Edit</a>
                    <form method="POST" action="{{ route('admin.packages.destroy', $package) }}" onsubmit="return confirm('Delete package: {{ addslashes($package->title) }} permanently?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="bg-red-500/10 hover:bg-red-500/20 border border-red-500/20 text-red-400 text-xs font-bold px-3.5 py-2.5 rounded-xl transition-all">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full glass-panel rounded-[32px] text-center py-20">
        <p class="text-5xl mb-4 text-slate-700">✈</p>
        <h3 class="text-white font-display font-bold text-lg mb-2">No tour packages found</h3>
        <p class="text-slate-500 text-sm max-w-xs mx-auto mb-6">Create package assets to start showcasing them on the client site portal.</p>
        <a href="{{ route('admin.packages.create') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-bold px-6 py-3 rounded-2xl transition-all inline-block shadow-lg shadow-emerald-500/10">Add Package</a>
    </div>
    @endforelse
</div>
@endsection
