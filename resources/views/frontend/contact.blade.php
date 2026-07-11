@extends('layouts.frontend')
@section('title', 'Contact Our Office | Airbridge Tours & Travel Bangladesh')
@section('meta_description', 'Get in touch with the travel designers at Airbridge. Visit our Gulshan 1 office in Dhaka, or request direct hotline flight/visa support.')

@section('content')
<!-- Hero Header Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12 text-left -mt-8">
  <div class="max-w-3xl">
    <span class="inline-flex items-center gap-2 bg-emerald-100 text-emerald-700 font-sans font-bold text-xs md:text-sm px-4 py-2 rounded-full border border-emerald-500/10">
      ✉ Connect with Destination Planners
    </span>
    <h1 class="font-display font-extrabold text-4xl sm:text-5xl lg:text-6xl tracking-tight leading-none text-slate-900 mt-4 mb-4">
      Get In <span class="text-emerald-500">Touch</span>
    </h1>
    <p class="text-slate-600 font-sans text-base md:text-lg leading-relaxed">
      Have questions about group logistics, enterprise retreat scheduling, or custom flight routing? Send us your queries, or visit our Gulshan 1 Circle offices.
    </p>
  </div>
</section>

<!-- Main Content Grid -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-24">
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start text-left">
    
    <!-- Left: Map and Contact Info (50%) -->
    <div class="lg:col-span-6 flex flex-col gap-8">
      
      <!-- Contact Card Details -->
      <div class="bg-white border border-slate-200/80 p-6 sm:p-8 rounded-3xl shadow-xl flex flex-col gap-6">
        <h3 class="font-display font-bold text-xl text-slate-900 border-b border-slate-100 pb-4">Corporate Contacts</h3>
        
        <div class="flex flex-col gap-4 font-sans text-sm">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center text-emerald-500">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
              </svg>
            </div>
            <div class="flex flex-col">
              <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Official Email</span>
              <a href="mailto:{{ $settings['contact_email'] ?? 'info@airbridgebd.com' }}" class="text-slate-800 hover:text-emerald-500 font-semibold transition-colors">{{ $settings['contact_email'] ?? 'info@airbridgebd.com' }}</a>
            </div>
          </div>

          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center text-emerald-500">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-2.824-1.802-5.12-4.098-6.922-6.922l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
              </svg>
            </div>
            <div class="flex flex-col">
              <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Direct Hotline Desk</span>
              <a href="tel:{{ str_replace(' ', '', $settings['contact_phone'] ?? '+8801711223344') }}" class="text-slate-800 hover:text-emerald-500 font-semibold transition-colors">{{ $settings['contact_phone'] ?? '+880 1711 223344' }}</a>
            </div>
          </div>

          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center text-emerald-500">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
              </svg>
            </div>
            <div class="flex flex-col">
              <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Gulshan Headquarters</span>
              <span class="text-slate-800 font-semibold">{{ $settings['office_address'] ?? 'Suite 4B, Level 4, Navana Tower, Gulshan 1, Dhaka, Bangladesh' }}</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Stylized SVG Map Illustration -->
      <div class="bg-white border border-slate-200/80 p-4 rounded-3xl shadow-xl flex flex-col gap-4 relative overflow-hidden h-[260px] justify-center items-center">
        <!-- Custom Stylized Vector Map Backdrop -->
        <svg class="absolute inset-0 w-full h-full text-slate-100 pointer-events-none" viewBox="0 0 400 200" fill="none" stroke="currentColor" stroke-width="1.5">
          <path d="M 0 50 L 400 50 M 0 150 L 400 150 M 100 0 L 100 200 M 280 0 L 280 200" />
          <path stroke-dasharray="4,4" d="M 50 0 L 50 200 M 340 0 L 340 200" />
          <circle cx="200" cy="100" r="35" fill="#f8fafc" stroke="currentColor" stroke-width="2" />
          <circle cx="200" cy="100" r="28" fill="none" stroke-dasharray="3,3" />
          <text x="210" y="55" fill="#94a3b8" font-size="8" font-family="sans-serif">Gulshan Ave</text>
          <text x="8" y="142" fill="#94a3b8" font-size="8" font-family="sans-serif">Road 11</text>
        </svg>
        
        <!-- Glowing coordinate pin -->
        <div class="relative z-10 flex flex-col items-center gap-2 transform -translate-y-2">
          <span class="flex h-5 w-5 relative">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-5 w-5 bg-emerald-500 shadow-md shadow-emerald-500/20 flex items-center justify-center text-[10px] text-white font-bold">A</span>
          </span>
          <div class="bg-navy-900 text-white font-sans text-xs font-bold px-3 py-1.5 rounded-lg shadow-lg border border-white/10 text-center">
            Navana Tower, Gulshan 1
          </div>
        </div>
      </div>

    </div>

    <!-- Right: Detailed Contact Form (50%) -->
    <div class="lg:col-span-6 bg-white border border-slate-200/80 p-6 sm:p-8 rounded-3xl shadow-xl flex flex-col gap-6">
      <h3 class="font-display font-bold text-xl text-slate-900 border-b border-slate-100 pb-4">Schedule Planning Meeting</h3>
      
      <form id="contact-page-form" class="flex flex-col gap-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div>
            <label for="c-name" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Full Name</label>
            <input id="c-name" type="text" placeholder="Your Name" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
          </div>
          <div>
            <label for="c-phone" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Phone Number</label>
            <input id="c-phone" type="tel" placeholder="e.g. +880 1712..." required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
          </div>
        </div>

        <div>
          <label for="c-email" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Email Address</label>
          <input id="c-email" type="email" placeholder="name@company.com" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          @inject('packageModel', 'App\Models\TourPackage')
          <div>
            <label for="c-destination" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Preferred Destination</label>
            <select id="c-destination" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-slate-600 text-sm focus:outline-none focus:border-emerald-500 appearance-none cursor-pointer">
              @foreach($packageModel::where('is_active', true)->get() as $p)
              <option value="{{ $p->slug }}">{{ $p->title }}</option>
              @endforeach
              <option value="custom">Other / Custom Retreat</option>
            </select>
          </div>
          <div>
            <label for="c-budget" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Estimate Budget</label>
            <input id="c-budget" type="text" placeholder="e.g. ৳200,000" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
          </div>
        </div>

        <div>
          <label for="c-plan" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Outline Your Requirements</label>
          <textarea id="c-plan" placeholder="Tell us about passenger numbers, corporate hotel standards, or specific visa assistance queries..." rows="5" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500 resize-none"></textarea>
        </div>

        <button type="submit" class="w-full bg-emerald-500 hover:bg-emerald-600 active:scale-95 text-white font-sans font-bold text-sm rounded-xl py-3.5 shadow-lg shadow-emerald-500/20 transition-all duration-300 cursor-pointer">
          Submit Consultation Request
        </button>
      </form>
    </div>

  </div>
