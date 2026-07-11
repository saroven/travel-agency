@extends('layouts.frontend')
@section('title', 'Airbridge Tours & Travel | Redefining International Travel from Bangladesh')

@section('content')
<!-- Component B: The Hero Workspace ("The Bridge to the World") -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20 lg:mb-32">
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
    
    <!-- Left Split (60%) -->
    <div class="lg:col-span-7 flex flex-col gap-6 text-left">
      <span class="inline-flex items-center self-start gap-2 bg-emerald-100 text-emerald-700 font-sans font-bold text-xs md:text-sm px-4 py-2 rounded-full border border-emerald-500/10">
        ✨ Redefining International Travel from Bangladesh
      </span>
      
      <h1 class="font-display font-extrabold text-4xl sm:text-5xl lg:text-[64px] tracking-tight leading-[1.05] text-slate-900">
        We Build The <span class="text-navy-900 relative">Bridge<span class="absolute bottom-1 left-0 w-full h-[6px] bg-emerald-500/30 rounded-full"></span></span> Between Your <span class="text-emerald-500">Dream</span> & Destination.
      </h1>
      
      <p class="text-slate-600 font-sans font-normal text-base md:text-lg lg:text-xl leading-relaxed max-w-xl">
        Experience flawlessly tailored, 100% guided international tours for modern families, groups, and corporate enterprises. Hassle-free travel starts here.
      </p>
      
      <!-- Smart Multi-Tab Search Widget -->
      <div class="bg-white border border-slate-200/80 shadow-2xl rounded-3xl p-5 md:p-6 mt-4 relative z-20">
        
        <!-- Tab Selectors -->
        <div class="flex gap-2 border-b border-slate-100 pb-4 mb-5">
          <button id="tab-packages" class="search-tab flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-bold transition-all duration-300 bg-emerald-500 text-white shadow-md shadow-emerald-500/10">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
            </svg>
            <span>✈ International Packages</span>
          </button>
          <button id="tab-visa" class="search-tab flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-bold text-slate-500 hover:text-navy-900 hover:bg-slate-50 transition-all duration-300">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
            </svg>
            <span>🛂 Visa Support / Custom Plan</span>
          </button>
        </div>

        <!-- Search Fields Form -->
        <form id="search-widget-form" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
          
          <!-- Destination Select (Dropdown) -->
          <div class="col-span-1 md:col-span-4 text-left">
            <label for="search-destination" class="block font-sans font-bold text-xs uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Destination</label>
            <div class="relative">
              <select id="search-destination" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans font-medium text-slate-800 text-sm focus:outline-none focus:border-emerald-500 appearance-none cursor-pointer">
                @foreach($packages as $p)
                <option value="{{ $p->slug }}">{{ $p->title }}</option>
                @endforeach
                <option value="custom">Other / Custom Destination</option>
              </select>
              <svg class="absolute right-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
              </svg>
            </div>
          </div>

          <!-- Date Window Selector -->
          <div class="col-span-1 md:col-span-4 text-left">
            <label for="search-date" class="block font-sans font-bold text-xs uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Date Window</label>
            <div class="relative">
              <select id="search-date" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans font-medium text-slate-800 text-sm focus:outline-none focus:border-emerald-500 appearance-none cursor-pointer">
                <option value="july-2026">July 2026</option>
                <option value="aug-2026">August 2026</option>
                <option value="sept-2026">September 2026</option>
                <option value="oct-2026">October 2026</option>
                <option value="nov-2026">November 2026</option>
                <option value="dec-2026">December 2026</option>
                <option value="later">2027 & Later</option>
              </select>
              <svg class="absolute right-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
              </svg>
            </div>
          </div>

          <!-- Guest Count Selector -->
          <div class="col-span-1 md:col-span-2 text-left">
            <label for="search-guests" class="block font-sans font-bold text-xs uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Guests</label>
            <div class="relative">
              <select id="search-guests" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans font-medium text-slate-800 text-sm focus:outline-none focus:border-emerald-500 appearance-none cursor-pointer">
                <option value="1">1 Guest</option>
                <option value="2" selected>2 Guests</option>
                <option value="3-5">3-5 Guests</option>
                <option value="6-10">6-10 Guests</option>
                <option value="11+">Corporate (11+)</option>
              </select>
              <svg class="absolute right-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.109A11.386 11.386 0 0110.089 21c-2.243 0-4.32-.647-6.079-1.758a1 1 0 01-.408-.813V18.12c0-2.24 1.766-4.03 3.96-4.14a4.855 4.855 0 013.208.647M15 8.25a3 3 0 11-6 0 3 3 0 016 0zm6 2.25a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zM6 8.25a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
              </svg>
            </div>
          </div>

          <!-- Find Packages CTA -->
          <div class="col-span-1 md:col-span-2">
            <button type="submit" class="w-full bg-emerald-500 hover:bg-emerald-600 active:scale-95 text-white font-sans font-bold text-sm rounded-xl py-3 shadow-lg shadow-emerald-500/20 hover:shadow-emerald-500/30 transition-all duration-300 cursor-pointer">
              Find Packages
            </button>
          </div>
        </form>
      </div>
    </div>
    
    <!-- Right Split (40%) -->
    <div class="lg:col-span-5 relative flex flex-col items-center gap-8 px-4">
      <div class="absolute w-72 h-72 bg-emerald-500/10 rounded-full blur-[80px] -z-10 -top-10 -right-10"></div>
      <div class="absolute w-72 h-72 bg-navy-900/5 rounded-full blur-[80px] -z-10 -bottom-10 -left-10"></div>

      <!-- Overlapping Stack Parent -->
      <div class="relative w-full max-w-[380px] aspect-[4/5]" id="spotlight-carousel">
        @foreach($spotlights as $index => $spotlight)
        <div class="spotlight-slide absolute inset-0 transition-all duration-700 ease-in-out {{ $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none' }}" data-index="{{ $index }}">
          <div class="w-full h-full rounded-[32px] overflow-hidden shadow-2xl border-4 border-white transform hover:rotate-1 transition-transform duration-500 relative">
            <img src="{{ asset('storage/' . $spotlight->image_path) }}" alt="{{ $spotlight->title }}" class="w-full h-full object-cover" />
            
            <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-navy-900/90 via-navy-900/40 to-transparent p-6 text-white text-left z-10">
              <span class="bg-gold-500 text-navy-900 font-sans font-extrabold text-[10px] uppercase tracking-wider px-2.5 py-1 rounded-full">
                Spotlight Destination
              </span>
              <h3 class="font-display font-bold text-lg md:text-xl mt-2.5 leading-tight hover:text-emerald-500 transition-colors">
                <a href="{{ route('packages.show', $spotlight->slug) }}">{{ $spotlight->title }}</a>
              </h3>
              <p class="font-sans font-medium text-xs md:text-sm text-slate-200 mt-1">Starting From ৳{{ number_format($spotlight->price) }} <span class="text-xs text-slate-300">all-inclusive</span></p>
            </div>
          </div>
        </div>
        @endforeach

        <div class="glass-card absolute -top-4 -left-6 px-4 py-3 rounded-2xl shadow-xl flex items-center gap-3 animate-float border border-white/50 z-20">
          <div class="w-8 h-8 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 text-base">🎯</div>
          <div class="flex flex-col text-left">
            <span class="font-display font-extrabold text-navy-900 text-sm leading-none">{{ $settings['milestone_horizons'] ?? '20+' }}</span>
            <span class="font-sans font-semibold text-[10px] text-slate-400 uppercase tracking-wider">Global Horizons</span>
          </div>
        </div>

        <div class="glass-card absolute bottom-12 -right-8 px-4 py-3 rounded-2xl shadow-xl flex items-center gap-3 animate-float-delayed border border-white/50 z-20">
          <div class="w-8 h-8 rounded-full bg-navy-900 text-emerald-500 flex items-center justify-center text-sm">⚡</div>
          <div class="flex flex-col text-left">
            <span class="font-display font-extrabold text-navy-900 text-sm leading-none">
              @if(str_contains(strtolower($settings['milestone_concierge'] ?? '24/7'), 'live'))
                {{ $settings['milestone_concierge'] }}
              @else
                {{ $settings['milestone_concierge'] ?? '24/7' }} Live
              @endif
            </span>
            <span class="font-sans font-semibold text-[10px] text-slate-400 uppercase tracking-wider">Global Concierge</span>
          </div>
        </div>

        @if($spotlights->count() > 1)
        <div class="absolute -bottom-6 left-1/2 transform -translate-x-1/2 flex gap-1.5 z-20">
          @foreach($spotlights as $index => $_)
          <button class="carousel-dot w-2 h-2 rounded-full transition-all duration-300 {{ $index === 0 ? 'bg-emerald-500 w-4' : 'bg-slate-300 hover:bg-slate-450' }}" data-index="{{ $index }}"></button>
          @endforeach
        </div>
        @endif
      </div>

      <!-- Quick Inquiry Card -->
      <div class="w-full max-w-[380px] glass-card p-5 rounded-2xl shadow-xl border border-white/60 text-left hover:shadow-2xl transition-all duration-300">
        <div class="flex items-center gap-2 mb-3">
          <span class="flex h-2 w-2 relative">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
          </span>
          <span class="font-sans font-bold text-xs text-navy-900 uppercase tracking-wider">Quick Inquiry</span>
        </div>
        <p class="font-sans font-medium text-xs text-slate-500 mb-3">Drop your name & number — our team will call you back within 30 minutes.</p>

        <form id="quick-inquiry-form" class="space-y-2">
          <input id="qi-name" type="text" placeholder="Your Full Name" required
            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs font-sans font-medium focus:outline-none focus:border-emerald-500 transition-colors" />
          <input id="qi-phone" type="tel" placeholder="Mobile Number (e.g. 01712...)" required
            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs font-sans font-medium focus:outline-none focus:border-emerald-500 transition-colors" />
          <button id="qi-submit-btn" type="submit"
            class="w-full bg-navy-900 hover:bg-emerald-500 text-white rounded-xl px-4 py-2.5 text-xs font-bold font-sans transition-all duration-300 cursor-pointer">
            Request Callback
          </button>
        </form>
        <p id="qi-success" class="hidden text-emerald-600 font-sans font-bold text-xs text-center mt-2">✓ Received! We'll call you shortly.</p>
        <p id="qi-error" class="hidden text-red-500 font-sans font-semibold text-xs text-center mt-2">Something went wrong. Please try again.</p>
      </div>
    </div>
  </div>
