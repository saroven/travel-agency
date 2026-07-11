@extends('layouts.frontend')
@section('title', 'About Our Travel Agency | Airbridge Tours & Travel Bangladesh')
@section('meta_description', 'Learn about the values, milestones, and guided travel frameworks behind Airbridge Tours & Travel, the leading premium agency in Bangladesh.')

@section('content')
<!-- Hero Header Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20 text-left -mt-8">
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
    <!-- Text content -->
    <div class="lg:col-span-7 flex flex-col gap-4">
      <span class="inline-flex items-center self-start gap-2 bg-emerald-100 text-emerald-700 font-sans font-bold text-xs md:text-sm px-4 py-2 rounded-full border border-emerald-500/10">
        ⚓ {{ $settings['about_badge'] ?? 'Founded with Trust in Bangladesh' }}
      </span>
      <h1 class="font-display font-extrabold text-4xl sm:text-5xl lg:text-6xl tracking-tight leading-none text-slate-900 mt-2 mb-4">
        {!! $settings['about_heading'] ?? 'We Build The <span class="text-emerald-500">Bridge</span> to the World' !!}
      </h1>
      <p class="text-slate-600 font-sans text-base md:text-lg leading-relaxed max-w-xl">
        {{ $settings['about_description'] ?? 'Airbridge Tours & Travel was established with a singular mission: to eliminate the headaches, hidden costs, and operational stresses associated with international holiday planning from Bangladesh. We believe that global exploration should be flawless, guided, and premium.' }}
      </p>
    </div>

    <!-- Asymmetrical Stats Grid -->
    <div class="lg:col-span-5 grid grid-cols-2 gap-6">
      <div class="bg-white border border-slate-100 shadow-md p-6 rounded-3xl text-left">
        <span class="font-display font-extrabold text-3xl sm:text-4xl text-navy-900">{{ $settings['about_stat_corporate_val'] ?? '1200+' }}</span>
        <p class="font-sans text-xs text-slate-400 font-bold uppercase tracking-wider mt-1.5 leading-none">{{ $settings['about_stat_corporate_label'] ?? 'Corporate Travelers' }}</p>
      </div>
      <div class="bg-white border border-slate-100 shadow-md p-6 rounded-3xl text-left">
        <span class="font-display font-extrabold text-3xl sm:text-4xl text-emerald-500">{{ $settings['about_stat_visa_val'] ?? '99.4%' }}</span>
        <p class="font-sans text-xs text-slate-400 font-bold uppercase tracking-wider mt-1.5 leading-none">{{ $settings['about_stat_visa_label'] ?? 'Visa Approval Rate' }}</p>
      </div>
      <div class="bg-white border border-slate-100 shadow-md p-6 rounded-3xl text-left">
        <span class="font-display font-extrabold text-3xl sm:text-4xl text-emerald-500">{{ $settings['about_stat_airlines_val'] ?? '12+' }}</span>
        <p class="font-sans text-xs text-slate-400 font-bold uppercase tracking-wider mt-1.5 leading-none">{{ $settings['about_stat_airlines_label'] ?? 'Airline Partners' }}</p>
      </div>
      <div class="bg-white border border-slate-100 shadow-md p-6 rounded-3xl text-left">
        <span class="font-display font-extrabold text-3xl sm:text-4xl text-navy-900">{{ $settings['about_stat_market_val'] ?? '2027' }}</span>
        <p class="font-sans text-xs text-slate-400 font-bold uppercase tracking-wider mt-1.5 leading-none">{{ $settings['about_stat_market_label'] ?? 'Market Ready' }}</p>
      </div>
    </div>
  </div>
</section>

