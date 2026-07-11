@extends('admin.layouts.app')
@section('title', 'New Testimonial')
@section('page-title', 'Create Testimonial')
@section('page-subtitle', 'Add client feedback to display on the home page')

@section('content')
<div class="w-full">
    <div class="flex items-center gap-2 mb-6">
        <a href="{{ route('admin.testimonials.index') }}" class="text-slate-400 hover:text-white text-xs font-semibold flex items-center gap-1.5 transition-colors">
            <span>←</span> Back to Testimonials
        </a>
    </div>

    @if($errors->any())
    <div class="glass-panel border-red-500/20 bg-red-950/20 text-red-400 px-5 py-4 rounded-2xl text-xs font-semibold mb-6">
        <ul class="list-disc list-inside space-y-1">
            @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('admin.testimonials.store') }}" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            {{-- Left Column: Name, Designation & Quote --}}
            <div class="lg:col-span-8 space-y-8">
                <div class="glass-panel rounded-[32px] p-6 md:p-8">
                    <h3 class="text-white font-display font-bold text-base tracking-tight mb-6 pb-3 border-b border-white/5">Feedback Details</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Client Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" required placeholder="e.g. Rafsan Mahmud"
                                class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-white text-sm placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all" />
                        </div>
                        <div>
                            <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Company / Designation</label>
                            <input type="text" name="company_or_title" value="{{ old('company_or_title') }}" placeholder="e.g. Head of Operations, Apex Ltd"
                                class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-white text-sm placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all" />
                        </div>
                    </div>

                    <div class="mt-6">
                        <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Feedback Quote</label>
                        <textarea name="quote" rows="5" required placeholder="Paste client feedback here..."
                            class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-white text-sm placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 resize-none transition-all">{{ old('quote') }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Right Column: Star Rating & Visibility --}}
            <div class="lg:col-span-4 space-y-8">
                <div class="glass-panel rounded-[32px] p-6 md:p-8">
                    <h3 class="text-white font-display font-bold text-base tracking-tight mb-6 pb-3 border-b border-white/5">Rating & Status</h3>
                    
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Rating Stars (1-5)</label>
                            <select name="stars" class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 cursor-pointer">
                                <option value="5" selected>5 Stars</option>
                                <option value="4">4 Stars</option>
                                <option value="3">3 Stars</option>
                                <option value="2">2 Stars</option>
                                <option value="1">1 Star</option>
                            </select>
                        </div>
                        <div class="pt-2">
                            <label class="flex items-center gap-3 cursor-pointer select-none">
                                <input type="checkbox" name="is_active" value="1" checked class="rounded border-slate-800 bg-slate-900 text-emerald-500 w-4 h-4 focus:ring-0 focus:ring-offset-0">
                                <span class="text-slate-300 text-sm font-semibold">Active & Displayed on Home</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="flex gap-4 mt-6">
            <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 active:scale-98 text-white font-bold text-sm px-8 py-4 rounded-2xl transition-all shadow-lg shadow-emerald-500/10 cursor-pointer">Create Testimonial</button>
            <a href="{{ route('admin.testimonials.index') }}" class="bg-white/[0.04] hover:bg-white/[0.08] border border-white/10 text-white font-semibold text-sm px-8 py-4 rounded-2xl transition-all">Cancel</a>
        </div>
    </form>
</div>
@endsection
