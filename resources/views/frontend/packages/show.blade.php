@extends('layouts.frontend')
@section('title', $package->title . ' Itinerary Details | Airbridge Tours & Travel')
@section('meta_description', $package->subtitle . ' — View day-by-day itineraries, flight logistics, handpicked hotel stays, and verified inclusion checklists.')

@section('content')
<!-- Hero Banner Header -->
<section id="details-hero" class="relative h-[480px] flex items-end justify-start text-white overflow-hidden -mt-16">
  <!-- Image background -->
  <div id="details-hero-img-bg" class="absolute inset-0 bg-navy-900 -z-10">
    <img id="details-hero-img" src="{{ asset('storage/' . $package->image_path) }}" alt="{{ $package->title }} Background" class="w-full h-full object-cover opacity-60" />
  </div>
  
  <!-- Gradient overlay -->
  <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent -z-10"></div>
  
  <!-- Headline container -->
  <div class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 pb-12 text-left">
    <div class="max-w-3xl">
      <span id="details-duration-pill" class="bg-emerald-500 text-white font-sans font-bold text-xs uppercase tracking-wider px-3.5 py-1.5 rounded-full inline-block mb-4">
        {{ $package->duration }}
      </span>
      <h1 id="details-title" class="font-display font-extrabold text-4xl sm:text-5xl lg:text-6xl tracking-tight leading-none">
        {{ $package->title }}
      </h1>
      <p id="details-subtitle" class="font-sans text-slate-200 text-base sm:text-lg lg:text-xl mt-3 leading-relaxed">
        {{ $package->subtitle }}
      </p>
    </div>
  </div>
</section>

<!-- Specifications and Timeline Grid -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start text-left">
    
    <!-- Left: Timeline itinerary (60%) -->
    <div class="lg:col-span-8 flex flex-col gap-6">
      <div>
        <h2 class="font-display font-extrabold text-2xl text-slate-900 mb-2">Detailed Itinerary</h2>
        <p id="details-overview" class="text-slate-500 font-sans text-sm sm:text-base leading-relaxed mb-8">
          {{ $package->overview }}
        </p>
      </div>

      {{-- Gallery Grid Section --}}
      @if($package->images->count() > 0)
      <div class="mb-10">
        <h3 class="font-display font-bold text-lg text-slate-900 mb-4">Package Showcase Gallery</h3>
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
          <!-- Main Cover Image first -->
          <a href="{{ asset('storage/' . $package->image_path) }}" class="gallery-link block aspect-[4/3] rounded-3xl overflow-hidden shadow-md group relative border border-slate-100">
            <img src="{{ asset('storage/' . $package->image_path) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Cover" />
            <div class="absolute inset-0 bg-navy-900/40 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-300">
              <span class="text-white text-xs font-bold font-sans">View Fullscreen</span>
            </div>
          </a>
          @foreach($package->images as $img)
          <a href="{{ asset('storage/' . $img->image_path) }}" class="gallery-link block aspect-[4/3] rounded-3xl overflow-hidden shadow-md group relative border border-slate-100">
            <img src="{{ asset('storage/' . $img->image_path) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Gallery Image" />
            <div class="absolute inset-0 bg-navy-900/40 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-300">
              <span class="text-white text-xs font-bold font-sans">View Fullscreen</span>
            </div>
          </a>
          @endforeach
        </div>
      </div>
      @endif

      <!-- Day-by-Day Timeline vertical path -->
      <div id="details-itinerary-timeline" class="relative pl-6 sm:pl-8 border-l-2 border-emerald-500/30 ml-4 flex flex-col gap-8">
        @foreach($package->itineraryDays as $day)
        <div class="relative">
          <span class="absolute -left-[35px] sm:-left-[43px] top-1.5 w-6 h-6 rounded-full bg-emerald-500 border-4 border-white flex items-center justify-center text-[8px] font-bold text-white">
            {{ $day->day_number }}
          </span>
          <h3 class="font-display font-bold text-lg text-slate-900 leading-tight">
            {{ $day->title }}
          </h3>
          <p class="text-slate-500 font-sans text-xs sm:text-sm mt-1.5 leading-relaxed">
            {{ $day->description }}
          </p>
        </div>
        @endforeach
      </div>
    </div>

    <!-- Right: Inclusions and Booking widget (40%) -->
    <div class="lg:col-span-4 flex flex-col gap-8">
      
      <!-- Quick specs card -->
      <div class="bg-white border border-slate-200 p-6 rounded-3xl shadow-lg">
        <h3 class="font-display font-bold text-xl text-slate-900 border-b border-slate-100 pb-4 mb-5">Package Pricing</h3>
        <div class="flex items-baseline gap-1.5 mb-6">
          <span id="details-price" class="font-display font-extrabold text-3xl text-emerald-500">৳{{ number_format($package->price) }}</span>
          <span class="font-sans text-xs text-slate-400">/ per traveler</span>
        </div>
        <ul class="text-slate-600 font-sans text-xs space-y-3.5 mb-6">
          <li class="flex items-center gap-2.5">
            <span class="w-5 h-5 rounded bg-slate-50 flex items-center justify-center text-emerald-500 font-bold">🏨</span>
            <strong>Lodging:</strong> Handpicked 4 & 5-Star Accommodations
          </li>
          <li class="flex items-center gap-2.5">
            <span class="w-5 h-5 rounded bg-slate-50 flex items-center justify-center text-emerald-500 font-bold">✈</span>
            <strong>Aviation:</strong> Priority seats & air ticket booking
          </li>
          <li class="flex items-center gap-2.5">
            <span class="w-5 h-5 rounded bg-slate-50 flex items-center justify-center text-emerald-500 font-bold">🚐</span>
            <strong>Transit:</strong> Private vehicle airport pick & drop
          </li>
        </ul>
        <button id="details-booking-btn" class="open-package-modal w-full bg-navy-900 hover:bg-emerald-500 text-white font-sans font-bold text-sm rounded-xl py-3.5 shadow-lg active:scale-95 transition-all duration-300 cursor-pointer" data-destination="{{ $package->title }}">
          Book This Package
        </button>
      </div>

      <!-- Inclusions Checklist Card -->
      <div class="bg-white border border-slate-200 p-6 rounded-3xl shadow-lg">
        <h3 class="font-display font-bold text-lg text-slate-900 mb-4">What's Included</h3>
        <ul id="details-inclusions" class="font-sans text-xs text-slate-600 space-y-3 mb-6">
          @foreach($package->inclusions ?? [] as $inc)
          <li class="flex items-start gap-2.5">
            <span class="w-4 h-4 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-[10px] mt-0.5 flex-shrink-0">✓</span>
            <span>{{ $inc }}</span>
          </li>
          @endforeach
        </ul>

        <h3 class="font-display font-bold text-lg text-slate-900 mb-4 pt-4 border-t border-slate-100">Exclusions</h3>
        <ul id="details-exclusions" class="font-sans text-xs text-slate-500 space-y-3">
          @foreach($package->exclusions ?? [] as $exc)
          <li class="flex items-start gap-2.5">
            <span class="w-4 h-4 rounded-full bg-red-100 text-red-600 flex items-center justify-center text-[10px] mt-0.5 flex-shrink-0">✗</span>
            <span class="text-slate-500">{{ $exc }}</span>
          </li>
          @endforeach
        </ul>
      </div>

    </div>

  </div>
