@extends('layouts.frontend')
@section('title', $service->title . ' | Bespoke Service Details | ' . ($settings['site_name'] ?? 'Airbridge'))
@section('meta_description', $service->subtitle . ' — Learn about our operational workflow, milestones, benefits, and direct booking inquiries.')

@section('content')
<!-- Upper Section Header -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12 text-left -mt-8">
  <div class="max-w-3xl">
    <span class="inline-flex items-center gap-2 bg-emerald-100 text-emerald-700 font-sans font-bold text-xs md:text-sm px-4 py-2 rounded-full border border-emerald-500/10">
      ⚙ Bespoke Travel Service Details
    </span>
    <h1 id="srv-details-title" class="font-display font-extrabold text-4xl sm:text-5xl lg:text-6xl tracking-tight leading-none text-slate-900 mt-4 mb-4">
      {{ $service->title }}
    </h1>
    <p id="srv-details-subtitle" class="text-slate-600 font-sans text-base md:text-lg leading-relaxed">
      {{ $service->subtitle }}
    </p>
  </div>
</section>

<!-- Main Layout Details -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-24">
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start text-left">
    
    <!-- Left Col: Specifications & Process Timeline (60%) -->
    <div class="lg:col-span-7 flex flex-col gap-10">
      
      <!-- Overview Description Block -->
      <div class="bg-white border border-slate-200/80 p-6 sm:p-8 rounded-3xl shadow-lg">
        <h3 class="font-display font-bold text-xl text-slate-900 border-b border-slate-100 pb-4 mb-4">Service Capabilities</h3>
        <p id="srv-details-overview" class="text-slate-500 font-sans text-sm sm:text-base leading-relaxed">
          {{ $service->overview }}
        </p>
      </div>

      <!-- Features Grid -->
      <div>
        <h3 class="font-display font-bold text-xl text-slate-900 mb-6">Key Operational Benefits</h3>
        <div id="srv-details-benefits" class="grid grid-cols-1 sm:grid-cols-3 gap-6">
          @foreach($service->benefits ?? [] as $benefit)
          <div class="bg-white border border-slate-200/80 p-5 rounded-2xl shadow shadow-slate-100 flex flex-col text-left">
            <div class="text-emerald-500 text-lg mb-3">
              {{ $benefit['icon'] ?? '✓' }}
            </div>
            <h4 class="font-display font-bold text-base text-slate-900 mb-1 leading-tight">
              {{ $benefit['title'] ?? '' }}
            </h4>
            <p class="text-slate-500 font-sans text-xs leading-relaxed mt-1">
              {{ $benefit['desc'] ?? '' }}
            </p>
          </div>
          @endforeach
        </div>
      </div>

      <!-- Process timeline workflow -->
      <div>
        <h3 class="font-display font-bold text-xl text-slate-900 mb-6">Execution Methodology</h3>
        <div id="srv-details-timeline" class="relative pl-6 sm:pl-8 border-l-2 border-emerald-500/30 ml-4 flex flex-col gap-8">
          @foreach($service->steps ?? [] as $i => $step)
          <div class="relative">
            <span class="absolute -left-[35px] sm:-left-[43px] top-1.5 w-6 h-6 rounded-full bg-navy-900 border-4 border-white flex items-center justify-center text-[8px] font-bold text-white">
              {{ $i + 1 }}
            </span>
            <h3 class="font-display font-bold text-lg text-slate-900 leading-tight">
              {{ $step['title'] ?? '' }}
            </h3>
            <p class="text-slate-500 font-sans text-xs sm:text-sm mt-1.5 leading-relaxed">
              {{ $step['desc'] ?? '' }}
            </p>
          </div>
          @endforeach
        </div>
      </div>

    </div>

    <!-- Right Col: Interactive Inquiry Widget (40%) -->
    <div class="lg:col-span-5 flex flex-col gap-8">
      
      <!-- Reservation Form Card -->
      <div class="bg-white border border-slate-200/80 p-6 sm:p-8 rounded-3xl shadow-xl flex flex-col gap-6">
        <h3 class="font-display font-bold text-xl text-slate-900 border-b border-slate-100 pb-4">Submit Direct Inquiry</h3>
        
        <form id="srv-inquiry-form" class="flex flex-col gap-4">
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <label for="srv-name" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Your Full Name</label>
              <input id="srv-name" type="text" placeholder="Full Name" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
            </div>
            <div>
              <label for="srv-phone" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Phone Number</label>
              <input id="srv-phone" type="tel" placeholder="e.g. +880 1712..." required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
            </div>
          </div>

          <!-- Custom Fields Injected Dynamically depending on service slug -->
          <div id="srv-dynamic-fields" class="flex flex-col gap-4">
            @if($service->slug === 'tickets')
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label for="field-origin" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Origin City</label>
                <input id="field-origin" type="text" value="Dhaka" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
              </div>
              <div>
                <label for="field-destination" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Destination City</label>
                <input id="field-destination" type="text" placeholder="e.g. Bangkok" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
              </div>
            </div>
            @elseif($service->slug === 'hotels')
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label for="field-star" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Star Class</label>
                <select id="field-star" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500">
                  <option value="5">5-Star Luxury</option>
                  <option value="4" selected>4-Star Premium</option>
                  <option value="3">3-Star Budget</option>
                </select>
              </div>
              <div>
                <label for="field-rooms" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Number of Rooms</label>
                <input id="field-rooms" type="number" min="1" value="1" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
              </div>
            </div>
            @elseif($service->slug === 'visa')
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label for="field-country" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Country</label>
                <select id="field-country" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500">
                  <option value="dubai">Dubai, UAE</option>
                  <option value="thailand" selected>Thailand</option>
                  <option value="singapore">Singapore</option>
                  <option value="malaysia">Malaysia</option>
                </select>
              </div>
              <div>
                <label for="field-status" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Occupation Status</label>
                <select id="field-status" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500">
                  <option value="employee">Salaried Employee</option>
                  <option value="business">Business Owner</option>
                  <option value="student">Student</option>
                  <option value="retired">Retired Person</option>
                </select>
              </div>
            </div>
            @elseif($service->slug === 'group')
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label for="field-size" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Group Size</label>
                <input id="field-size" type="number" min="10" value="15" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
              </div>
              <div>
                <label for="field-company" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Company / Organization</label>
                <input id="field-company" type="text" placeholder="e.g. Apex Ltd" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
              </div>
            </div>
            @endif
          </div>

          <div>
            <label for="srv-comments" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Additional Requirements</label>
            <textarea id="srv-comments" placeholder="Outline specific flight classes, hotel star levels, traveler ages, dietary needs, or budget targets..." rows="4" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500 resize-none"></textarea>
          </div>

          <button type="submit" class="w-full bg-emerald-500 hover:bg-emerald-600 active:scale-95 text-white font-sans font-bold text-sm rounded-xl py-3.5 shadow-lg shadow-emerald-500/20 transition-all duration-300 cursor-pointer mt-2">
            Request Reservation Quote
          </button>
        </form>
      </div>

      <!-- FAQs Block -->
      <div class="bg-white border border-slate-200/80 p-6 rounded-3xl shadow-lg">
        <h3 class="font-display font-bold text-lg text-slate-900 border-b border-slate-100 pb-3 mb-4">Service FAQs</h3>
        <div id="srv-details-faqs" class="flex flex-col gap-4">
          @foreach($service->faqs ?? [] as $faq)
          <div class="border-b border-slate-100 pb-3 last:border-0 last:pb-0">
            <h4 class="font-sans font-bold text-sm text-slate-900 mb-1.5">
              {{ $faq['q'] ?? '' }}
            </h4>
            <p class="text-slate-500 font-sans text-xs leading-relaxed">
              {{ $faq['a'] ?? '' }}
            </p>
          </div>
          @endforeach
        </div>
      </div>

    </div>

  </div>
</section>
@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const srvForm = document.getElementById('srv-inquiry-form');
    if (srvForm) {
      srvForm.addEventListener('submit', (e) => {
        e.preventDefault();
        
        const name = document.getElementById('srv-name').value;
        const phone = document.getElementById('srv-phone').value;
        const comments = document.getElementById('srv-comments').value;
        
        // Grab dynamic elements values
        let dynamicSummary = '';
        srvForm.querySelectorAll('#srv-dynamic-fields input, #srv-dynamic-fields select').forEach(el => {
          const labelEl = srvForm.querySelector(`label[for="${el.id}"]`);
          const label = labelEl ? labelEl.textContent : el.id;
          dynamicSummary += `${label}: ${el.value} | `;
        });

        const serviceTitle = "{{ $service->title }}";
        const prefillSummary = `Service: ${serviceTitle} | ${dynamicSummary}Notes: ${comments}`;

        const submitBtn = srvForm.querySelector('button[type="submit"]');
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
            type: 'service_inquiry',
            name: name,
            phone: phone,
            destination: serviceTitle,
            plan_details: prefillSummary,
            source_page: window.location.pathname,
          })
        })
        .then(res => res.json())
        .then(data => {
          srvForm.reset();
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
