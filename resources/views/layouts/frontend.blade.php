<!doctype html>
<html lang="en" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href="{{ !empty($settings['site_favicon']) ? asset('storage/' . $settings['site_favicon']) : asset('favicon.svg') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- SEO Meta Tags -->
    <title>@yield('title', ($settings['site_name'] ?? 'Airbridge') . ' ' . ($settings['site_tagline'] ?? 'Tours & Travel') . ' | Redefining International Travel from Bangladesh')</title>
    <meta name="description" content="@yield('meta_description', ($settings['site_name'] ?? 'Airbridge') . ' ' . ($settings['site_tagline'] ?? 'Tours & Travel') . ' creates premium, 100% guided international tour packages (Dubai, Thailand, Singapore) and custom visa support for families, groups, and corporate clients in Bangladesh.')" />
    <meta name="keywords" content="Airbridge, Airbridge Tours, Travel Agency Bangladesh, Dubai Tour Package, Thailand Tour, Singapore Tour, Visa Support Dhaka, Corporate Retreat Bangladesh" />
    <meta property="og:title" content="@yield('title', ($settings['site_name'] ?? 'Airbridge') . ' ' . ($settings['site_tagline'] ?? 'Tours & Travel') . ' | Premium Global Travel Platform')" />
    <meta property="og:description" content="@yield('meta_description', 'Flawlessly tailored guided international tours from Bangladesh. Experience luxury shopping, city safaris, and island hopping with 24/7 global concierge support.')" />
    <meta property="og:image" content="{{ asset('hero_resort.png') }}" />
    <meta property="og:type" content="website" />
    
    <!-- Fonts Preconnect & Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
  </head>
  <body class="bg-canvas-bg text-slate-700 font-sans selection:bg-emerald-500 selection:text-white">

    <!-- Site Preloader Overlay -->
    <div id="preloader" style="position: fixed; inset: 0; background: linear-gradient(135deg, #091E3A 0%, #06152a 100%); z-index: 99999; display: flex; flex-direction: column; align-items: center; justify-content: center;">
      <div class="flex flex-col items-center">
        @if(!empty($settings['site_logo']))
          <img src="{{ asset('storage/' . $settings['site_logo']) }}" class="h-16 w-auto object-contain mb-4 animate-pulse" alt="Logo" />
        @else
          <div class="w-16 h-16 bg-white/5 rounded-full flex items-center justify-center relative overflow-hidden border border-white/10 animate-bounce">
            <span class="text-white font-display font-extrabold text-2xl z-10 leading-none">A</span>
            <svg class="absolute w-12 h-12 text-emerald-500 transform rotate-45 -translate-y-0.5 -translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
            </svg>
          </div>
        @endif
        <div class="preloader-progress-bar">
          <div class="preloader-progress-fill"></div>
        </div>
        <span class="text-white/40 font-sans text-[10px] uppercase tracking-widest mt-4 font-semibold">Configuring Horizons...</span>
      </div>
    </div>

    <!-- Component A: Floating Glassmorphic Navbar -->
    <header class="fixed top-0 left-0 right-0 z-50 px-4 md:px-8">
      <nav class="glass-nav backdrop-blur-xl bg-white/70 border border-white/30 shadow-xl rounded-full px-6 py-3 mt-4 max-w-7xl mx-auto flex items-center justify-between transition-all duration-300">
        
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center gap-2.5 group">
          @if(!empty($settings['site_logo']))
            <img src="{{ asset('storage/' . $settings['site_logo']) }}" class="h-10 w-auto object-contain transition-transform duration-300 group-hover:scale-102" alt="{{ $settings['site_name'] ?? 'Logo' }}" />
          @else
            <div class="w-10 h-10 bg-navy-900 rounded-full flex items-center justify-center relative overflow-hidden group-hover:scale-105 transition-transform duration-300">
              <!-- Geometric green flight icon slicing through "A" -->
              <span class="text-white font-display font-extrabold text-xl z-10 leading-none">A</span>
              <svg class="absolute w-7 h-7 text-emerald-500 transform rotate-45 -translate-y-0.5 -translate-x-0.5 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
              </svg>
            </div>
          @endif
          <div class="flex flex-col">
            <span class="text-navy-900 font-display font-extrabold text-xl tracking-tight leading-none">{{ $settings['site_name'] ?? 'Airbridge' }}</span>
            <span class="text-emerald-500 font-sans font-semibold text-[10px] uppercase tracking-widest leading-none mt-0.5">{{ $settings['site_tagline'] ?? 'Tours & Travel' }}</span>
          </div>
        </a>

        <!-- Navigation Links (Desktop) -->
        <ul class="hidden lg:flex items-center gap-8 font-sans font-medium text-sm text-navy-900">
          <li><a href="{{ route('packages') }}" class="hover:text-emerald-500 transition-colors duration-200 py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-[2px] after:bg-emerald-500 hover:after:w-full after:transition-all after:duration-300">Explore Packages</a></li>
          <li><a href="{{ route('services') }}" class="hover:text-emerald-500 transition-colors duration-200 py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-[2px] after:bg-emerald-500 hover:after:w-full after:transition-all after:duration-300">Bespoke Services</a></li>
          <li><a href="{{ route('visa') }}" class="hover:text-emerald-500 transition-colors duration-200 py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-[2px] after:bg-emerald-500 hover:after:w-full after:transition-all after:duration-300">Visa Desk</a></li>
          <li><a href="{{ route('about') }}" class="hover:text-emerald-500 transition-colors duration-200 py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-[2px] after:bg-emerald-500 hover:after:w-full after:transition-all after:duration-300">About Agency</a></li>
          <li><a href="{{ route('contact') }}" class="hover:text-emerald-500 transition-colors duration-200 py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-[2px] after:bg-emerald-500 hover:after:w-full after:transition-all after:duration-300">Corporate Care</a></li>
        </ul>

        <!-- Right Consultation Action Engine -->
        <div class="flex items-center gap-4">
          <button id="open-consultation-btn" class="hidden sm:inline-flex items-center justify-center px-6 py-2.5 bg-navy-900 text-white font-sans font-bold text-sm rounded-full shadow-lg hover:bg-emerald-500 hover:shadow-emerald-500/20 active:scale-95 transition-all duration-300 animate-pulse-slow">
            Get Free Consultation
          </button>
          
          <!-- Mobile Menu Hamburger Button -->
          <button id="mobile-menu-toggle" class="lg:hidden p-2 text-navy-900 hover:text-emerald-500 transition-colors duration-200 focus:outline-none" aria-label="Toggle Navigation Menu">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
          </button>
        </div>
      </nav>

      <!-- Mobile Menu Dropdown -->
      <div id="mobile-menu" class="hidden lg:hidden absolute top-20 left-4 right-4 bg-white/95 backdrop-blur-2xl border border-slate-100 rounded-3xl shadow-2xl p-6 flex flex-col gap-4 transition-all duration-300">
        <ul class="flex flex-col gap-4 font-sans font-semibold text-lg text-navy-900">
          <li><a href="{{ route('packages') }}" class="mobile-nav-link block py-2 border-b border-slate-50">Explore Packages</a></li>
          <li><a href="{{ route('services') }}" class="mobile-nav-link block py-2 border-b border-slate-50">Bespoke Services</a></li>
          <li><a href="{{ route('visa') }}" class="mobile-nav-link block py-2 border-b border-slate-50">Visa Desk</a></li>
          <li><a href="{{ route('about') }}" class="mobile-nav-link block py-2 border-b border-slate-50">About Agency</a></li>
          <li><a href="{{ route('contact') }}" class="mobile-nav-link block py-2 border-b border-slate-50">Corporate Care</a></li>
        </ul>
        <button id="mobile-consultation-btn" class="w-full mt-2 py-3.5 bg-navy-900 text-white font-sans font-bold text-base rounded-2xl shadow-lg hover:bg-emerald-500 active:scale-95 transition-all duration-200">
          Get Free Consultation
        </button>
      </div>
    </header>

    <main class="pt-28 md:pt-36">
        @yield('content')
    </main>

    <!-- Upgraded Global Footer -->
    <footer class="bg-navy-900 text-slate-400 py-16 mt-20 relative">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 border-b border-white/10 pb-12 mb-8 text-left">
          
          <!-- Col 1: Bio -->
          <div>
            <div class="flex items-center gap-2 mb-4">
              @if(!empty($settings['site_logo']))
                <img src="{{ asset('storage/' . $settings['site_logo']) }}" class="h-8 w-auto object-contain" alt="{{ $settings['site_name'] ?? 'Logo' }}" />
              @else
                <span class="text-white font-display font-extrabold text-xl">{{ $settings['site_name'] ?? 'Airbridge' }}</span>
              @endif
            </div>
            <p class="font-sans text-xs leading-relaxed">
              We design custom guided itineraries and visa solutions that eliminate worries, engineered by travel experts in Bangladesh.
            </p>
          </div>

          <!-- Col 2: Navigation Links -->
          <div>
            <h4 class="text-white font-sans font-bold text-xs uppercase tracking-widest mb-4">Discover</h4>
            <ul class="flex flex-col gap-2 font-sans text-xs">
              <li><a href="{{ route('packages') }}" class="hover:text-emerald-500 transition-colors">Holiday Packages</a></li>
              <li><a href="{{ route('services') }}" class="hover:text-emerald-500 transition-colors">Corporate Retreats</a></li>
              <li><a href="{{ route('visa') }}" class="hover:text-emerald-500 transition-colors">Visa Checker Tool</a></li>
              <li><a href="{{ route('contact') }}" class="hover:text-emerald-500 transition-colors">Contact Our Desk</a></li>
            </ul>
          </div>

          <!-- Col 3: Support & Legal -->
          <div>
            <h4 class="text-white font-sans font-bold text-xs uppercase tracking-widest mb-4">Support Hub</h4>
            <ul class="flex flex-col gap-2 font-sans text-xs">
              <li><a href="{{ route('about') }}" class="hover:text-emerald-500 transition-colors">About Our Agency</a></li>
              <li><a href="{{ route('contact') }}" class="hover:text-emerald-500 transition-colors">Emergency Assistance</a></li>
              <li><a href="{{ route('visa') }}" class="hover:text-emerald-500 transition-colors">Visa Guide PDF</a></li>
              <li><a href="#" class="hover:text-emerald-500 transition-colors">Terms & Operations</a></li>
            </ul>
          </div>

          <!-- Col 4: Regional Offices -->
          <div>
            <h4 class="text-white font-sans font-bold text-xs uppercase tracking-widest mb-4">Dhaka Offices</h4>
            <p class="font-sans text-xs leading-relaxed">
              {!! nl2br(e($settings['office_address'] ?? "Navana Tower, Level 4\nGulshan 1 Circle, Dhaka, Bangladesh")) !!}<br />
              Open: {{ $settings['office_hours'] ?? 'Sat - Thu (10:00 AM - 07:00 PM)' }}
            </p>
          </div>

        </div>

        <!-- Copyright -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 font-sans text-[11px]">
          <p>© {{ date('Y') }} {{ $settings['site_name'] ?? 'Airbridge' }} {{ $settings['site_tagline'] ?? 'Tours & Travel' }}. All Rights Reserved. Dhaka, Bangladesh.</p>
          <div class="flex gap-4">
            <a href="#" class="hover:text-white transition-colors">Privacy</a>
            <a href="#" class="hover:text-white transition-colors">Cookies</a>
            <a href="#" class="hover:text-white transition-colors">Operations</a>
          </div>
        </div>

      </div>
    </footer>

    <!-- Interactive Free Consultation Modal -->
    <div id="consultation-modal" class="hidden fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4">
      <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-md transition-opacity"></div>
      
      <div class="relative bg-white rounded-3xl max-w-lg w-full p-6 md:p-8 shadow-2xl border border-slate-100 z-10 transform scale-95 opacity-0 transition-all duration-300 text-left">
        <!-- Close Button -->
        <button id="close-consultation-btn" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600 focus:outline-none" aria-label="Close Modal">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>

        <h3 class="font-display font-bold text-2xl text-slate-900 mb-2">Request Free Consultation</h3>
        <p class="font-sans text-slate-500 text-sm mb-6">Our senior travel architects will call you within 15 minutes to configure your premium tour itinerary.</p>
        
        <form id="modal-consultation-form" class="flex flex-col gap-4">
          <div>
            <label for="modal-name" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1">Your Full Name</label>
            <input id="modal-name" type="text" placeholder="Full Name" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
          </div>

          <div>
            <label for="modal-phone" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1">Phone Number (Required)</label>
            <input id="modal-phone" type="tel" placeholder="e.g. +880 1712..." required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
          </div>

          <div>
            <label for="modal-destination" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1">Destination interest</label>
            <input id="modal-destination" type="text" placeholder="e.g. Dubai Premium / Custom Itinerary" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
          </div>

          <button type="submit" class="w-full bg-emerald-500 hover:bg-emerald-600 active:scale-95 text-white font-sans font-bold text-sm rounded-xl py-3.5 shadow-lg shadow-emerald-500/20 hover:shadow-emerald-500/30 transition-all duration-300 cursor-pointer mt-2">
            Schedule Instant Consultation
          </button>
        </form>
      </div>
    </div>

    <!-- Success Confirmation Toast / Modal -->
    <div id="success-modal" class="hidden fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4">
      <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-md"></div>
      
      <div class="relative bg-white rounded-3xl max-w-md w-full p-8 shadow-2xl border border-slate-100 z-10 text-center transform scale-95 opacity-0 transition-all duration-300">
        <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-500 text-3xl mx-auto mb-5">
          ✓
        </div>
        
        <h3 class="font-display font-bold text-2xl text-slate-900 mb-2">Request Logged Successfully!</h3>
        <p class="font-sans text-slate-500 text-sm mb-6 leading-relaxed">
          Thank you for choosing Airbridge Tours & Travel. A senior travel architect is compiling your parameters and will connect via phone within 15 minutes.
        </p>
        
        <button id="success-close-btn" class="w-full bg-navy-900 hover:bg-emerald-500 text-white font-sans font-bold text-sm rounded-xl py-3 transition-colors duration-300 cursor-pointer">
          Excellent, Back to Site
        </button>
      </div>
    </div>

    @stack('scripts')
  </body>
</html>
