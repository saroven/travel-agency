@props(['label', 'name', 'type' => 'text', 'placeholder' => ''])
<div>
    <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" value="{{ old($name) }}" placeholder="{{ $placeholder }}"
        class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-2.5 text-white text-sm placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all @error($name) border-red-500/50 @enderror" />
    @error($name)<p class="text-red-400 text-xs mt-1.5 ml-1 font-semibold">{{ $message }}</p>@enderror
</div>
