@extends('admin.layouts.app')
@section('title', 'New Package')
@section('page-title', 'Create Tour Package')
@section('page-subtitle', 'Add a new travel offering to showcase')

@section('content')
<div class="w-full">
    <div class="flex items-center gap-2 mb-6">
        <a href="{{ route('admin.packages.index') }}" class="text-slate-400 hover:text-white text-xs font-semibold flex items-center gap-1.5 transition-colors">
            <span>←</span> Back to Packages
        </a>
    </div>

    @if($errors->any())
    <div class="glass-panel border-red-500/20 bg-red-950/20 text-red-400 px-5 py-4 rounded-2xl text-xs font-semibold mb-6">
        <ul class="list-disc list-inside space-y-1">
            @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('admin.packages.store') }}" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            {{-- Left Column: General Info, Overview & Inclusions/Exclusions (66% width) --}}
            <div class="lg:col-span-8 space-y-8">
                {{-- General Info Card --}}
                <div class="glass-panel rounded-[32px] p-6 md:p-8">
                    <h3 class="text-white font-display font-bold text-base tracking-tight mb-6 pb-3 border-b border-white/5">General Information</h3>
                    
                    <div class="grid grid-cols-1 gap-6">
                        @include('admin.packages._field', ['label'=>'Title','name'=>'title','type'=>'text','placeholder'=>'Dubai Premium Experience'])
                        @include('admin.packages._field', ['label'=>'Custom URL Slug (Optional)','name'=>'slug','type'=>'text','placeholder'=>'dubai-premium-experience'])
                        @include('admin.packages._field', ['label'=>'Subtitle','name'=>'subtitle','type'=>'text','placeholder'=>'A short compelling description'])
                    </div>

                    <div class="mt-6">
                        <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Overview</label>
                        <textarea name="overview" rows="5"
                            class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-white text-sm placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 resize-none transition-all"
                            placeholder="Full description of this tour package...">{{ old('overview') }}</textarea>
                    </div>

                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6 items-end">
                        <div>
                            <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Cover Image</label>
                            <input type="file" name="image" accept="image/*"
                                class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-400 text-sm focus:outline-none file:mr-3 file:text-xs file:bg-emerald-500 file:text-white file:border-0 file:rounded-lg file:px-3 file:py-1.5 file:font-bold cursor-pointer" />
                        </div>
                        <div>
                            <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Gallery Images (Select Multiple)</label>
                            <input type="file" name="gallery[]" accept="image/*" multiple
                                class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-400 text-sm focus:outline-none file:mr-3 file:text-xs file:bg-emerald-500 file:text-white file:border-0 file:rounded-lg file:px-3 file:py-1.5 file:font-bold cursor-pointer" />
                        </div>
                    </div>
                </div>

                {{-- Inclusions / Exclusions --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    {{-- Inclusions --}}
                    <div class="glass-panel rounded-[32px] p-6">
                        <h3 class="text-white font-display font-bold text-base tracking-tight mb-5 flex items-center gap-2"><span class="text-emerald-400">✓</span> Inclusions</h3>
                        <div id="inclusions-list" class="space-y-3">
                            <input type="text" name="inclusions[]" placeholder="e.g. Return flights from Dhaka"
                                class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-2.5 text-white text-sm placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all" />
                        </div>
                        <button type="button" onclick="addRow('inclusions-list','inclusions[]')" class="mt-3 text-emerald-400 hover:text-emerald-300 text-xs font-bold transition-colors flex items-center gap-1">
                            <span>+</span> Add Inclusion
                        </button>
                    </div>
                    
                    {{-- Exclusions --}}
                    <div class="glass-panel rounded-[32px] p-6">
                        <h3 class="text-white font-display font-bold text-base tracking-tight mb-5 flex items-center gap-2"><span class="text-red-400">✗</span> Exclusions</h3>
                        <div id="exclusions-list" class="space-y-3">
                            <input type="text" name="exclusions[]" placeholder="e.g. Visa fee"
                                class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-2.5 text-white text-sm placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all" />
                        </div>
                        <button type="button" onclick="addRow('exclusions-list','exclusions[]')" class="mt-3 text-red-400 hover:text-red-300 text-xs font-bold transition-colors flex items-center gap-1">
                            <span>+</span> Add Exclusion
                        </button>
                    </div>
                </div>
            </div>

            {{-- Right Column: Specs & Settings (33% width) --}}
            <div class="lg:col-span-4 space-y-8">
                {{-- Specifications --}}
                <div class="glass-panel rounded-[32px] p-6 md:p-8 h-full">
                    <h3 class="text-white font-display font-bold text-base tracking-tight mb-6 pb-3 border-b border-white/5">Pricing & Limits</h3>
                    
                    <div class="grid grid-cols-1 gap-5">
                        @include('admin.packages._field', ['label'=>'Category','name'=>'category','type'=>'text','placeholder'=>'City & Desert Safari'])
                        @include('admin.packages._field', ['label'=>'Duration Label','name'=>'duration','type'=>'text','placeholder'=>'5 Days / 4 Nights'])
                        @include('admin.packages._field', ['label'=>'Duration (Days)','name'=>'duration_days','type'=>'number','placeholder'=>'5'])
                        @include('admin.packages._field', ['label'=>'Price (BDT)','name'=>'price','type'=>'number','placeholder'=>'65000'])
                        @include('admin.packages._field', ['label'=>'Stars (1-5)','name'=>'stars','type'=>'number','placeholder'=>'5'])
                        @include('admin.packages._field', ['label'=>'Review Count','name'=>'reviews_count','type'=>'number','placeholder'=>'240'])
                        
                        <div class="pt-2 space-y-3">
                            <label class="flex items-center gap-3 cursor-pointer select-none">
                                <input type="checkbox" name="is_active" value="1" checked class="rounded border-slate-800 bg-slate-900 text-emerald-500 w-4 h-4 focus:ring-0 focus:ring-offset-0">
                                <span class="text-slate-300 text-sm font-semibold">Active & Visible in Catalog</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer select-none">
                                <input type="checkbox" name="is_spotlight" value="1" class="rounded border-slate-800 bg-slate-900 text-emerald-500 w-4 h-4 focus:ring-0 focus:ring-offset-0">
                                <span class="text-slate-300 text-sm font-semibold">Featured Spotlight Destination</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Full Width Bottom Row: Timeline --}}
            <div class="lg:col-span-12">
                <div class="glass-panel rounded-[32px] p-6 md:p-8">
                    <div class="flex items-center justify-between mb-6 pb-3 border-b border-white/5">
                        <h3 class="text-white font-display font-bold text-base tracking-tight">Timeline & Itinerary</h3>
                        <button type="button" onclick="addDay()" class="bg-white/[0.04] hover:bg-white/[0.08] border border-white/10 text-white text-xs font-bold px-4 py-2.5 rounded-xl transition-all">+ Add Day</button>
                    </div>
                    <div id="days-list" class="space-y-5"></div>
                </div>
            </div>

        </div>

        <div class="flex gap-4">
            <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 active:scale-98 text-white font-bold text-sm px-8 py-4 rounded-2xl transition-all shadow-lg shadow-emerald-500/10 cursor-pointer">Create Package</button>
            <a href="{{ route('admin.packages.index') }}" class="bg-white/[0.04] hover:bg-white/[0.08] border border-white/10 text-white font-semibold text-sm px-8 py-4 rounded-2xl transition-all">Cancel</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
