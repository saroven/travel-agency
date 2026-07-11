@extends('layouts.frontend')
@section('title', 'Visa Processing Services | Airbridge Tours & Travel Bangladesh')
@section('meta_description', 'Expert documentation checklist and tourist/business visa processing support from Bangladesh for Dubai, Thailand, Singapore, and Malaysia.')

@section('content')
<!-- Hero Header Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12 text-left">
  <div class="max-w-3xl">
    <span class="inline-flex items-center gap-2 bg-emerald-100 text-emerald-700 font-sans font-bold text-xs md:text-sm px-4 py-2 rounded-full border border-emerald-500/10">
      🛂 Error-Free Documentation Support
    </span>
    <h1 class="font-display font-extrabold text-4xl sm:text-5xl lg:text-6xl tracking-tight leading-none text-slate-900 mt-4 mb-4">
      Global Visa <span class="text-emerald-500">Facilitation</span>
    </h1>
    <p class="text-slate-600 font-sans text-base md:text-lg leading-relaxed">
      Avoid rejection. Our processing desk checks documentation pipelines, pre-fills official embassy forms, and provides VIP support for Bangladesh passport holders.
    </p>
  </div>
</section>

<!-- Visa Eligibility Calculator & Checklist Workspace -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
    
    <!-- Left Col: Calculator Form (40%) -->
    <div class="lg:col-span-5 bg-white border border-slate-200/80 shadow-xl rounded-3xl p-6 text-left">
      <h3 class="font-display font-bold text-xl text-slate-900 mb-6">Requirements Calculator</h3>
      
      <form id="visa-calc-form" class="flex flex-col gap-5">
        
        <!-- Select Country -->
        <div>
          <label for="visa-country" class="block font-sans font-bold text-xs uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Destination Country</label>
          <div class="relative">
            <select id="visa-country" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans font-medium text-slate-800 text-sm focus:outline-none focus:border-emerald-500 appearance-none cursor-pointer">
              @foreach($rules as $rule)
              <option value="{{ $rule->country_code }}">{{ str_replace(' Tourist eVisa Support', '', str_replace(' Tourist Sticker Visa Processing', '', str_replace(' Tourist eVisa Facilitation', '', $rule->title))) }}</option>
              @endforeach
            </select>
            <svg class="absolute right-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
          </div>
        </div>

        <!-- Select Occupation -->
        <div>
          <label for="visa-occupation" class="block font-sans font-bold text-xs uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Your Occupation</label>
          <div class="relative">
            <select id="visa-occupation" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans font-medium text-slate-800 text-sm focus:outline-none focus:border-emerald-500 appearance-none cursor-pointer">
              <option value="employee" selected>Employee (Private/Govt)</option>
              <option value="business">Business Owner (Trade License holder)</option>
              <option value="student">Student</option>
              <option value="retired">Retired / Other</option>
            </select>
            <svg class="absolute right-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
          </div>
        </div>

        <div class="border-t border-slate-100 pt-4 mt-2">
          <button type="submit" class="w-full bg-emerald-500 hover:bg-emerald-600 active:scale-95 text-white font-sans font-bold text-sm rounded-xl py-3.5 shadow-lg shadow-emerald-500/20 transition-all duration-300 cursor-pointer">
            Calculate Requirements & Fee
          </button>
        </div>
      </form>
    </div>
    
    <!-- Right Col: Output Dynamic Checklist (60%) -->
    <div class="lg:col-span-7 bg-white border border-slate-200/80 shadow-xl rounded-3xl p-6 md:p-8 text-left">
      <div id="visa-output-placeholder" class="py-12 text-center text-slate-400 flex flex-col items-center gap-3">
        <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
        </svg>
        <p class="font-sans font-medium text-sm">Select your destination and occupation on the left to load the documentation checklist.</p>
      </div>

      <!-- Dynamic Visa Information Block (populated via JS, showing Dubai employee initially) -->
      <div id="visa-output-content" class="hidden">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-100 pb-6 mb-6">
          <div>
            <h3 id="visa-out-country-title" class="font-display font-extrabold text-2xl text-slate-900">Dubai eVisa Services</h3>
            <p id="visa-out-occup-sub" class="font-sans text-xs text-slate-500 uppercase font-semibold tracking-wider mt-1">Employee Documentation Pipeline</p>
          </div>
          <div class="flex flex-row sm:flex-col items-baseline sm:items-end gap-2">
            <span id="visa-out-price" class="font-display font-extrabold text-2xl text-emerald-500">৳14,500</span>
            <span id="visa-out-time" class="font-sans text-xs text-slate-400">5-7 Working Days</span>
          </div>
        </div>

        <div class="mb-8">
          <h4 class="font-sans font-bold text-xs uppercase tracking-wider text-slate-400 mb-4">Required Documents Checklist</h4>
          <ul id="visa-docs-list" class="font-sans text-sm text-slate-600 space-y-3">
            <!-- JS Injection -->
          </ul>
        </div>

        <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4 flex flex-col sm:flex-row items-center justify-between gap-4">
          <div class="text-center sm:text-left">
            <p class="font-sans font-bold text-sm text-slate-800">Ready to start processing?</p>
            <p class="font-sans text-xs text-slate-400 mt-0.5">Submit your pre-check parameters to our senior visa agent.</p>
          </div>
          <button id="visa-cta-btn" class="bg-navy-900 hover:bg-emerald-500 text-white font-sans font-bold text-xs rounded-xl px-5 py-3 transition-colors duration-300 cursor-pointer">
            Request Pre-Check Support
          </button>
        </div>
      </div>
      
    </div>
  </div>
