@extends('admin.layouts.app')
@section('title', 'New Service')
@section('page-title', 'Create Service')
@section('page-subtitle', 'Configure a new custom service offering')

@section('content')
<div class="w-full">
    <div class="flex items-center gap-2 mb-6">
        <a href="{{ route('admin.services.index') }}" class="text-slate-400 hover:text-white text-xs font-semibold flex items-center gap-1.5 transition-colors">
            <span>←</span> Back to Services
        </a>
    </div>

    @if($errors->any())
    <div class="glass-panel border-red-500/20 bg-red-950/20 text-red-400 px-5 py-4 rounded-2xl text-xs font-semibold mb-6">
        <ul class="list-disc list-inside space-y-1">
            @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('admin.services.store') }}" class="space-y-8">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            {{-- Left Column: General Info --}}
            <div class="lg:col-span-8 space-y-8">
                <div class="glass-panel rounded-[32px] p-6 md:p-8">
                    <h3 class="text-white font-display font-bold text-base tracking-tight mb-6 pb-3 border-b border-white/5">General Information</h3>
                    
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Service Title</label>
                            <input type="text" name="title" value="{{ old('title') }}" required placeholder="e.g. Flight Booking Desk"
                                class="w-full bg-slate-900 border border-slate-800 rounded-xl px-5 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all" />
                        </div>
                        <div>
                            <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Tagline Subtitle</label>
                            <input type="text" name="subtitle" value="{{ old('subtitle') }}" required placeholder="e.g. Instant ticketing and seating reservations globally"
                                class="w-full bg-slate-900 border border-slate-800 rounded-xl px-5 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all" />
                        </div>
                        <div>
                            <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Overview Copy</label>
                            <textarea name="overview" rows="5" required placeholder="Describe what this service handles..."
                                class="w-full bg-slate-900 border border-slate-800 rounded-xl px-5 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 resize-none transition-all">{{ old('overview') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Column: Side configs --}}
            <div class="lg:col-span-4 space-y-8">
                <div class="glass-panel rounded-[32px] p-6 md:p-8">
                    <h3 class="text-white font-display font-bold text-base tracking-tight mb-6 pb-3 border-b border-white/5">Branding & Status</h3>
                    
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Icon Representation (Emoji)</label>
                            <input type="text" name="icon" value="{{ old('icon') }}" required placeholder="e.g. ✈"
                                class="w-full bg-slate-900 border border-slate-800 rounded-xl px-5 py-3 text-white text-sm text-center focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all" />
                        </div>
                        <div class="pt-2">
                            <label class="flex items-center gap-3 cursor-pointer select-none">
                                <input type="checkbox" name="is_active" value="1" checked class="rounded border-slate-800 bg-slate-900 text-emerald-500 w-4 h-4 focus:ring-0 focus:ring-offset-0">
                                <span class="text-slate-300 text-sm font-semibold">Active & Visible in Catalog</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Bottom Row: Core Selling Points --}}
            <div class="lg:col-span-12">
                <div class="glass-panel rounded-[32px] p-6 md:p-8">
                    <div class="flex items-center justify-between mb-6 pb-3 border-b border-white/5">
                        <h3 class="text-white font-display font-bold text-base tracking-tight">Core Selling Points & Benefits</h3>
                        <button type="button" onclick="addBenefit()" class="bg-white/[0.04] hover:bg-white/[0.08] border border-white/10 text-white text-xs font-bold px-4 py-2.5 rounded-xl transition-all">+ Add Selling Point</button>
                    </div>
                    
                    <div id="benefits-list" class="space-y-4">
                        <div class="grid grid-cols-12 gap-3 items-center bg-slate-950/40 border border-white/5 p-4 rounded-2xl">
                            <div class="col-span-1">
                                <label class="block text-slate-500 text-[9px] font-bold uppercase tracking-wider mb-1 text-center">Icon</label>
                                <input type="text" name="benefits[0][icon]" placeholder="✈"
                                    class="w-full bg-slate-900 border border-slate-800 rounded-xl px-2 py-2 text-white text-sm text-center focus:outline-none focus:border-emerald-500 focus:ring-1" />
                            </div>
                            <div class="col-span-3">
                                <label class="block text-slate-500 text-[9px] font-bold uppercase tracking-wider mb-1">Title</label>
                                <input type="text" name="benefits[0][title]" placeholder="Feature Title"
                                    class="w-full bg-slate-900 border border-slate-800 rounded-xl px-3.5 py-2 text-white text-xs focus:outline-none focus:border-emerald-500 focus:ring-1" />
                            </div>
                            <div class="col-span-7">
                                <label class="block text-slate-500 text-[9px] font-bold uppercase tracking-wider mb-1">Description</label>
                                <input type="text" name="benefits[0][desc]" placeholder="Describe the selling point detail..."
                                    class="w-full bg-slate-900 border border-slate-800 rounded-xl px-3.5 py-2 text-white text-xs focus:outline-none focus:border-emerald-500 focus:ring-1" />
                            </div>
                            <div class="col-span-1 text-center mt-4">
                                <button type="button" onclick="this.parentElement.parentElement.remove()" class="text-red-400 hover:text-red-350 text-xs font-bold">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="flex gap-4">
            <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 active:scale-98 text-white font-bold text-sm px-8 py-4 rounded-2xl transition-all shadow-lg shadow-emerald-500/10 cursor-pointer">Create Service</button>
            <a href="{{ route('admin.services.index') }}" class="bg-white/[0.04] hover:bg-white/[0.08] border border-white/10 text-white font-semibold text-sm px-8 py-4 rounded-2xl transition-all">Cancel</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
let benefitCount = 1;
function addBenefit() {
    const div = document.createElement('div');
    div.className = 'grid grid-cols-12 gap-3 items-center bg-slate-950/40 border border-white/5 p-4 rounded-2xl animate-fade-in';
    div.innerHTML = `
        <div class="col-span-1">
            <label class="block text-slate-500 text-[9px] font-bold uppercase tracking-wider mb-1 text-center">Icon</label>
            <input type="text" name="benefits[\${benefitCount}][icon]" placeholder="✈" class="w-full bg-slate-900 border border-slate-800 rounded-xl px-2 py-2 text-white text-sm text-center focus:outline-none focus:border-emerald-500 focus:ring-1" />
        </div>
        <div class="col-span-3">
            <label class="block text-slate-500 text-[9px] font-bold uppercase tracking-wider mb-1">Title</label>
            <input type="text" name="benefits[\${benefitCount}][title]" placeholder="Feature Title" class="w-full bg-slate-900 border border-slate-800 rounded-xl px-3.5 py-2 text-white text-xs focus:outline-none focus:border-emerald-500 focus:ring-1" />
        </div>
        <div class="col-span-7">
            <label class="block text-slate-500 text-[9px] font-bold uppercase tracking-wider mb-1">Description</label>
            <input type="text" name="benefits[\${benefitCount}][desc]" placeholder="Describe the selling point detail..." class="w-full bg-slate-900 border border-slate-800 rounded-xl px-3.5 py-2 text-white text-xs focus:outline-none focus:border-emerald-500 focus:ring-1" />
        </div>
        <div class="col-span-1 text-center mt-4">
            <button type="button" onclick="this.parentElement.parentElement.remove()" class="text-red-400 hover:text-red-350 text-xs font-bold">Delete</button>
        </div>
    `;
    document.getElementById('benefits-list').appendChild(div);
    benefitCount++;
}
</script>
@endpush