let dayCount = 0;

function addDay() {
    dayCount++;
    const div = document.createElement('div');
    div.className = 'bg-slate-950/40 border border-white/5 rounded-2xl p-5 space-y-4';
    div.innerHTML = `
        <div class="flex justify-between items-center">
            <span class="text-emerald-400 text-xs font-bold uppercase tracking-widest">Day ${dayCount}</span>
            <button type="button" onclick="this.parentElement.parentElement.remove(); reNumberDays();" class="text-red-400 hover:text-red-300 text-xs font-bold">Remove Day</button>
        </div>
        <div>
            <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Day Title</label>
            <input type="text" name="days[\${dayCount-1}][title]" placeholder="Day \${dayCount}: Arrival & City Tour" required
                class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-2.5 text-white text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all" />
        </div>
        <div>
            <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Description</label>
            <textarea name="days[\${dayCount-1}][description]" rows="3" placeholder="Describe what happens on this day..." required
                class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-2.5 text-white text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 resize-none transition-all"></textarea>
        </div>
    `;
    document.getElementById('days-list').appendChild(div);
}

function reNumberDays() {
    document.querySelectorAll('#days-list > div').forEach((div, i) => {
        div.querySelector('span').textContent = `Day ${i + 1}`;
        div.querySelectorAll('input,textarea').forEach(el => {
            el.name = el.name.replace(/days\[\d+\]/, `days[${i}]`);
        });
    });
    dayCount = document.querySelectorAll('#days-list > div').length;
}

function addRow(containerId, inputName) {
    const input = document.createElement('input');
    input.type = 'text';
    input.name = inputName;
    input.placeholder = 'Enter item detail...';
    input.className = 'w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-2.5 text-white text-sm placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all';
    document.getElementById(containerId).appendChild(input);
    input.focus();
}
</script>
@endpush
