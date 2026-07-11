@extends('admin.layouts.app')
@section('title', 'New Visa Rule')
@section('page-title', 'Create Visa Desk')
@section('page-subtitle', 'Add a new country and configure occupation checklists')

@section('content')
<div class="w-full">
    <div class="flex items-center gap-2 mb-6">
        <a href="{{ route('admin.visa.index') }}" class="text-slate-400 hover:text-white text-xs font-semibold flex items-center gap-1.5 transition-colors">
            <span>←</span> Back to Visa Desk
        </a>
    </div>

    @if($errors->any())
    <div class="glass-panel border-red-500/20 bg-red-950/20 text-red-400 px-5 py-4 rounded-2xl text-xs font-semibold mb-6">
        <ul class="list-disc list-inside space-y-1">
            @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('admin.visa.store') }}" class="space-y-8">
        @csrf

        {{-- General Parameters --}}
        <div class="glass-panel rounded-[32px] p-6 md:p-8">
            <h3 class="text-white font-display font-bold text-base tracking-tight mb-6 pb-3 border-b border-white/5">General Parameters</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <div>
                    <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-2 ml-1">Country Code</label>
                    <input type="text" name="country_code" value="{{ old('country_code') }}" required placeholder="e.g. uk"
                        class="w-full bg-slate-950/60 border border-white/10 rounded-2xl px-4 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all" />
                </div>
                <div>
                    <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-2 ml-1">Desk Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" required placeholder="e.g. United Kingdom Support"
                        class="w-full bg-slate-950/60 border border-white/10 rounded-2xl px-4 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all" />
                </div>
                <div>
                    <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-2 ml-1">Price (BDT)</label>
                    <input type="number" name="price" value="{{ old('price') }}" required placeholder="e.g. 18000"
                        class="w-full bg-slate-950/60 border border-white/10 rounded-2xl px-4 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all" />
                </div>
                <div>
                    <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-2 ml-1">Processing Duration</label>
                    <input type="text" name="processing_time" value="{{ old('processing_time') }}" required placeholder="e.g. 10-15 Working Days"
                        class="w-full bg-slate-950/60 border border-white/10 rounded-2xl px-4 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all" />
                </div>
            </div>
        </div>

        {{-- Requirements per occupation --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @foreach($occupations as $occ)
            <div class="glass-panel rounded-[32px] p-6">
                <h3 class="text-white font-display font-bold text-base tracking-tight mb-5 capitalize flex items-center gap-2">
                    <span class="w-2.5 h-2.5 bg-emerald-400 rounded-full shadow-lg shadow-emerald-500/30"></span>
                    {{ $occ }} Checklist
                </h3>
                
                <div id="req-{{ $occ }}-list" class="space-y-3">
                    <div class="flex gap-3 items-center">
                        <input type="text" name="requirements[{{ $occ }}][]" placeholder="e.g. Color scan copy of Passport"
                            class="flex-1 bg-slate-950/60 border border-white/10 rounded-2xl px-4 py-3 text-white text-xs focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all" />
                        <button type="button" onclick="this.parentElement.remove()" class="text-red-400/80 hover:text-red-400 text-sm font-bold px-2">✕</button>
                    </div>
                </div>
                
                <button type="button" onclick="addReq('{{ $occ }}')" class="mt-4 text-emerald-400 hover:text-emerald-300 text-xs font-bold transition-colors flex items-center gap-1">
                    <span>+</span> Add Document Parameter
                </button>
            </div>
            @endforeach
        </div>

        <div class="flex gap-4">
            <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 active:scale-98 text-white font-bold text-sm px-8 py-4 rounded-2xl transition-all shadow-lg shadow-emerald-500/10 cursor-pointer">Create Visa Rule</button>
            <a href="{{ route('admin.visa.index') }}" class="bg-white/[0.04] hover:bg-white/[0.08] border border-white/10 text-white font-semibold text-sm px-8 py-4 rounded-2xl transition-all">Cancel</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
function addReq(occ) {
    const div = document.createElement('div');
    div.className = 'flex gap-3 items-center';
    div.innerHTML = `
        <input type="text" name="requirements[\${occ}][]" placeholder="Enter document requirement..."
            class="flex-1 bg-slate-950/60 border border-white/10 rounded-2xl px-4 py-3 text-white text-xs focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all" />
        <button type="button" onclick="this.parentElement.remove()" class="text-red-400/80 hover:text-red-400 text-sm font-bold px-2">✕</button>
    `;
    document.getElementById(`req-\${occ}-list`).appendChild(div);
    div.querySelector('input').focus();
}
</script>
@endpush