</section>

<!-- Component C: Upgraded Global Destinations Grid -->
<section id="packages" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 bg-slate-50/50 border-y border-slate-200/50 relative">
  <div class="text-center max-w-xl mx-auto mb-16">
    <span class="text-emerald-500 font-sans font-extrabold text-xs uppercase tracking-widest">
      Handpicked Itineraries
    </span>
    <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-slate-900 mt-2 mb-4">
      Curated Global Destinations
    </h2>
    <p class="text-slate-500 font-sans text-sm sm:text-base">
      Skip the planning headaches. Choose our flawlessly executed, fully guided luxury itineraries designed for premium comfort.
    </p>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    @foreach($packages as $package)
    <article class="group bg-white rounded-3xl overflow-hidden shadow-lg border border-slate-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 flex flex-col text-left">
      <div class="relative h-64 overflow-hidden">
        <a href="{{ route('packages.show', $package->slug) }}" class="block w-full h-full">
          <img src="{{ asset('storage/' . $package->image_path) }}" alt="{{ $package->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
        </a>
        <span class="glass-card absolute top-4 left-4 font-sans font-bold text-xs text-navy-900 px-3.5 py-1.5 rounded-full border border-white/40 pointer-events-none">
          {{ $package->category }}
        </span>
      </div>
      
      <div class="p-6 flex-1 flex flex-col justify-between">
        <div>
          <div class="flex items-center gap-1.5 mb-2">
            <span class="text-gold-500 font-sans font-extrabold text-xs">{!! str_repeat('★', $package->stars) !!}</span>
            <span class="text-slate-400 font-sans font-semibold text-[10px] uppercase tracking-wider">({{ $package->reviews_count }}+ Verified Reviews)</span>
          </div>
          <h3 class="font-display font-bold text-xl text-slate-900 group-hover:text-emerald-500 transition-colors duration-200 leading-tight">
            <a href="{{ route('packages.show', $package->slug) }}">{{ $package->title }}</a>
          </h3>
          <p class="text-slate-500 font-sans text-sm mt-2 leading-relaxed line-clamp-3">
            {{ $package->subtitle }}
          </p>
        </div>
        
        <div class="flex items-center justify-between border-t border-slate-100 pt-5 mt-6">
          <div class="flex flex-col">
            <span class="text-[10px] font-sans font-bold uppercase tracking-wider text-slate-400">Starting From</span>
            <span class="font-display font-extrabold text-xl text-navy-900">৳{{ number_format($package->price) }} <span class="font-sans font-medium text-xs text-slate-400">/ traveler</span></span>
          </div>
          
          <button class="open-package-modal w-11 h-11 rounded-full bg-slate-50 group-hover:bg-emerald-500 group-hover:text-white text-navy-900 flex items-center justify-center transition-all duration-300 border border-slate-100 group-hover:border-transparent active:scale-95 cursor-pointer" data-destination="{{ $package->title }}">
            <svg class="w-5 h-5 transform group-hover:translate-x-0.5 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
            </svg>
          </button>
        </div>
      </div>
    </article>
    @endforeach
  </div>
