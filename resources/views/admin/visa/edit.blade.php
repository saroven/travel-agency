@extends('admin.layouts.app')
@section('title', 'Edit Visa Rule')
@section('page-title', 'Edit Visa: ' . $visa->title)
@section('page-subtitle', 'Configure processing parameters and occupation-specific check-lists')

@section('content')
<div class="w-full">
    <div class="flex items-center gap-2 mb-6">
        <a href="{{ route('admin.visa.index') }}" class="text-slate-400 hover:text-white text-xs font-semibold flex items-center gap-1.5 transition-colors">
            <span>←</span> Back to Visa Desk
        </a>
    </div>

    <form method="POST" action="{{ route('admin.visa.update', $visa) }}" class="space-y-8">
        @csrf @method('PUT')

        {{-- General Parameters --}}
        <div class="glass-panel rounded-[32px] p-6 md:p-8">
            <h3 class="text-white font-display font-bold text-base tracking-tight mb-6 pb-3 border-b border-white/5">General Parameters</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div>
                    <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-2 ml-1">Desk Title</label>
                    <input type="text" name="title" value="{{ old('title', $visa->title) }}" required
                        class="w-full bg-slate-950/60 border border-white/10 rounded-2xl px-4 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all" />
                </div>
                <div>
                    <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-2 ml-1">Price (BDT)</label>
                    <input type="number" name="price" value="{{ old('price', $visa->price) }}" required
                        class="w-full bg-slate-950/60 border border-white/10 rounded-2xl px-4 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all" />
                </div>
                <div>
                    <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-2 ml-1">Processing Duration</label>
                    <input type="text" name="processing_time" value="{{ old('processing_time', $visa->processing_time) }}" required
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
                    @foreach($requirementsByOccupation[$occ] as $req)
                    <div class="flex gap-3 items-center">
                        <input type="text" name="requirements[{{ $occ }}][]" value="{{ $req->requirement }}" required
                            class="flex-1 bg-slate-950/60 border border-white/10 rounded-2xl px-4 py-3 text-white text-xs focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all" />
                        <button type="button" onclick="this.parentElement.remove()" class="text-red-400/80 hover:text-red-400 text-sm font-bold px-2">✕</button>
                    </div>
                    @endforeach
                </div>
                
                <button type="button" onclick="addReq('{{ $occ }}')" class="mt-4 text-emerald-400 hover:text-emerald-300 text-xs font-bold transition-colors flex items-center gap-1">
                    <span>+</span> Add Document Parameter
                </button>
            </div>
            @endforeach
        </div>

        <div class="flex gap-4">
            <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 active:scale-98 text-white font-bold text-sm px-8 py-4 rounded-2xl transition-all shadow-lg shadow-emerald-500/10 cursor-pointer">Save Visa Rule</button>
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
        <input type="text" name="requirements[\${occ}][]" placeholder="Enter document requirement..." required
            class="flex-1 bg-slate-950/60 border border-white/10 rounded-2xl px-4 py-3 text-white text-xs focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all" />
        <button type="button" onclick="this.parentElement.remove()" class="text-red-400/80 hover:text-red-400 text-sm font-bold px-2">✕</button>
    `;
    document.getElementById(`req-\${occ}-list`).appendChild(div);
    div.querySelector('input').focus();
}
</script>
@endpush
