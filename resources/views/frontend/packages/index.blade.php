@extends('layouts.frontend')
@section('title', 'Curated Tour Packages | Airbridge Tours & Travel Bangladesh')
@section('meta_description', 'Browse and search through Airbridge\'s elite, 100% guided international tour packages including Dubai, Thailand, Singapore, Bali, Maldives, and Malaysia.')

@section('content')
<!-- Hero Header Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12 text-left">
  <div class="max-w-3xl">
    <span class="inline-flex items-center gap-2 bg-emerald-100 text-emerald-700 font-sans font-bold text-xs md:text-sm px-4 py-2 rounded-full border border-emerald-500/10">
      ✈ Guided Leisure & Business Travel
    </span>
    <h1 class="font-display font-extrabold text-4xl sm:text-5xl lg:text-6xl tracking-tight leading-none text-slate-900 mt-4 mb-4">
      Curated International <span class="text-emerald-500">Tours</span>
    </h1>
    <p class="text-slate-600 font-sans text-base md:text-lg leading-relaxed">
      Experience handpicked, fully transparent packages planned with 5-star accommodations, reliable transfers, and 24/7 global concierge desks. Select your destination below.
    </p>
  </div>
</section>

<!-- Search & Filters Workspace -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
  <div class="bg-white border border-slate-200/80 shadow-lg rounded-3xl p-5 md:p-6 text-left">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
      
      <!-- Search Text -->
      <div class="col-span-1 md:col-span-4 text-left">
        <label for="package-search-input" class="block font-sans font-bold text-xs uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Search Destination</label>
        <div class="relative">
          <input id="package-search-input" type="text" placeholder="e.g. Dubai, Bali, Singapore..." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 pl-10 font-sans font-medium text-slate-800 text-sm focus:outline-none focus:border-emerald-500" />
          <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
          </svg>
        </div>
      </div>

      <!-- Filter Duration -->
      <div class="col-span-1 md:col-span-3 text-left">
        <label for="filter-duration" class="block font-sans font-bold text-xs uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Duration</label>
        <div class="relative">
          <select id="filter-duration" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans font-medium text-slate-800 text-sm focus:outline-none focus:border-emerald-500 appearance-none cursor-pointer">
            <option value="all">All Durations</option>
            <option value="4-5">4 - 5 Days</option>
            <option value="6+">6+ Days</option>
          </select>
          <svg class="absolute right-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
          </svg>
        </div>
      </div>

      <!-- Filter Budget -->
      <div class="col-span-1 md:col-span-3 text-left">
        <label for="filter-budget" class="block font-sans font-bold text-xs uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Max Budget per Traveler</label>
        <div class="relative">
          <select id="filter-budget" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans font-medium text-slate-800 text-sm focus:outline-none focus:border-emerald-500 appearance-none cursor-pointer">
            <option value="all">All Budgets</option>
            <option value="under-50k">Under ৳50,000</option>
            <option value="50k-70k">৳50,000 - ৳70,000</option>
            <option value="over-70k">Over ৳70,000</option>
          </select>
          <svg class="absolute right-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
          </svg>
        </div>
      </div>

      <!-- Reset Button -->
      <div class="col-span-1 md:col-span-2">
        <button id="reset-filters-btn" class="w-full bg-navy-900 hover:bg-emerald-500 text-white font-sans font-bold text-sm rounded-xl py-3 transition-colors duration-300 cursor-pointer">
          Reset Filters
        </button>
      </div>
      
    </div>
  </div>
</section>

<!-- Packages Grid Catalog -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-24">
  <div id="packages-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($packages as $package)
    <article class="package-item group bg-white rounded-3xl overflow-hidden shadow-lg border border-slate-100 hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col text-left" data-title="{{ $package->title }}" data-duration="{{ $package->duration_days }}" data-budget="{{ $package->price }}">
      <div class="relative h-60 overflow-hidden">
        <a href="{{ route('packages.show', $package->slug) }}" class="block w-full h-full">
          <img src="{{ asset('storage/' . $package->image_path) }}" alt="{{ $package->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
        </a>
        <span class="glass-card absolute top-4 left-4 font-sans font-bold text-xs text-navy-900 px-3.5 py-1.5 rounded-full border border-white/40 pointer-events-none">
          {{ $package->category }}
        </span>
        <span class="absolute bottom-4 right-4 bg-navy-900/90 backdrop-blur text-white text-xs font-bold font-sans px-3 py-1 rounded-lg pointer-events-none">
          {{ $package->duration }}
        </span>
      </div>
      
      <div class="p-6 flex-1 flex flex-col justify-between">
        <div>
          <div class="flex items-center gap-1.5 mb-2">
            <span class="text-gold-500 font-sans font-extrabold text-xs">{!! str_repeat('★', $package->stars) !!}</span>
            <span class="text-slate-400 font-sans font-semibold text-[10px] uppercase tracking-wider">({{ $package->reviews_count }}+ Reviews)</span>
          </div>
          <h3 class="font-display font-bold text-xl text-slate-900 group-hover:text-emerald-500 transition-colors duration-200 leading-tight">
            <a href="{{ route('packages.show', $package->slug) }}">{{ $package->title }}</a>
          </h3>
          <p class="text-slate-500 font-sans text-xs mt-2 leading-relaxed mb-4 line-clamp-3">
            {{ $package->subtitle }}
          </p>
          <ul class="text-slate-600 font-sans text-xs space-y-1.5 mb-6">
            @foreach(array_slice($package->inclusions ?? [], 0, 3) as $inc)
            <li class="flex items-center gap-2">✓ {{ $inc }}</li>
            @endforeach
          </ul>
        </div>
        
        <div class="flex items-center justify-between border-t border-slate-100 pt-5 mt-auto">
          <div class="flex flex-col">
            <span class="text-[10px] font-sans font-bold uppercase tracking-wider text-slate-400">Starting From</span>
            <span class="font-display font-extrabold text-lg text-navy-900">৳{{ number_format($package->price) }} <span class="font-sans font-medium text-xs text-slate-400">/ traveler</span></span>
          </div>
          <button class="open-package-modal w-10 h-10 rounded-full bg-slate-50 group-hover:bg-emerald-500 group-hover:text-white text-navy-900 flex items-center justify-center transition-all duration-300 border border-slate-100 group-hover:border-transparent active:scale-95 cursor-pointer" data-destination="{{ $package->title }}">
            <svg class="w-4 h-4 transform group-hover:translate-x-0.5 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
            </svg>
          </button>
        </div>
      </div>
    </article>
    @endforeach
  </div>
</section>
@endsection