</section>

<!-- Component D: End-to-End Travel Services Ecosystem -->
<section id="services" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
  <div class="text-center max-w-xl mx-auto mb-16">
    <span class="text-emerald-500 font-sans font-extrabold text-xs uppercase tracking-widest">
      Operational Capabilities
    </span>
    <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-slate-900 mt-2 mb-4">
      End-to-End Travel Services
    </h2>
    <p class="text-slate-500 font-sans text-sm sm:text-base">
      Every operational logistics element is handled flawlessly by our direct partnerships and dedicated support desk.
    </p>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-left">
    @foreach($services as $service)
    <div class="bg-white border border-slate-100 hover:border-emerald-500/20 rounded-3xl p-6 shadow-md hover:shadow-xl transition-all duration-300 group flex flex-col justify-between">
      <div>
        <div class="w-12 h-12 bg-navy-900 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-emerald-500 transition-colors duration-300 text-2xl">
          {{ $service->icon }}
        </div>
        <h3 class="font-display font-bold text-xl text-slate-900 mb-2">
          <a href="{{ route('services.show', $service->slug) }}" class="hover:text-emerald-500 transition-colors">{{ $service->title }}</a>
        </h3>
        <p class="text-slate-500 font-sans text-sm leading-relaxed line-clamp-3">
          {{ $service->subtitle }}
        </p>
      </div>
      <div class="mt-4 pt-4 border-t border-slate-100">
        <a href="{{ route('services.show', $service->slug) }}" class="text-emerald-500 hover:text-emerald-600 font-sans font-bold text-xs flex items-center gap-1.5">
          Configure Package <span>→</span>
        </a>
      </div>
    </div>
    @endforeach
  </div>