</section>
@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const contactForm = document.getElementById('contact-page-form');
    if (contactForm) {
      contactForm.addEventListener('submit', (e) => {
        e.preventDefault();
        
        const name = document.getElementById('c-name').value;
        const phone = document.getElementById('c-phone').value;
        const email = document.getElementById('c-email').value;
        const destSelect = document.getElementById('c-destination');
        const destination = destSelect.options[destSelect.selectedIndex].text;
        const budget = document.getElementById('c-budget').value;
        const plan = document.getElementById('c-plan').value;

        const submitBtn = contactForm.querySelector('button[type="submit"]');
        submitBtn.disabled = true;

        const host = window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1' 
          ? 'http://localhost:8000' 
          : window.location.origin;

        fetch(`${host}/api/leads`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
          },
          body: JSON.stringify({
            type: 'contact',
            name: name,
            phone: phone,
            destination: destination,
            plan_details: `Email: ${email} | Budget: ${budget} | Notes: ${plan}`,
            source_page: window.location.pathname,
          })
        })
        .then(res => res.json())
        .then(data => {
          contactForm.reset();
          const successModal = document.getElementById('success-modal');
          if (successModal) {
            successModal.classList.remove('hidden');
            setTimeout(() => {
              const innerCard = successModal.querySelector('.relative');
              innerCard.classList.remove('scale-95', 'opacity-0');
              innerCard.classList.add('scale-100', 'opacity-100');
            }, 10);
          }
        })
        .catch(err => {
          console.error(err);
          alert('Something went wrong. Please try again.');
        })
        .finally(() => {
          submitBtn.disabled = false;
        });
      });
    }
  });
</script>
@endpush