</section>

<!-- Standard Core Document checklist section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 border-t border-slate-200/50">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-12 text-left">
    <div>
      <span class="text-emerald-500 font-sans font-extrabold text-xs uppercase tracking-widest">Mandatory Baseline</span>
      <h2 class="font-display font-extrabold text-3xl text-navy-900 mt-2 mb-6">Core Passport Requirements</h2>
      <p class="text-slate-600 font-sans text-sm leading-relaxed mb-6">
        Regardless of the country you are applying for, ensure these mandatory files are in order before requesting visa submission:
      </p>
      <ul class="font-sans text-sm text-slate-600 space-y-4">
        <li class="flex items-start gap-3">
          <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs mt-0.5 flex-shrink-0">✓</span>
          <div>
            <strong>Original Passport</strong>: Must have at least 6 months validity from the date of travel and minimum 2 blank pages.
          </div>
        </li>
        <li class="flex items-start gap-3">
          <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs mt-0.5 flex-shrink-0">✓</span>
          <div>
            <strong>Passport Copy</strong>: High-resolution scans of all used/written pages of the passport.
          </div>
        </li>
        <li class="flex items-start gap-3">
          <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs mt-0.5 flex-shrink-0">✓</span>
          <div>
            <strong>Embassy Format Photos</strong>: 2 copies of recent color photographs with a clean white background (usually 35x45mm matte finish).
          </div>
        </li>
      </ul>
    </div>

    <div>
      <span class="text-emerald-500 font-sans font-extrabold text-xs uppercase tracking-widest">Financial Guidelines</span>
      <h2 class="font-display font-extrabold text-3xl text-navy-900 mt-2 mb-6">Financial Solvency Proof</h2>
      <p class="text-slate-600 font-sans text-sm leading-relaxed mb-6">
        Embassies require absolute proof of solvency to ensure holiday stays are backed by stable cash structures:
      </p>
      <ul class="font-sans text-sm text-slate-600 space-y-4">
        <li class="flex items-start gap-3">
          <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs mt-0.5 flex-shrink-0">✓</span>
          <div>
            <strong>Bank Statement</strong>: Original bank statement of the last 6 months showing stable transactions with minimum balance of ৳150,000 to ৳300,000 per person.
          </div>
        </li>
        <li class="flex items-start gap-3">
          <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs mt-0.5 flex-shrink-0">✓</span>
          <div>
            <strong>Bank Solvency Certificate</strong>: Original solvency certificate signed by branch manager referencing bank profile.
          </div>
        </li>
      </ul>
    </div>
  </div>
</section>
@endsection