<!-- Core Operational Standards -->
<section class="bg-slate-50 border-y border-slate-200/50 py-20 text-left">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mb-16">
      <span class="text-emerald-500 font-sans font-extrabold text-xs uppercase tracking-widest">{{ $settings['about_pillars_badge'] ?? 'Our Guiding Pillars' }}</span>
      <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-navy-900 mt-2">{{ $settings['about_pillars_heading'] ?? 'Operational Guidelines Calibrating Quality' }}</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
        <div class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center text-lg font-bold mb-5">1</div>
        <h3 class="font-display font-bold text-lg text-slate-900 mb-2 leading-tight">{{ $settings['about_pillar1_title'] ?? 'Absolute Cost Transparency' }}</h3>
        <p class="text-slate-500 font-sans text-xs sm:text-sm leading-relaxed mt-2">
          {{ $settings['about_pillar1_desc'] ?? 'Zero hidden charges. Flights, taxes, luxury properties, transfers, and guided sightseeing are fully detailed and itemized upfront in BDT.' }}
        </p>
      </div>

      <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
        <div class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center text-lg font-bold mb-5">2</div>
        <h3 class="font-display font-bold text-lg text-slate-900 mb-2 leading-tight">{{ $settings['about_pillar2_title'] ?? 'Budget Calibrated Stays' }}</h3>
        <p class="text-slate-500 font-sans text-xs sm:text-sm leading-relaxed mt-2">
          {{ $settings['about_pillar2_desc'] ?? 'We physically audit and select handpicked 4 and 5-star hotels that match strict corporate and premium family safety protocols.' }}
        </p>
      </div>

      <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
        <div class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center text-lg font-bold mb-5">3</div>
        <h3 class="font-display font-bold text-lg text-slate-900 mb-2 leading-tight">{{ $settings['about_pillar3_title'] ?? 'Real-time Concierge Guard' }}</h3>
        <p class="text-slate-500 font-sans text-xs sm:text-sm leading-relaxed mt-2">
          {{ $settings['about_pillar3_desc'] ?? 'A live, dedicated hotline agent is assigned to every group routing, offering real-time help for flight delays, seat changes, or health concerns.' }}
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Corporate retreats focus section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-left">
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
    
    <div class="lg:col-span-5 flex flex-col justify-center">
      <span class="text-emerald-500 font-sans font-extrabold text-xs uppercase tracking-widest">{{ $settings['about_retreat_badge'] ?? 'Enterprise & Family Retreats' }}</span>
      <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-navy-900 mt-2 mb-6">{{ $settings['about_retreat_heading'] ?? 'High-Density Group Coordination' }}</h2>
      <p class="text-slate-600 font-sans text-sm sm:text-base leading-relaxed mb-6">
        {{ $settings['about_retreat_desc'] ?? 'Corporate group travels and large family retreats require rigorous management. We oversee visas, private luxury coaches, customized banquet menus, conference setup, and regional group escorts.' }}
      </p>
      <a href="{{ route('contact') }}" class="inline-flex self-start justify-center px-6 py-3 bg-navy-900 text-white font-sans font-bold text-xs rounded-xl hover:bg-emerald-500 active:scale-95 transition-all duration-300">
        {{ $settings['about_retreat_btn_text'] ?? 'Configure Group Retreat' }}
      </a>
    </div>

    <div class="lg:col-span-7 bg-white border border-slate-200/60 p-8 rounded-3xl shadow-xl flex flex-col gap-6">
      <h3 class="font-display font-bold text-xl text-slate-900 border-b border-slate-100 pb-4">{{ $settings['about_retreat_details_title'] ?? 'Retreat Package Details' }}</h3>
      
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div>
          <span class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1">{{ $settings['about_retreat_col1_label'] ?? 'Corporate Booking' }}</span>
          <p class="font-sans font-bold text-slate-800 text-sm">{{ $settings['about_retreat_col1_val'] ?? 'Priority Seats & Ticketing' }}</p>
        </div>
        <div>
          <span class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1">{{ $settings['about_retreat_col2_label'] ?? 'Lodging Focus' }}</span>
          <p class="font-sans font-bold text-slate-800 text-sm">{{ $settings['about_retreat_col2_val'] ?? 'Meeting & Banquet Arenas' }}</p>
        </div>
        <div>
          <span class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1">{{ $settings['about_retreat_col3_label'] ?? 'Logistics' }}</span>
          <p class="font-sans font-bold text-slate-800 text-sm">{{ $settings['about_retreat_col3_val'] ?? 'Dedicated VIP Bus Fleets' }}</p>
        </div>
      </div>

      <p class="font-sans text-xs text-slate-400 border-t border-slate-100 pt-4 leading-relaxed">
        {{ $settings['about_retreat_footnote'] ?? '* Group bookings starting from 10+ travelers qualify for dedicated onsite coordinators and customized group pricing discounts.' }}
      </p>
    </div>

  </div>
</section>
@endsection