</section>

<!-- Lightbox Image Viewer Modal -->
<div id="image-viewer-modal" class="hidden fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4">
  <div class="fixed inset-0 bg-slate-950/95 backdrop-blur-md transition-opacity"></div>
  
  <div class="relative max-w-5xl w-full max-h-[85vh] z-10 flex flex-col items-center">
    <!-- Close Button -->
    <button id="close-viewer-btn" class="absolute -top-12 right-0 text-white/70 hover:text-white focus:outline-none flex items-center gap-1.5 text-sm font-bold uppercase tracking-wider transition-colors cursor-pointer">
      ✕ Close
    </button>
    
    <!-- Image Display -->
    <img id="viewer-display-img" src="" class="w-full h-full max-h-[80vh] object-contain rounded-2xl shadow-2xl border border-white/10" alt="Full view" />
    
    <!-- Caption -->
    <p id="viewer-caption" class="text-white/60 font-sans text-xs mt-4 text-center"></p>
  </div>
</div>
@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', () => {
    // Lightbox modal logic
    const viewerModal = document.getElementById('image-viewer-modal');
    const viewerImg = document.getElementById('viewer-display-img');
    const viewerCaption = document.getElementById('viewer-caption');
    const closeBtn = document.getElementById('close-viewer-btn');

    const galleryLinks = document.querySelectorAll('.gallery-link');
    galleryLinks.forEach(link => {
      link.addEventListener('click', (e) => {
        e.preventDefault();
        const fullUrl = link.getAttribute('href');
        const imgAlt = link.querySelector('img').getAttribute('alt') || 'Showcase Image';
        
        viewerImg.src = fullUrl;
        viewerCaption.textContent = imgAlt;
        
        viewerModal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
      });
    });

    const closeModal = () => {
      viewerModal.classList.add('hidden');
      viewerImg.src = '';
      document.body.classList.remove('overflow-hidden');
    };

    if (closeBtn) closeBtn.addEventListener('click', closeModal);
    if (viewerModal) {
      viewerModal.querySelector('.fixed').addEventListener('click', closeModal);
    }

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && viewerModal && !viewerModal.classList.contains('hidden')) {
        closeModal();
      }
    });

    // Prefill dynamic trigger logic for the book button since we clones buttons in main.js
    const detailsBtn = document.getElementById('details-booking-btn');
    if (detailsBtn) {
      detailsBtn.addEventListener('click', () => {
        const dest = detailsBtn.getAttribute('data-destination') || '';
        if (typeof showConsultationModal === 'function') {
          showConsultationModal(`Booking Request: ${dest}`);
        } else {
          // Fallback if main.js is loaded under Vite scope
          const modal = document.getElementById('consultation-modal');
          if (modal) {
            modal.classList.remove('hidden');
            const inner = modal.querySelector('.relative');
            inner.classList.remove('scale-95', 'opacity-0');
            inner.classList.add('scale-100', 'opacity-100');
            const destInput = document.getElementById('modal-destination');
            if (destInput) destInput.value = `Booking Request: ${dest}`;
          }
        }
      });
    }
  });
</script>
@endpush