</section>

<!-- Component E: The Trust Framework (Why Airbridge?) -->
<section id="about" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
    
    <!-- Left: Milestones (50%) -->
    <div class="lg:col-span-5 text-left">
      <span class="text-emerald-500 font-sans font-extrabold text-xs uppercase tracking-widest">
        Performance Records
      </span>
      <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-navy-900 mt-2 mb-6">
        Our Milestones Stand Tall
      </h2>
      <p class="text-slate-600 font-sans text-sm sm:text-base leading-relaxed mb-8">
        Airbridge Tours & Travel bridges dreams to destination with unmatched operational rigor, offering complete transparency at every step of your travel planning.
      </p>
      
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 lg:gap-4 border-t border-slate-200 pt-8">
        <div class="flex flex-col">
          <span class="font-display font-extrabold text-4xl lg:text-5xl text-navy-900">{{ $settings['milestone_horizons'] ?? '20+' }}</span>
          <span class="font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mt-1">Global Horizons</span>
        </div>
        <div class="flex flex-col">
          <span class="font-display font-extrabold text-4xl lg:text-5xl text-emerald-500">{{ $settings['milestone_concierge'] ?? '24/7' }}</span>
          <span class="font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mt-1">Flight Concierge</span>
        </div>
        <div class="flex flex-col">
          <span class="font-display font-extrabold text-4xl lg:text-5xl text-navy-900">{{ $settings['milestone_care'] ?? '100%' }}</span>
          <span class="font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mt-1">Guided Care</span>
        </div>
      </div>
    </div>

    <!-- Right: Testimonial Framework (50%) -->
    <div class="lg:col-span-7 bg-white border border-slate-200/60 rounded-3xl p-8 shadow-xl text-left relative overflow-hidden">
      <div class="absolute -top-6 -right-6 text-[120px] font-display font-extrabold text-slate-100 select-none pointer-events-none leading-none">“</div>
      
      <div class="relative z-10 flex flex-col justify-between h-full min-h-[220px]">
        <div id="review-slider">
          @foreach($testimonials as $i => $t)
          @php
            $words = explode(' ', $t->name);
            $initials = '';
            foreach ($words as $w) {
                $initials .= strtoupper(substr($w, 0, 1));
            }
            $initials = substr($initials, 0, 2);
          @endphp
          <div class="review-slide {{ $i === 0 ? 'block' : 'hidden' }} transition-all duration-300">
            <div class="flex gap-1 text-gold-500 mb-4">{!! str_repeat('★', $t->stars) !!}</div>
            <blockquote class="text-slate-700 font-sans font-medium text-base md:text-lg italic leading-relaxed mb-6">
              "{{ $t->quote }}"
            </blockquote>
            <div class="flex items-center gap-3">
              <div class="w-11 h-11 bg-navy-900 rounded-full flex items-center justify-center font-display font-bold text-white text-sm">{{ $initials }}</div>
              <div class="flex flex-col">
                <span class="font-sans font-bold text-sm text-slate-800 flex items-center gap-1.5">
                  {{ $t->name }}
                  <span class="bg-emerald-100 text-emerald-700 font-sans font-bold text-[8px] uppercase tracking-wider px-2 py-0.5 rounded">Verified Client</span>
                </span>
                <span class="font-sans font-medium text-xs text-slate-400">{{ $t->company_or_title }}</span>
              </div>
            </div>
          </div>
          @endforeach
        </div>

        <!-- Controls -->
        <div class="flex items-center justify-between border-t border-slate-100 pt-6 mt-6">
          <div class="flex gap-1.5">
            @foreach($testimonials as $i => $t)
            <button class="slider-dot w-2 h-2 rounded-full {{ $i === 0 ? 'bg-emerald-500' : 'bg-slate-200' }}" data-slide="{{ $i }}" aria-label="Go to slide {{ $i + 1 }}"></button>
            @endforeach
          </div>
          
          <div class="flex gap-2">
            <button id="slider-prev" class="w-9 h-9 rounded-full bg-slate-50 hover:bg-slate-100 flex items-center justify-center text-navy-900 active:scale-90 transition-all cursor-pointer" aria-label="Previous Slide">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
              </svg>
            </button>
            <button id="slider-next" class="w-9 h-9 rounded-full bg-slate-50 hover:bg-slate-100 flex items-center justify-center text-navy-900 active:scale-90 transition-all cursor-pointer" aria-label="Next Slide">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Component F: High-Conversion Lead Generation -->
