@extends('layouts.frontend')
@section('title', 'Bespoke Travel Services | ' . ($settings['site_name'] ?? 'Airbridge') . ' ' . ($settings['site_tagline'] ?? 'Tours & Travel') . ' Bangladesh')
@section('meta_description', 'Explore our end-to-end travel services including direct flight ticketing, luxury hotel bookings, custom tour itineraries, private transits, and group tour management.')

@section('content')
<!-- Hero Header Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16 text-left">
  <div class="max-w-3xl">
    <span class="inline-flex items-center gap-2 bg-emerald-100 text-emerald-700 font-sans font-bold text-xs md:text-sm px-4 py-2 rounded-full border border-emerald-500/10">
      ⚙ End-to-End Travel Logistics
    </span>
    <h1 class="font-display font-extrabold text-4xl sm:text-5xl lg:text-6xl tracking-tight leading-none text-slate-900 mt-4 mb-4">
      Everything You Need for a <span class="text-emerald-500">Perfect Trip</span>
    </h1>
    <p class="text-slate-600 font-sans text-base md:text-lg leading-relaxed">
      From direct ticketing integrations to custom day-by-day itineraries and private chauffeurs, explore the operational capabilities that back every {{ $settings['site_name'] ?? 'Airbridge' }} voyage.
    </p>
  </div>
</section>

<!-- Detailed Services Section Grid -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-24">
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($services as $service)
    <div class="bg-white border border-slate-200/80 p-8 rounded-3xl shadow-lg hover:shadow-xl transition-all duration-300 flex flex-col justify-between text-left group">
      <div>
        <div class="w-12 h-12 bg-navy-900 group-hover:bg-emerald-500 text-emerald-500 group-hover:text-white rounded-2xl flex items-center justify-center text-xl font-bold mb-6 transition-all duration-300">
          {{ $service->icon }}
        </div>
        <h3 class="font-display font-bold text-xl text-slate-900 mb-3">
          <a href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a>
        </h3>
        <p class="text-slate-500 font-sans text-sm leading-relaxed mb-6 line-clamp-4">
          {{ $service->subtitle }}
        </p>
      </div>
      <a href="{{ route('services.show', $service->slug) }}" class="w-full text-center bg-slate-50 hover:bg-emerald-500 hover:text-white text-navy-900 text-xs font-bold font-sans py-3 rounded-xl transition-colors duration-300 block">
        Inquire {{ $service->title }}
      </a>
    </div>
    @endforeach
  </div>
</section>
@endsection
