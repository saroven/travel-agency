@extends('admin.layouts.app')
@section('title', 'Client Testimonials')
@section('page-title', 'Client Testimonials')
@section('page-subtitle', 'Manage customer feedback and ratings displayed on the home page')

@section('content')
<div class="flex justify-end mb-8">
    <a href="{{ route('admin.testimonials.create') }}" class="bg-emerald-500 hover:bg-emerald-600 active:scale-95 text-white text-sm font-bold px-6 py-3.5 rounded-2xl transition-all flex items-center gap-2 shadow-lg shadow-emerald-500/10">
        <span class="text-base leading-none">+</span> Add Testimonial
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    @forelse($testimonials as $t)
    <div class="glass-panel rounded-[32px] p-6 hover:border-slate-700 hover:shadow-xl hover:shadow-slate-950/20 transition-all duration-300 flex flex-col justify-between group">
        <div>
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-emerald-500/10 border border-emerald-500/20 rounded-full flex items-center justify-center text-emerald-400 font-bold text-sm">
                        {{ strtoupper(substr($t->name, 0, 1)) }}
                    </div>
                    <div>
                        <h3 class="text-white font-semibold group-hover:text-emerald-400 transition-colors duration-200">{{ $t->name }}</h3>
                        <p class="text-slate-500 text-xs mt-0.5">{{ $t->company_or_title }}</p>
                    </div>
                </div>
                <span class="text-[10px] font-bold px-2.5 py-1.5 rounded-full select-none backdrop-blur-md {{ $t->is_active ? 'bg-emerald-500/12 text-emerald-400 border border-emerald-500/20' : 'bg-slate-600/40 text-slate-400 border border-white/5' }}">
                    {{ $t->is_active ? 'Active' : 'Hidden' }}
                </span>
            </div>
            
            <div class="flex gap-1 text-yellow-500 mb-3 text-xs">
                {!! str_repeat('★', $t->stars) !!}
            </div>
            
            <blockquote class="text-slate-400 text-xs italic leading-relaxed mb-6">
                "{{ $t->quote }}"
            </blockquote>
        </div>
        
        <div class="flex items-center justify-end gap-2 pt-4 border-t border-white/5">
            <a href="{{ route('admin.testimonials.edit', $t) }}" class="bg-white/[0.04] hover:bg-white/[0.08] border border-white/10 text-white text-xs font-bold px-4 py-2.5 rounded-xl transition-all">Edit</a>
            <form method="POST" action="{{ route('admin.testimonials.destroy', $t) }}" onsubmit="return confirm('Delete testimonial from {{ addslashes($t->name) }} permanently?')">
                @csrf @method('DELETE')
                <button type="submit" class="bg-red-500/10 hover:bg-red-500/20 border border-red-500/20 text-red-400 text-xs font-bold px-3.5 py-2.5 rounded-xl transition-all">Delete</button>
            </form>
        </div>
    </div>
    @empty
    <div class="col-span-full glass-panel rounded-[32px] text-center py-20">
        <p class="text-5xl mb-4 text-slate-700">💬</p>
        <h3 class="text-white font-display font-bold text-lg mb-2">No testimonials found</h3>
        <p class="text-slate-500 text-sm max-w-xs mx-auto mb-6">Create testimonial assets to start showcasing client feedback on the home page.</p>
        <a href="{{ route('admin.testimonials.create') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-bold px-6 py-3 rounded-2xl transition-all inline-block shadow-lg shadow-emerald-500/10">Add Testimonial</a>
    </div>
    @endforelse
</div>

<div class="mt-8">
    {{ $testimonials->links() }}
</div>
@endsection