<section id="contact" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 my-12">
  <div class="bg-navy-900 text-white rounded-[32px] p-8 md:p-12 lg:p-16 relative overflow-hidden shadow-2xl">
    <div class="absolute right-0 top-0 w-[400px] h-[400px] bg-emerald-500/10 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute left-[-100px] bottom-[-100px] w-[300px] h-[300px] bg-white/5 rounded-full blur-[80px] pointer-events-none"></div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 relative z-10">
      
      <!-- Left Info (50%) -->
      <div class="lg:col-span-6 flex flex-col justify-between text-left gap-8">
        <div>
          <span class="text-emerald-500 font-sans font-bold text-xs uppercase tracking-widest">Direct Planner Consultation</span>
          <h2 class="font-display font-extrabold text-3xl sm:text-4xl lg:text-5xl mt-3 mb-4 leading-tight">Ready to Plan Your Next International Tour?</h2>
          <p class="text-slate-300 font-sans text-sm sm:text-base leading-relaxed">Send our design planners your destination choice, estimated travel dates, and contact configuration. We will build a complete customized framework package in 24 hours.</p>
        </div>

        <div class="flex flex-col gap-4 font-sans border-t border-white/10 pt-8">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-emerald-500">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
              </svg>
            </div>
            <div class="flex flex-col">
              <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Official Email</span>
              <a href="mailto:{{ $settings['contact_email'] ?? 'info@airbridgebd.com' }}" class="text-white hover:text-emerald-500 font-semibold text-sm transition-colors">{{ $settings['contact_email'] ?? 'info@airbridgebd.com' }}</a>
            </div>
          </div>

          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-emerald-500">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-2.824-1.802-5.12-4.098-6.922-6.922l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
              </svg>
            </div>
            <div class="flex flex-col">
              <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">24/7 Hotline Support</span>
              <a href="tel:{{ str_replace(' ', '', $settings['contact_phone'] ?? '+8801711223344') }}" class="text-white hover:text-emerald-500 font-semibold text-sm transition-colors">{{ $settings['contact_phone'] ?? '+880 1711 223344' }}</a>
            </div>
          </div>

          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-emerald-500">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
              </svg>
            </div>
            <div class="flex flex-col">
              <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Corporate Headquarters</span>
              <span class="text-slate-200 font-semibold text-sm">{{ $settings['office_address'] ?? 'Suite 4B, Level 4, Navana Tower, Gulshan 1, Dhaka, Bangladesh' }}</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Flat Form (50%) -->
      <div class="lg:col-span-6 bg-white/5 border border-white/10 rounded-3xl p-6 md:p-8 text-left">
        <h3 class="font-display font-bold text-xl text-white mb-6">Plan Your Custom Trip</h3>
        <form id="footer-contact-form" class="flex flex-col gap-4">
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <label for="contact-name" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5">Full Name</label>
              <input id="contact-name" type="text" placeholder="Your Name" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 font-sans text-sm focus:outline-none focus:border-emerald-500 focus:bg-white/10 transition-colors" />
            </div>
            <div>
              <label for="contact-phone" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5">Phone Number</label>
              <input id="contact-phone" type="tel" placeholder="e.g. +880 1712..." required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 font-sans text-sm focus:outline-none focus:border-emerald-500 focus:bg-white/10 transition-colors" />
            </div>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <label for="contact-destination" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5">Preferred Destination</label>
              <input id="contact-destination" type="text" placeholder="e.g. Dubai Premium" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 font-sans text-sm focus:outline-none focus:border-emerald-500 focus:bg-white/10 transition-colors" />
            </div>
            <div>
              <label for="contact-date" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5">Estimated Date Window</label>
              <input id="contact-date" type="text" placeholder="e.g. October 2026" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 font-sans text-sm focus:outline-none focus:border-emerald-500 focus:bg-white/10 transition-colors" />
            </div>
          </div>

          <div>
            <label for="contact-plan" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5">Travel Plan & Budget Details</label>
            <textarea id="contact-plan" placeholder="Tell us about special requests, guest configurations, or custom destination details..." rows="4" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 font-sans text-sm focus:outline-none focus:border-emerald-500 focus:bg-white/10 transition-colors resize-none"></textarea>
          </div>

          <button id="footer-form-btn" type="submit" class="w-full bg-emerald-500 hover:bg-emerald-600 active:scale-95 text-white font-sans font-bold text-sm rounded-xl py-3.5 shadow-lg shadow-emerald-500/10 hover:shadow-emerald-500/20 transition-all duration-300 cursor-pointer">
            Submit Design Request
          </button>
        </form>
        <div id="footer-form-success" class="hidden mt-4 p-4 bg-emerald-500/20 border border-emerald-500/40 rounded-xl text-emerald-400 font-sans font-semibold text-sm text-center">✓ Request received! Our planner will reach out within 24 hours.</div>
        <div id="footer-form-error" class="hidden mt-4 p-4 bg-red-500/20 border border-red-500/40 rounded-xl text-red-400 font-sans font-semibold text-sm text-center">Something went wrong. Please try again.</div>
      </div>

    </div>
  </div>
</section>

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const slides = document.querySelectorAll('.spotlight-slide');
    const dots = document.querySelectorAll('.carousel-dot');
    if (slides.length > 1) {
      let activeIdx = 0;
      
      const showSlide = (idx) => {
        slides.forEach((slide, i) => {
          if (i === idx) {
            slide.classList.remove('opacity-0', 'z-0', 'pointer-events-none');
            slide.classList.add('opacity-100', 'z-10');
          } else {
            slide.classList.add('opacity-0', 'z-0', 'pointer-events-none');
            slide.classList.remove('opacity-100', 'z-10');
          }
        });
        
        dots.forEach((dot, i) => {
          if (i === idx) {
            dot.classList.add('bg-emerald-500', 'w-4');
            dot.classList.remove('bg-slate-300');
          } else {
            dot.classList.remove('bg-emerald-500', 'w-4');
            dot.classList.add('bg-slate-300');
          }
        });
        activeIdx = idx;
      };

      // Cycle auto
      let interval = setInterval(() => {
        let nextIdx = (activeIdx + 1) % slides.length;
        showSlide(nextIdx);
      }, 5500);

      // Click indicators
      dots.forEach(dot => {
        dot.addEventListener('click', () => {
          clearInterval(interval);
          const idx = parseInt(dot.getAttribute('data-index'));
          showSlide(idx);
          // Restart interval
          interval = setInterval(() => {
            let nextIdx = (activeIdx + 1) % slides.length;
            showSlide(nextIdx);
          }, 5500);
        });
      });
    }

    // Footer Contact Form — Plan Your Custom Trip
    const footerForm = document.getElementById('footer-contact-form');
    if (footerForm) {
      footerForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const btn = document.getElementById('footer-form-btn');
        const successEl = document.getElementById('footer-form-success');
        const errorEl   = document.getElementById('footer-form-error');
        btn.disabled = true;
        btn.textContent = 'Sending...';
        successEl.classList.add('hidden');
        errorEl.classList.add('hidden');
        try {
          const res = await fetch('/api/leads', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
            body: JSON.stringify({
              type:         'consultation',
              name:         document.getElementById('contact-name').value.trim(),
              phone:        document.getElementById('contact-phone').value.trim(),
              destination:  document.getElementById('contact-destination').value.trim(),
              plan_details: (document.getElementById('contact-plan').value.trim() +
                            (document.getElementById('contact-date').value.trim() ? '\nEstimated Date: ' + document.getElementById('contact-date').value.trim() : '')).trim(),
              source_page:  window.location.href,
            })
          });
          if (res.ok) {
            footerForm.classList.add('hidden');
            successEl.classList.remove('hidden');
          } else {
            throw new Error('failed');
          }
        } catch {
          errorEl.classList.remove('hidden');
          btn.disabled = false;
          btn.textContent = 'Submit Design Request';
        }
      });
    }

    // Quick Inquiry Form
    const qiForm = document.getElementById('quick-inquiry-form');
    if (qiForm) {
      qiForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const name = document.getElementById('qi-name').value.trim();
        const phone = document.getElementById('qi-phone').value.trim();
        const btn = document.getElementById('qi-submit-btn');
        const success = document.getElementById('qi-success');
        const error = document.getElementById('qi-error');

        btn.disabled = true;
        btn.textContent = 'Sending...';
        success.classList.add('hidden');
        error.classList.add('hidden');

        try {
          const res = await fetch('/api/leads', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
            body: JSON.stringify({ name, phone, type: 'quick_inquiry', source_page: window.location.href })
          });
          if (res.ok) {
            qiForm.classList.add('hidden');
            success.classList.remove('hidden');
          } else {
            throw new Error('failed');
          }
        } catch {
          error.classList.remove('hidden');
          btn.disabled = false;
          btn.textContent = 'Request Callback';
        }
      });
    }
  });
</script>
@endpush
@endsection
