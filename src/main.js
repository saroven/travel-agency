import './style.css';

// ----------------------------------------------------
// 1. Mobile Menu Toggle
// ----------------------------------------------------
const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
const mobileMenu = document.getElementById('mobile-menu');
const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');
const mobileConsultationBtn = document.getElementById('mobile-consultation-btn');

function toggleMobileMenu() {
  mobileMenu.classList.toggle('hidden');
}

if (mobileMenuToggle && mobileMenu) {
  mobileMenuToggle.addEventListener('click', (e) => {
    e.stopPropagation();
    toggleMobileMenu();
  });

  // Close when clicking links
  mobileNavLinks.forEach(link => {
    link.addEventListener('click', () => {
      mobileMenu.classList.add('hidden');
    });
  });

  // Close when clicking outside mobile menu
  document.addEventListener('click', (e) => {
    if (!mobileMenu.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
      mobileMenu.classList.add('hidden');
    }
  });
}

// ----------------------------------------------------
// 2. Consultation Modals & Success Popups
// ----------------------------------------------------
const openConsultationBtn = document.getElementById('open-consultation-btn');
const closeConsultationBtn = document.getElementById('close-consultation-btn');
const consultationModal = document.getElementById('consultation-modal');
const successModal = document.getElementById('success-modal');
const successCloseBtn = document.getElementById('success-close-btn');

const modalName = document.getElementById('modal-name');
const modalPhone = document.getElementById('modal-phone');
const modalDestination = document.getElementById('modal-destination');

// Open Consultation Modal
function showConsultationModal(prefillDest = '') {
  if (consultationModal) {
    consultationModal.classList.remove('hidden');
    // Micro-delay to trigger CSS transitions
    setTimeout(() => {
      const innerCard = consultationModal.querySelector('.relative');
      innerCard.classList.remove('scale-95', 'opacity-0');
      innerCard.classList.add('scale-100', 'opacity-100');
    }, 10);

    if (modalDestination) {
      modalDestination.value = prefillDest;
    }
  }
}

// Hide Consultation Modal
function hideConsultationModal() {
  if (consultationModal) {
    const innerCard = consultationModal.querySelector('.relative');
    innerCard.classList.remove('scale-100', 'opacity-100');
    innerCard.classList.add('scale-95', 'opacity-0');
    setTimeout(() => {
      consultationModal.classList.add('hidden');
    }, 300);
  }
}

// Show Success Modal
function showSuccessModal() {
  if (successModal) {
    successModal.classList.remove('hidden');
    setTimeout(() => {
      const innerCard = successModal.querySelector('.relative');
      innerCard.classList.remove('scale-95', 'opacity-0');
      innerCard.classList.add('scale-100', 'opacity-100');
    }, 10);
  }
}

// Hide Success Modal
function hideSuccessModal() {
  if (successModal) {
    const innerCard = successModal.querySelector('.relative');
    innerCard.classList.remove('scale-100', 'opacity-100');
    innerCard.classList.add('scale-95', 'opacity-0');
    setTimeout(() => {
      successModal.classList.add('hidden');
    }, 300);
  }
}

if (openConsultationBtn) {
  openConsultationBtn.addEventListener('click', () => showConsultationModal());
}

if (mobileConsultationBtn) {
  mobileConsultationBtn.addEventListener('click', () => {
    mobileMenu.classList.add('hidden');
    showConsultationModal();
  });
}

if (closeConsultationBtn) {
  closeConsultationBtn.addEventListener('click', hideConsultationModal);
}

// Close when clicking modal backdrop
if (consultationModal) {
  consultationModal.addEventListener('click', (e) => {
    if (e.target === consultationModal || e.target.classList.contains('fixed')) {
      hideConsultationModal();
    }
  });
}

if (successCloseBtn) {
  successCloseBtn.addEventListener('click', hideSuccessModal);
}

// Bind destination card action arrows to open modal with prefilled data
const openPackageButtons = document.querySelectorAll('.open-package-modal');
openPackageButtons.forEach(btn => {
  btn.addEventListener('click', () => {
    const destinationName = btn.getAttribute('data-destination') || '';
    showConsultationModal(destinationName);
  });
});

// ----------------------------------------------------
// 3. Search Widget Tab Toggle Interactivity
// ----------------------------------------------------
const tabPackages = document.getElementById('tab-packages');
const tabVisa = document.getElementById('tab-visa');
const searchDestination = document.getElementById('search-destination');
let activeSearchTab = 'packages'; // default

function handleTabSwitch(selectedTab) {
  if (selectedTab === 'packages') {
    activeSearchTab = 'packages';
    tabPackages.className = "search-tab flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-bold transition-all duration-300 bg-emerald-500 text-white shadow-md shadow-emerald-500/10";
    tabVisa.className = "search-tab flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-bold text-slate-500 hover:text-navy-900 hover:bg-slate-50 transition-all duration-300";
    
    // Change select label or options if necessary
    const label = document.querySelector('label[for="search-destination"]');
    if (label) label.innerText = 'Destination';
  } else {
    activeSearchTab = 'visa';
    tabVisa.className = "search-tab flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-bold transition-all duration-300 bg-emerald-500 text-white shadow-md shadow-emerald-500/10";
    tabPackages.className = "search-tab flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-bold text-slate-500 hover:text-navy-900 hover:bg-slate-50 transition-all duration-300";
    
    const label = document.querySelector('label[for="search-destination"]');
    if (label) label.innerText = 'Visa Required For';
  }
}

if (tabPackages && tabVisa) {
  tabPackages.addEventListener('click', () => handleTabSwitch('packages'));
  tabVisa.addEventListener('click', () => handleTabSwitch('visa'));
}

// Handle search form submission
const searchWidgetForm = document.getElementById('search-widget-form');
if (searchWidgetForm) {
  searchWidgetForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const dest = searchDestination.value;
    const date = document.getElementById('search-date').value;
    const guests = document.getElementById('search-guests').value;
    
    const prefillMessage = `${activeSearchTab === 'packages' ? 'Package Request' : 'Visa Assistance'} | Destination: ${dest.toUpperCase()} | Date: ${date} | Guests: ${guests}`;
    showConsultationModal(prefillMessage);
  });
}

// ----------------------------------------------------
// 4. AI Hybrid Consultation Widget
// ----------------------------------------------------
const aiQuickInput = document.getElementById('ai-quick-input');
const aiQuickBtn = document.getElementById('ai-quick-btn');

if (aiQuickBtn && aiQuickInput) {
  aiQuickBtn.addEventListener('click', () => {
    const textVal = aiQuickInput.value.trim();
    if (textVal) {
      showConsultationModal(`AI Custom Plan: "${textVal}"`);
      aiQuickInput.value = '';
    } else {
      showConsultationModal("AI Customized Consultation Request");
    }
  });

  // Enter key press triggers click
  aiQuickInput.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') {
      aiQuickBtn.click();
    }
  });
}

// ----------------------------------------------------
// 5. Testimonial Carousel Slider
// ----------------------------------------------------
const slides = document.querySelectorAll('.review-slide');
const dots = document.querySelectorAll('.slider-dot');
const sliderPrev = document.getElementById('slider-prev');
const sliderNext = document.getElementById('slider-next');
let currentSlide = 0;
let slideInterval;

function updateSlider(index) {
  currentSlide = (index + slides.length) % slides.length;
  
  slides.forEach((slide, idx) => {
    if (idx === currentSlide) {
      slide.classList.remove('hidden');
      slide.classList.add('block');
    } else {
      slide.classList.remove('block');
      slide.classList.add('hidden');
    }
  });

  dots.forEach((dot, idx) => {
    if (idx === currentSlide) {
      dot.className = "slider-dot w-2 h-2 rounded-full bg-emerald-500";
    } else {
      dot.className = "slider-dot w-2 h-2 rounded-full bg-slate-200";
    }
  });
}

function nextSlide() {
  updateSlider(currentSlide + 1);
}

function prevSlide() {
  updateSlider(currentSlide - 1);
}

function startSlideTimer() {
  stopSlideTimer();
  slideInterval = setInterval(nextSlide, 6000);
}

function stopSlideTimer() {
  if (slideInterval) clearInterval(slideInterval);
}

if (sliderNext && sliderPrev) {
  sliderNext.addEventListener('click', () => {
    nextSlide();
    startSlideTimer();
  });

  sliderPrev.addEventListener('click', () => {
    prevSlide();
    startSlideTimer();
  });

  dots.forEach(dot => {
    dot.addEventListener('click', () => {
      const idx = parseInt(dot.getAttribute('data-slide') || '0', 10);
      updateSlider(idx);
      startSlideTimer();
    });
  });

  startSlideTimer();
}

// ----------------------------------------------------
// 6. Lead Gen Forms Handler
// ----------------------------------------------------
const modalConsultationForm = document.getElementById('modal-consultation-form');
const footerContactForm = document.getElementById('footer-contact-form');

if (modalConsultationForm) {
  modalConsultationForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const name = document.getElementById('modal-name').value;
    const phone = document.getElementById('modal-phone').value;
    const dest = document.getElementById('modal-destination').value;
    
    console.log(`[LEAD RECEIVED]: Modal Consultation Form`, { name, phone, dest });
    
    modalConsultationForm.reset();
    hideConsultationModal();
    
    setTimeout(() => {
      showSuccessModal();
    }, 400);
  });
}

if (footerContactForm) {
  footerContactForm.addEventListener('submit', (e) => {
    e.preventDefault();
    
    const name = document.getElementById('contact-name').value;
    const phone = document.getElementById('contact-phone').value;
    const dest = document.getElementById('contact-destination').value;
    const date = document.getElementById('contact-date').value;
    const plan = document.getElementById('contact-plan').value;

    console.log(`[LEAD RECEIVED]: Footer Lead Form`, { name, phone, dest, date, plan });

    footerContactForm.reset();
    
    setTimeout(() => {
      showSuccessModal();
    }, 100);
  });
}

// ----------------------------------------------------
// 7. Packages Page Filtering Interactivity
// ----------------------------------------------------
const packageSearchInput = document.getElementById('package-search-input');
const filterDuration = document.getElementById('filter-duration');
const filterBudget = document.getElementById('filter-budget');
const resetFiltersBtn = document.getElementById('reset-filters-btn');
const packageItems = document.querySelectorAll('.package-item');

function filterPackages() {
  if (packageItems.length === 0) return;
  
  const query = packageSearchInput ? packageSearchInput.value.toLowerCase().trim() : '';
  const durationFilter = filterDuration ? filterDuration.value : 'all';
  const budgetFilter = filterBudget ? filterBudget.value : 'all';
  
  packageItems.forEach(item => {
    const title = (item.getAttribute('data-title') || '').toLowerCase();
    const duration = parseInt(item.getAttribute('data-duration') || '0', 10);
    const budget = parseInt(item.getAttribute('data-budget') || '0', 10);
    
    let matchesQuery = true;
    if (query) {
      matchesQuery = title.includes(query);
    }
    
    let matchesDuration = true;
    if (durationFilter === '4-5') {
      matchesDuration = duration >= 4 && duration <= 5;
    } else if (durationFilter === '6+') {
      matchesDuration = duration >= 6;
    }
    
    let matchesBudget = true;
    if (budgetFilter === 'under-50k') {
      matchesBudget = budget < 50000;
    } else if (budgetFilter === '50k-70k') {
      matchesBudget = budget >= 50000 && budget <= 70000;
    } else if (budgetFilter === 'over-70k') {
      matchesBudget = budget > 70000;
    }
    
    if (matchesQuery && matchesDuration && matchesBudget) {
      item.classList.remove('hidden');
      item.classList.add('flex');
    } else {
      item.classList.remove('flex');
      item.classList.add('hidden');
    }
  });
}

if (packageSearchInput) {
  packageSearchInput.addEventListener('input', filterPackages);
}
if (filterDuration) {
  filterDuration.addEventListener('change', filterPackages);
}
if (filterBudget) {
  filterBudget.addEventListener('change', filterPackages);
}
if (resetFiltersBtn) {
  resetFiltersBtn.addEventListener('click', () => {
    if (packageSearchInput) packageSearchInput.value = '';
    if (filterDuration) filterDuration.value = 'all';
    if (filterBudget) filterBudget.value = 'all';
    filterPackages();
  });
}

// ----------------------------------------------------
// 8. Visa Page Calculator Interactivity
// ----------------------------------------------------
const visaCalcForm = document.getElementById('visa-calc-form');
const visaCountrySelect = document.getElementById('visa-country');
const visaOccupationSelect = document.getElementById('visa-occupation');
const visaOutputPlaceholder = document.getElementById('visa-output-placeholder');
const visaOutputContent = document.getElementById('visa-output-content');

const visaOutCountryTitle = document.getElementById('visa-out-country-title');
const visaOutOccupSub = document.getElementById('visa-out-occup-sub');
const visaOutPrice = document.getElementById('visa-out-price');
const visaOutTime = document.getElementById('visa-out-time');
const visaDocsList = document.getElementById('visa-docs-list');
const visaCtaBtn = document.getElementById('visa-cta-btn');

const visaData = {
  dubai: {
    title: "Dubai (UAE) Tourist eVisa Support",
    price: "৳14,500",
    time: "5-7 Working Days",
    docs: {
      employee: [
        "Color scan copy of Passport (first page, validity minimum 6 months)",
        "Embassy specification photograph (white background, digital copy)",
        "Personal Bank Statement (last 6 months with minimum balance ৳150,000)",
        "Bank Solvency Certificate from branch manager",
        "No Objection Certificate (NOC) from employer on company letterhead",
        "Recent 3 months payslips or official corporate visiting card"
      ],
      business: [
        "Color scan copy of Passport (first page, validity minimum 6 months)",
        "Embassy specification photograph (white background, digital copy)",
        "Personal & Company Bank Statement (last 6 months with minimum balance ৳200,000)",
        "Bank Solvency Certificates for personal & company accounts",
        "Trade License copy (valid & updated) with notarized English translation",
        "Company Letterhead Pad and visiting cards"
      ],
      student: [
        "Color scan copy of Passport (first page, validity minimum 6 months)",
        "Embassy specification photograph (white background, digital copy)",
        "Parent's Bank Statement (last 6 months with solvency certificate)",
        "Sponsor letter from parent acknowledging visa & travel expenses",
        "NOC letter from school/college/university authority",
        "Valid Student ID card scan"
      ],
      retired: [
        "Color scan copy of Passport (first page, validity minimum 6 months)",
        "Embassy specification photograph (white background, digital copy)",
        "Personal Bank Statement (last 6 months with solvency certificate)",
        "Retirement Letter copy or Pension payment documents proof"
      ]
    }
  },
  thailand: {
    title: "Thailand Tourist Sticker Visa Processing",
    price: "৳6,500",
    time: "7-10 Working Days",
    docs: {
      employee: [
        "Original Passport with minimum 6 months validity & previous passports",
        "2 copies color photos (3.5 x 4.5 cm, matte finish, white background)",
        "Original Personal Bank Statement (last 6 months, balance ৳150,000+ per person)",
        "Original Bank Solvency Certificate",
        "Employer NOC letter detailing designation, joining, and salary logs",
        "Office Visiting Card and ID card copy"
      ],
      business: [
        "Original Passport with minimum 6 months validity & previous passports",
        "2 copies color photos (3.5 x 4.5 cm, matte finish, white background)",
        "Original Bank Statement (6 months) & Bank Solvency Certificate",
        "Trade License copy (updated) with English translation & notary public seals",
        "Company Visiting Card & Letterhead pad"
      ],
      student: [
        "Original Passport with minimum 6 months validity & previous passports",
        "2 copies color photos (3.5 x 4.5 cm, matte finish, white background)",
        "Parent's Original Bank Statement (6 months) & Bank Solvency",
        "NOC from school/college/university authority on official pad",
        "Copy of Student ID card"
      ],
      retired: [
        "Original Passport with minimum 6 months validity & previous passports",
        "2 copies color photos (3.5 x 4.5 cm, matte finish, white background)",
        "Original Bank Statement (6 months) & Bank Solvency",
        "Retirement document copy or proof of stable assets"
      ]
    }
  },
  singapore: {
    title: "Singapore Tourist eVisa Facilitation",
    price: "৳5,500",
    time: "4-6 Working Days",
    docs: {
      employee: [
        "High resolution scan copy of Passport and visa pages",
        "Embassy specification digital photograph (white background)",
        "Original Personal Bank Statement (last 6 months) & Solvency Certificate",
        "No Objection Certificate (NOC) from corporate employer",
        "Official Visiting Card & ID card copy",
        "Air ticket booking copy and hotel booking reference copy"
      ],
      business: [
        "High resolution scan copy of Passport and visa pages",
        "Embassy specification digital photograph (white background)",
        "Personal & Company Bank Statement (last 6 months) & Solvency",
        "Updated Trade License copy with notarized English translation",
        "Company Visiting Card and Letterhead Pad"
      ],
      student: [
        "High resolution scan copy of Passport and visa pages",
        "Embassy specification digital photograph (white background)",
        "Parent's Bank Statement (6 months) & Solvency Certificate",
        "Student ID card copy & NOC from educational institution"
      ],
      retired: [
        "High resolution scan copy of Passport and visa pages",
        "Embassy specification digital photograph (white background)",
        "Bank Statement (6 months) & Solvency Certificate",
        "Retirement letters / pension proof"
      ]
    }
  },
  malaysia: {
    title: "Malaysia Tourist eVisa Support",
    price: "৳6,000",
    time: "3-5 Working Days",
    docs: {
      employee: [
        "High resolution scan copy of Passport (first page, validity minimum 6 months)",
        "Embassy specification digital photograph (white background)",
        "Personal Bank Statement (last 6 months) & Solvency Certificate",
        "No Objection Certificate (NOC) from employer",
        "Confirmed return air ticket copy & hotel booking voucher"
      ],
      business: [
        "High resolution scan copy of Passport (first page, validity minimum 6 months)",
        "Embassy specification digital photograph (white background)",
        "Personal & Company Bank Statement (last 6 months) & Solvency",
        "Updated Trade License copy with notarized English translation",
        "Confirmed return air ticket copy & hotel booking voucher"
      ],
      student: [
        "High resolution scan copy of Passport (first page, validity minimum 6 months)",
        "Embassy specification digital photograph (white background)",
        "Parent's Bank Statement (6 months) & Solvency Certificate",
        "Student ID card copy & university NOC letter",
        "Confirmed return air ticket copy & hotel booking voucher"
      ],
      retired: [
        "High resolution scan copy of Passport (first page, validity minimum 6 months)",
        "Embassy specification digital photograph (white background)",
        "Bank Statement (6 months) & Solvency Certificate",
        "Confirmed return air ticket copy & hotel booking voucher"
      ]
    }
  }
};

function calculateVisaRequirements(e) {
  if (e) e.preventDefault();
  
  if (!visaCountrySelect || !visaOccupationSelect) return;
  
  const country = visaCountrySelect.value;
  const occupation = visaOccupationSelect.value;
  const countryInfo = visaData[country];
  
  if (!countryInfo) return;
  
  if (visaOutputPlaceholder) visaOutputPlaceholder.classList.add('hidden');
  if (visaOutputContent) visaOutputContent.classList.remove('hidden');
  
  if (visaOutCountryTitle) visaOutCountryTitle.innerText = countryInfo.title;
  if (visaOutOccupSub) visaOutOccupSub.innerText = `${occupation.toUpperCase()} Documentation Checklist`;
  if (visaOutPrice) visaOutPrice.innerText = countryInfo.price;
  if (visaOutTime) visaOutTime.innerText = countryInfo.time;
  
  if (visaDocsList) {
    visaDocsList.innerHTML = '';
    const docs = countryInfo.docs[occupation] || [];
    docs.forEach(doc => {
      const li = document.createElement('li');
      li.className = 'flex items-start gap-3';
      li.innerHTML = `
        <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs mt-0.5 flex-shrink-0">✓</span>
        <span>${doc}</span>
      `;
      visaDocsList.appendChild(li);
    });
  }

  if (visaCtaBtn) {
    const newBtn = visaCtaBtn.cloneNode(true);
    visaCtaBtn.parentNode.replaceChild(newBtn, visaCtaBtn);
    
    newBtn.addEventListener('click', () => {
      const countryName = visaCountrySelect.options[visaCountrySelect.selectedIndex].text;
      const occupName = visaOccupationSelect.options[visaOccupationSelect.selectedIndex].text;
      const prefillMessage = `Visa Request: ${countryName} (${occupName}) | Price: ${countryInfo.price}`;
      showConsultationModal(prefillMessage);
    });
  }
}

if (visaCalcForm) {
  visaCalcForm.addEventListener('submit', calculateVisaRequirements);
  calculateVisaRequirements();
}

// ----------------------------------------------------
// 9. Contact Page Form Handler
// ----------------------------------------------------
const contactPageForm = document.getElementById('contact-page-form');
if (contactPageForm) {
  contactPageForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const name = document.getElementById('c-name').value;
    const phone = document.getElementById('c-phone').value;
    const email = document.getElementById('c-email').value;
    const dest = document.getElementById('c-destination').value;
    const budget = document.getElementById('c-budget').value;
    const plan = document.getElementById('c-plan').value;

    console.log(`[LEAD RECEIVED]: Contact Page Form`, { name, phone, email, dest, budget, plan });
    
    contactPageForm.reset();
    showSuccessModal();
  });
}

// ----------------------------------------------------
// 10. Destination Details Page Dynamic Injection
// ----------------------------------------------------
const detailsMainContent = document.getElementById('details-main-content');
const detailsErrorContent = document.getElementById('details-error-content');

if (detailsMainContent && detailsErrorContent) {
  const urlParams = new URLSearchParams(window.location.search);
  const destId = urlParams.get('id');
  
  const destDetailsData = {
    dubai: {
      title: "Dubai Premium Experience",
      subtitle: "Experience the futuristic city safari in absolute luxury",
      image: "/dubai_safari.png",
      price: "৳65,000",
      duration: "5 Days / 4 Nights",
      overview: "From the height of Burj Khalifa to the depths of desert safaris, experience the best of Dubai with luxury hotel stays and VIP transportation.",
      days: [
        { title: "Day 1: Arrival & Dhow Cruise", desc: "Arrival in Dubai. Meet our representative for a VIP private transfer to your 5-star hotel. In the evening, enjoy a luxury Marina Dhow Cruise with an international buffet dinner." },
        { title: "Day 2: City Sightseeing & Burj Khalifa", desc: "Embark on a half-day Dubai City Tour (Gold Souk, Jumeirah Mosque, Palm Jumeirah). In the afternoon, visit the Dubai Mall and experience the 124th Floor Observation Deck of the iconic Burj Khalifa." },
        { title: "Day 3: Desert Safari & BBQ Dinner", desc: "Morning at leisure. Afternoon 4x4 desert safari adventure featuring thrilling dune bashing, camel riding, sandboarding, Tanoura show, and a traditional BBQ dinner." },
        { title: "Day 4: Miracle Garden & Global Village", desc: "Explore the floral displays of the Dubai Miracle Garden and spend the evening visiting the Global Village, experiencing multi-cultural pavilions and dining options." },
        { title: "Day 5: Departure", desc: "Enjoy breakfast at the hotel, check out, and transfer via private VIP vehicle to Dubai International Airport for your returning flight to Dhaka." }
      ],
      inclusions: [
        "Return flights from Dhaka to Dubai (pre-allocated seating)",
        "4 Nights accommodation in 5-star luxury hotel",
        "Daily buffet breakfast at the hotel",
        "Marina cruise dinner & Desert safari dinner included",
        "All sightseeing entry tickets (Burj Khalifa, Miracle Garden, etc.)",
        "Private VIP airport transfers and sightseeing transits"
      ],
      exclusions: [
        "Visa fee (processed separately)",
        "Lunch and meals not specified in the itinerary",
        "Personal travel insurance and tips"
      ]
    },
    thailand: {
      title: "Thailand Island & City Escape",
      subtitle: "Phuket island hopping & Bangkok city explorer",
      image: "/thailand_phuket.png",
      price: "৳58,000",
      duration: "6 Days / 5 Nights",
      overview: "Ditch the rush. Relax with island hopping in Phuket, explore Bangkok's historic temples, and indulge in pristine beachfront resorts.",
      days: [
        { title: "Day 1: Arrival in Phuket", desc: "Arrival in Phuket International Airport. Transfer to your premium beachfront resort. Spend the day relaxing by the infinity pool or walking on Patong Beach." },
        { title: "Day 2: Phi Phi Islands Speedboat Tour", desc: "Full-day speed boat trip to Phi Phi Islands, Maya Bay, and Khai Island. Enjoy snorkeling in crystal clear waters and a beachside buffet lunch." },
        { title: "Day 3: Phuket City Sightseeing", desc: "Explore Phuket's landmarks: The Big Buddha, Wat Chalong Temple, and Old Phuket Town. Evening at leisure for shopping." },
        { title: "Day 4: Flight to Bangkok & River Cruise", desc: "Transfer to airport for a short flight to Bangkok. Check-in to city hotel. In the evening, enjoy the Chao Phraya River Princess dinner cruise." },
        { title: "Day 5: Bangkok Temples & Grand Palace", desc: "Half-day tour of Bangkok's iconic temples: The Grand Palace, Wat Pho (Reclining Buddha), and Wat Arun. Spend the evening shopping at Siam Paragon." },
        { title: "Day 6: Check-out & Departure", desc: "Morning free for souvenir shopping. Check out and transfer via private coach to Suvarnabhumi Airport for your flight to Dhaka." }
      ],
      inclusions: [
        "Return flights from Dhaka to Bangkok & Bangkok to Phuket",
        "3 Nights in Phuket beachfront resort + 2 Nights in Bangkok central hotel",
        "Daily buffet breakfast at the hotels",
        "Phi Phi Island tour with lunch & Chao Phraya cruise dinner",
        "Private airport transfers and local sightseeing transits"
      ],
      exclusions: [
        "Thailand visa processing fee (sticker visa support available)",
        "Lunch and dinners not listed in the itinerary",
        "Personal shopping expenses"
      ]
    },
    singapore: {
      title: "Singapore FutureCity Escape",
      subtitle: "The ultimate modern metropolis family getaway",
      image: "/singapore_modern.png",
      price: "৳72,000",
      duration: "5 Days / 4 Nights",
      overview: "Immerse your family in Sentosa Island adventures, explore the futuristic supertrees at Gardens by the Bay, and tour Universal Studios.",
      days: [
        { title: "Day 1: Arrival & Night Safari", desc: "Arrival at Changi Airport. Transfer to your hotel. In the evening, experience the Singapore Night Safari tram ride through wildlife habitats." },
        { title: "Day 2: Sentosa Island Attractions", desc: "Full-day trip to Sentosa Island. Ride the scenic Cable Car, visit Madame Tussauds, and watch the Wings of Time multi-sensory light show." },
        { title: "Day 3: Universal Studios Singapore", desc: "A full day of thrilling rides and movie magic at Universal Studios Singapore (all rides pre-paid entry ticket included)." },
        { title: "Day 4: Gardens by the Bay & Shopping", desc: "Visit Gardens by the Bay (Flower Dome and Cloud Forest). Spend the afternoon shopping at Orchard Road malls." },
        { title: "Day 5: Check-out & Departure", desc: "Enjoy breakfast at the hotel, check out, and take a private shuttle to Changi Airport for your returning flight to Dhaka." }
      ],
      inclusions: [
        "Return flights from Dhaka to Singapore (seat priority)",
        "4 Nights stay in highly connected 4-star hotels",
        "Daily buffet breakfast at the hotel",
        "All entry tickets (Universal Studios, Night Safari, Gardens by the Bay)",
        "Private airport transfers and sightseeing transits"
      ],
      exclusions: [
        "Singapore visa processing fee (eVisa processing support available)",
        "Daily lunches and dinners",
        "Personal tips and travel insurance"
      ]
    },
    bali: {
      title: "Bali Paradise Beach Resort",
      subtitle: "Nature, jungle swings, and temple culture in Ubud & Nusa Dua",
      image: "/bali_beach.png",
      price: "৳48,000",
      duration: "5 Days / 4 Nights",
      overview: "Connect with nature, beaches, and historic Hindu temples in Ubud and Nusa Dua with private guides.",
      days: [
        { title: "Day 1: Arrival in Denpasar", desc: "Arrival at Bali International Airport. Private pickup and warm welcome, transfer to Nusa Dua beach resort. Day at leisure." },
        { title: "Day 2: Ubud Culture & Jungle Swing", desc: "Full-day tour of Ubud: Visit Tegenungan Waterfall, Tegallalang Rice Terrace, and Ubud monkey forest. Experience the Bali jungle swing." },
        { title: "Day 3: Tanah Lot Sunset Visit", desc: "Morning at leisure at Nusa Dua beach. Afternoon transfer to visit the offshore rock temple of Tanah Lot for sunset." },
        { title: "Day 4: Uluwatu Temple & Jimbaran Bay Dinner", desc: "Visit Uluwatu cliff temple, watch a Kecak fire dance performance, and enjoy a fresh seafood dinner at Jimbaran Bay." },
        { title: "Day 5: Check-out & Departure", desc: "Souvenir shopping at Kuta art market. Check out and transfer to airport for returning flight to Dhaka." }
      ],
      inclusions: [
        "Return flights from Dhaka to Denpasar (Bali)",
        "4 Nights in luxury 4-star Nusa Dua beach resort",
        "Daily breakfast at the resort + Seafood dinner at Jimbaran",
        "Ubud tour entries and jungle swing tickets",
        "Private English-speaking guide and VIP transfers"
      ],
      exclusions: [
        "Bali Visa On Arrival fee (approx USD 35 paid at airport)",
        "Lunches and dinners not listed",
        "Personal expenses"
      ]
    },
    maldives: {
      title: "Maldives Luxury Overwater Villa",
      subtitle: "Pure luxury over crystal clear turquoise lagoons",
      image: "/maldives_luxury.png",
      price: "৳85,000",
      duration: "4 Days / 3 Nights",
      overview: "Immerse yourself in pure luxury at an overwater bungalow with an all-inclusive meal plan.",
      days: [
        { title: "Day 1: Arrival & Speedboat Transfer", desc: "Arrival at Male Airport. Meet resort representative for a private speedboat transfer to your overwater villa. Welcome drinks and resort check-in." },
        { title: "Day 2: Snorkeling Safari & Dolphin Watch", desc: "Guided snorkeling safari around the private island reef. In the evening, enjoy a sunset dolphin-watching cruise." },
        { title: "Day 3: Sandbank Picnic & Water Sports", desc: "Boat trip to a private sandbank for a picnic lunch. Free time for resort water sports (kayaking, paddleboarding)." },
        { title: "Day 4: Male Departure", desc: "Enjoy spa treatment, check out, and take a speedboat transfer back to Male Airport for departure flight to Dhaka." }
      ],
      inclusions: [
        "Return flights from Dhaka to Male",
        "3 Nights stay in luxury Overwater Bungalow",
        "All Inclusive Plan: Daily Breakfast, Lunch, Dinner, and unlimited beverages",
        "Roundtrip airport speedboat transfers",
        "Snorkeling gears and kayak rentals"
      ],
      exclusions: [
        "Green tax (approx USD 6 per person per night paid at resort)",
        "Visa on arrival (free for Bangladesh tourists)",
        "Premium activities (scuba diving, parasailing)"
      ]
    },
    malaysia: {
      title: "Malaysia Twin Towers & Beach",
      subtitle: "Kuala Lumpur metropolis and Langkawi island shores",
      image: "/malaysia_towers.png",
      price: "৳42,000",
      duration: "5 Days / 4 Nights",
      overview: "See the Petronas Twin Towers, Genting Highlands, and escape to Langkawi beach resorts.",
      days: [
        { title: "Day 1: Arrival in Kuala Lumpur", desc: "Arrival in KLIA. Private transfer to your hotel. Evening tour of Chinatown and photo stop at Petronas Twin Towers." },
        { title: "Day 2: Genting Highlands & Batu Caves", desc: "Day tour of Batu Caves Hindu temple, Genting Highlands mountain resort, and cable car ride." },
        { title: "Day 3: Flight to Langkawi", desc: "Transfer to airport for domestic flight to Langkawi. Transfer to beachfront resort. Enjoy a sunset dinner cruise." },
        { title: "Day 4: Langkawi Island Hopping", desc: "Boat trip to Pregnant Maiden Lake, Eagle feeding, and Wet Rice Island. Afternoon visit to Langkawi SkyBridge." },
        { title: "Day 5: Check-out & Departure", desc: "Check out and transfer to Langkawi Airport for returning flight to Dhaka." }
      ],
      inclusions: [
        "Return flights from Dhaka to Kuala Lumpur & domestic flight to Langkawi",
        "2 Nights in Kuala Lumpur + 2 Nights in Langkawi beachfront resort",
        "Daily breakfast at the hotels",
        "Sightseeing tickets and Genting Cable Car entries",
        "Private airport transfers and sightseeing transits"
      ],
      exclusions: [
        "Malaysia visa fee (processed separately)",
        "Lunches and dinners not listed",
        "Personal expenses"
      ]
    }
  };

  const details = destDetailsData[destId];
  
  if (details) {
    detailsMainContent.classList.remove('hidden');
    detailsErrorContent.classList.add('hidden');
    
    document.title = `${details.title} | Itinerary Details | Airbridge Tours`;
    
    const titleEl = document.getElementById('details-title');
    const subtitleEl = document.getElementById('details-subtitle');
    const durationPill = document.getElementById('details-duration-pill');
    const priceEl = document.getElementById('details-price');
    const overviewEl = document.getElementById('details-overview');
    const heroImg = document.getElementById('details-hero-img');
    
    if (titleEl) titleEl.innerText = details.title;
    if (subtitleEl) subtitleEl.innerText = details.subtitle;
    if (durationPill) durationPill.innerText = details.duration;
    if (priceEl) priceEl.innerText = details.price;
    if (overviewEl) overviewEl.innerText = details.overview;
    
    if (heroImg) {
      heroImg.src = details.image;
      heroImg.alt = details.title;
    }
    
    const timelineContainer = document.getElementById('details-itinerary-timeline');
    if (timelineContainer) {
      timelineContainer.innerHTML = '';
      details.days.forEach((day, index) => {
        const node = document.createElement('div');
        node.className = 'relative flex flex-col text-left group';
        node.innerHTML = `
          <div class="absolute -left-[35px] sm:-left-[43px] top-1.5 w-4 h-4 rounded-full bg-canvas-bg border-4 border-emerald-500 group-hover:bg-emerald-500 transition-colors duration-300 z-10"></div>
          <h4 class="font-display font-bold text-lg text-slate-900 group-hover:text-emerald-500 transition-colors duration-200">${day.title}</h4>
          <p class="text-slate-500 font-sans text-xs sm:text-sm mt-1 leading-relaxed">${day.desc}</p>
        `;
        timelineContainer.appendChild(node);
      });
    }
    
    const inclusionsContainer = document.getElementById('details-inclusions');
    if (inclusionsContainer) {
      inclusionsContainer.innerHTML = '';
      details.inclusions.forEach(inc => {
        const li = document.createElement('li');
        li.className = 'flex items-start gap-2';
        li.innerHTML = `
          <span class="w-4 h-4 rounded bg-emerald-100 text-emerald-600 flex items-center justify-center text-[10px] font-bold mt-0.5 flex-shrink-0">✓</span>
          <span>${inc}</span>
        `;
        inclusionsContainer.appendChild(li);
      });
    }
    
    const exclusionsContainer = document.getElementById('details-exclusions');
    if (exclusionsContainer) {
      exclusionsContainer.innerHTML = '';
      details.exclusions.forEach(exc => {
        const li = document.createElement('li');
        li.className = 'flex items-start gap-2';
        li.innerHTML = `
          <span class="w-4 h-4 rounded bg-red-50 text-red-500 flex items-center justify-center text-[10px] font-bold mt-0.5 flex-shrink-0">✗</span>
          <span>${exc}</span>
        `;
        exclusionsContainer.appendChild(li);
      });
    }
    
    const bookingBtn = document.getElementById('details-booking-btn');
    if (bookingBtn) {
      bookingBtn.addEventListener('click', () => {
        showConsultationModal(`Booking Request: ${details.title} | Price: ${details.price}`);
      });
    }
    
  } else {
    detailsMainContent.classList.add('hidden');
    detailsErrorContent.classList.remove('hidden');
  }
}

// ----------------------------------------------------
// 11. Global Site Preloader
// ----------------------------------------------------
window.addEventListener('load', () => {
  const preloader = document.getElementById('preloader');
  if (preloader) {
    setTimeout(() => {
      preloader.style.opacity = '0';
      preloader.style.transform = 'translateY(-100%)';
      setTimeout(() => {
        preloader.classList.add('hidden');
      }, 800);
    }, 1500);
  }
});

// ----------------------------------------------------
// 12. Dynamic Service Details Rendering & Inquiry Handler
// ----------------------------------------------------
const srvMainContent = document.getElementById('srv-details-main-content');
const srvErrorContent = document.getElementById('srv-details-error-content');

if (srvMainContent && srvErrorContent) {
  const urlParams = new URLSearchParams(window.location.search);
  const srvId = urlParams.get('id');
  
  const srvDetailsData = {
    tickets: {
      title: "Aviation Logistics (Air Ticket)",
      subtitle: "Securing optimal flight schedules and priority seat options.",
      overview: "Through direct GDS connections and major airline contracts, we handle flight routing, seat layouts, and block booking allocations from Dhaka.",
      benefits: [
        { icon: "✈", title: "GDS Integration", desc: "Direct search across SABRE, Amadeus, and Galileo for instant ticketing." },
        { icon: "🎫", title: "Block Seat Allocations", desc: "Block spaces secured on popular holiday sectors from Dhaka." },
        { icon: "🔄", title: "Flexible Date Pathways", desc: "Adjustment loops for changes in corporate schedules or family itineraries." }
      ],
      steps: [
        { title: "Stage 1: Route Optimization", desc: "Analyze direct vs connecting flight schedules to match your timeline constraints." },
        { title: "Stage 2: Pricing & Fare Match", desc: "Run checks across airline consolidator fares to extract competitive ticketing rates." },
        { title: "Stage 3: Issuance & Seat Lock", desc: "Confirm pre-allocated seating, meal selections, and baggage allowance configurations." }
      ],
      fieldsHtml: `
        <div>
          <label for="srv-origin" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Departure City</label>
          <input id="srv-origin" type="text" placeholder="e.g. Dhaka (DAC)" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
        </div>
        <div>
          <label for="srv-destination" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Destination City</label>
          <input id="srv-destination" type="text" placeholder="e.g. Dubai (DXB)" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label for="srv-travel-date" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Departure Date</label>
            <input id="srv-travel-date" type="date" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
          </div>
          <div>
            <label for="srv-class" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Travel Class</label>
            <select id="srv-class" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500 cursor-pointer">
              <option value="economy">Economy Class</option>
              <option value="business">Business Class</option>
            </select>
          </div>
        </div>
      `,
      faqs: [
        { q: "Can I make changes to issued tickets?", a: "Yes, date change fees apply based on airline policies. Our 24/7 concierge will assist you immediately." },
        { q: "Are baggage allowances included?", a: "Yes, standard allowances (usually 30kg or 40kg) are guaranteed with all priority booking allocations." }
      ]
    },
    hotels: {
      title: "Comfort & Luxury Hotel Bookings",
      subtitle: "Vetted partner properties calibrated to safety, comfort, and budget targets.",
      overview: "We physically audit and select handpicked 4 and 5-star hotels that match strict corporate safety and family-friendly protocols.",
      benefits: [
        { icon: "🏨", title: "Vetted Properties", desc: "Hotel reviews audited for cleanliness, neighborhood safety, and locations." },
        { icon: "🍳", title: "Gourmet Breakfast", desc: "Daily buffet breakfast pre-included in all booking tiers." },
        { icon: "🤝", title: "Direct Partner Rates", desc: "Contracted wholesale rates directly with properties to maximize savings." }
      ],
      steps: [
        { title: "Stage 1: Parameter Intake", desc: "Understand room configurations, check-in timelines, and transit location access." },
        { title: "Stage 2: Selection Showcase", desc: "Present three vetted hotel options matching client profile and budget parameters." },
        { title: "Stage 3: Booking Lock", desc: "Confirm room upgrades, early check-in approvals, and pre-payment logs." }
      ],
      fieldsHtml: `
        <div>
          <label for="srv-hotel-city" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Destination City</label>
          <input id="srv-hotel-city" type="text" placeholder="e.g. Patong (Phuket)" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label for="srv-check-in" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Check-in Date</label>
            <input id="srv-check-in" type="date" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
          </div>
          <div>
            <label for="srv-check-out" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Check-out Date</label>
            <input id="srv-check-out" type="date" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
          </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label for="srv-rooms" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Room Count</label>
            <input id="srv-rooms" type="number" min="1" value="1" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
          </div>
          <div>
            <label for="srv-guests" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Guest Count</label>
            <input id="srv-guests" type="number" min="1" value="2" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
          </div>
        </div>
      `,
      faqs: [
        { q: "Is breakfast included in the booking?", a: "Yes, our packages guarantee daily buffet breakfast in all vetted 4 & 5-star hotels." },
        { q: "Can I request early check-in?", a: "Early check-in is subject to room availability, but we pre-coordinate with hotel desks for priority access." }
      ]
    },
    itinerary: {
      title: "Customized Tour Itineraries",
      subtitle: "Hour-by-hour scheduling logs planned by local destination experts.",
      overview: "Connect with nature, cities, and historic heritage sites at your own speed with custom timelines and local guide transits.",
      benefits: [
        { icon: "🗺", title: "Tailored Timelines", desc: "sightseeing tracks balanced with free slots for leisure." },
        { icon: "🧔", title: "Local Elite Guides", desc: "Vetted escorts detailing cultural insights and language aid." },
        { icon: "⚡", title: "Pre-Paid Entries", desc: "Attraction tickets pre-purchased to bypass long entrance lines." }
      ],
      steps: [
        { title: "Stage 1: Interest Profiling", desc: "Align plans based on group preferences (shopping, nature, adventure, heritage)." },
        { title: "Stage 2: Draft Timeline Build", desc: "Layout sequential day structures and restaurant locations for approval." },
        { title: "Stage 3: Pre-Paid Confirmation", desc: "Lock all logistics, coordinate guide handshakes, and issue vouchers." }
      ],
      fieldsHtml: `
        <div>
          <label for="srv-itin-dest" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Target Destination</label>
          <input id="srv-itin-dest" type="text" placeholder="e.g. Bali / Singapore" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label for="srv-itin-days" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Duration (Days)</label>
            <input id="srv-itin-days" type="number" min="1" value="5" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
          </div>
          <div>
            <label for="srv-itin-travelers" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Traveler Count</label>
            <input id="srv-itin-travelers" type="number" min="1" value="2" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
          </div>
        </div>
      `,
      faqs: [
        { q: "Are sightseeing tickets pre-purchased?", a: "Yes, all attraction entries are pre-purchased and handdelivered to avoid long ticket lines." },
        { q: "Can we skip items in the itinerary?", a: "Yes, the custom timeline is fully yours. You can adjust plans with your dedicated guide." }
      ]
    },
    transport: {
      title: "Local Elite Transit & Transfers",
      subtitle: "Airport shuttle pickups and private tour transport fleets.",
      overview: "Ride in luxury. Our local transport packages feature clean air-conditioned SUV/microbus vehicles, vetted drivers, and real-time tracking.",
      benefits: [
        { icon: "🚐", title: "Premium VIP Fleets", desc: "Air-conditioned vehicles matching private passenger sizes." },
        { icon: "👮", title: "Vetted Driver Escort", desc: "Safe, professional local drivers meeting clear guidelines." },
        { icon: "📍", title: "GPS Tracking", desc: "Coordinates monitored real-time for airport flight drops." }
      ],
      steps: [
        { title: "Stage 1: Flight Verification", desc: "Match arrival/departure flight schedules to allocate transits." },
        { title: "Stage 2: Fleet Allocation", desc: "Assign private sedan, SUV, or microbus based on baggage metrics." },
        { title: "Stage 3: Terminal Handshake", desc: "Vetted guide or chauffeur greets travelers at the arrivals exit gate." }
      ],
      fieldsHtml: `
        <div>
          <label for="srv-pickup" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Pickup Location</label>
          <input id="srv-pickup" type="text" placeholder="e.g. Suvarnabhumi Airport / Hotel" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
        </div>
        <div>
          <label for="srv-drop" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Drop-off Location</label>
          <input id="srv-drop" type="text" placeholder="e.g. Central Bangkok Hotel" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label for="srv-transfer-date" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Transfer Date</label>
            <input id="srv-transfer-date" type="date" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
          </div>
          <div>
            <label for="srv-vehicle-class" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Vehicle Preference</label>
            <select id="srv-vehicle-class" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500 cursor-pointer">
              <option value="sedan">VIP Sedan</option>
              <option value="suv">Premium SUV (4x4)</option>
              <option value="microbus">AC High-Roof Coach</option>
            </select>
          </div>
        </div>
      `,
      faqs: [
        { q: "How do I locate the driver at the airport?", a: "Our driver will stand at the arrival gate holding a placard with your name." },
        { q: "Are tolls and fuel included?", a: "Yes, all parking fees, tolls, fuel, and driver charges are completely included." }
      ]
    },
    visa: {
      title: "Professional Visa Facilitation Desk",
      subtitle: "Eliminate rejection worries with strict documentation checklists.",
      overview: "Expert checking pipelines, pre-filled visa application forms, and hand-delivered passport support for tourist and business visa submissions.",
      benefits: [
        { icon: "🛂", title: "Paperwork Pre-Vetting", desc: "Rigorous checks on bank statements, trade licenses, and solvency codes." },
        { icon: "📈", title: "High Approval Rates", desc: "Document structuring that yields a verified 99.4% visa track record." },
        { icon: "🏢", title: "Embassy Support", desc: "Direct hand-delivery submission desk for eVisa and sticker channels." }
      ],
      steps: [
        { title: "Stage 1: Documentation Review", desc: "Screen bank solvencies, trade certificates, and NOC letter parameters." },
        { title: "Stage 2: Form Pre-Filling", desc: "Embassy forms drafted by visa desk specialists to avoid inputs mismatch." },
        { title: "Stage 3: Submission & Handback", desc: "Process eVisa or file passport at visa application centers, tracking status." }
      ],
      fieldsHtml: `
        <div>
          <label for="srv-visa-dest" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Destination Country</label>
          <input id="srv-visa-dest" type="text" placeholder="e.g. Dubai / Singapore / Thailand" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label for="srv-visa-occup" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Applicant Profession</label>
            <input id="srv-visa-occup" type="text" placeholder="e.g. Corporate Employee" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
          </div>
          <div>
            <label for="srv-visa-date" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Intended Travel Date</label>
            <input id="srv-visa-date" type="date" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
          </div>
        </div>
      `,
      faqs: [
        { q: "Do you guarantee visa approval?", a: "While embassy decisions are final, our rigorous vetting yields a verified 99.4% approval rate." },
        { q: "How long does sticker visa processing take?", a: "Standard processing is 7-10 working days, depending on embassy queue volumes." }
      ]
    },
    group: {
      title: "Enterprise & Group Tours",
      subtitle: "High-density logistics coordination for corporate retreats and large families.",
      overview: "We manage custom flights, banquet menu preferences, private luxury coaches, conference setups, and dedicated team guides.",
      benefits: [
        { icon: "👥", title: "Onsite Coordinator", desc: "Dedicated trip architects traveling alongside the group." },
        { icon: "🍽", title: "Customized Banquets", desc: "Pre-booked restaurant menus matching dietary configurations." },
        { icon: "🏷", title: "Consolidated Discounting", desc: "Volume reductions secured across flights, rooms, and entry passes." }
      ],
      steps: [
        { title: "Stage 1: Scope Definition", desc: "Establish headcounts, conference requirements, and banquet profiles." },
        { title: "Stage 2: Budget Structuring", desc: "Calibrate optimal itineraries to maximize corporate incentive budgets." },
        { title: "Stage 3: Onsite Implementation", desc: "Guides monitor flight check-ins, coach transits, and hotel allocations live." }
      ],
      fieldsHtml: `
        <div>
          <label for="srv-group-org" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Company / Group Lead Name</label>
          <input id="srv-group-org" type="text" placeholder="e.g. Apex Digital Ltd" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label for="srv-group-size" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Traveler Count</label>
            <input id="srv-group-size" type="number" min="5" value="15" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
          </div>
          <div>
            <label for="srv-group-dest" class="block font-sans font-bold text-[10px] uppercase tracking-wider text-slate-400 mb-1.5 ml-1">Destination Focus</label>
            <input id="srv-group-dest" type="text" placeholder="e.g. Dubai Marina Yacht Retreat" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-sans text-sm focus:outline-none focus:border-emerald-500" />
          </div>
        </div>
      `,
      faqs: [
        { q: "What is the minimum group size for custom discounts?", a: "Group discounts apply for bookings with 10 or more passengers." },
        { q: "Can we request a dedicated tour coordinator?", a: "Yes, all groups over 15+ travelers get a dedicated onsite guide for the entire duration." }
      ]
    }
  };

  const details = srvDetailsData[srvId];
  
  if (details) {
    srvMainContent.classList.remove('hidden');
    srvErrorContent.classList.add('hidden');
    
    document.title = `${details.title} | Service Details | Airbridge Tours`;
    
    const titleEl = document.getElementById('srv-details-title');
    const subtitleEl = document.getElementById('srv-details-subtitle');
    const overviewEl = document.getElementById('srv-details-overview');
    
    if (titleEl) titleEl.innerText = details.title;
    if (subtitleEl) subtitleEl.innerText = details.subtitle;
    if (overviewEl) overviewEl.innerText = details.overview;
    
    // Render benefits grid
    const benefitsContainer = document.getElementById('srv-details-benefits');
    if (benefitsContainer) {
      benefitsContainer.innerHTML = '';
      details.benefits.forEach(ben => {
        const div = document.createElement('div');
        div.className = 'bg-white border border-slate-100 p-5 rounded-3xl shadow-sm hover:shadow-md transition-all text-left';
        div.innerHTML = `
          <div class="w-9 h-9 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center font-bold text-sm mb-4">${ben.icon}</div>
          <h4 class="font-display font-bold text-sm text-slate-800 mb-1.5">${ben.title}</h4>
          <p class="text-slate-400 font-sans text-[11px] leading-normal">${ben.desc}</p>
        `;
        benefitsContainer.appendChild(div);
      });
    }
    
    // Render timeline steps
    const timelineContainer = document.getElementById('srv-details-timeline');
    if (timelineContainer) {
      timelineContainer.innerHTML = '';
      details.steps.forEach((step, index) => {
        const div = document.createElement('div');
        div.className = 'relative flex flex-col text-left group';
        div.innerHTML = `
          <div class="absolute -left-[35px] sm:-left-[43px] top-1.5 w-4 h-4 rounded-full bg-canvas-bg border-4 border-emerald-500 group-hover:bg-emerald-500 transition-colors duration-300 z-10"></div>
          <h4 class="font-display font-bold text-base text-slate-900 group-hover:text-emerald-500 transition-colors duration-200">${step.title}</h4>
          <p class="text-slate-500 font-sans text-xs mt-1 leading-relaxed">${step.desc}</p>
        `;
        timelineContainer.appendChild(div);
      });
    }
    
    // Inject dynamic fields
    const dynamicFieldsContainer = document.getElementById('srv-dynamic-fields');
    if (dynamicFieldsContainer) {
      dynamicFieldsContainer.innerHTML = details.fieldsHtml;
    }
    
    // Inject FAQs
    const faqsContainer = document.getElementById('srv-details-faqs');
    if (faqsContainer) {
      faqsContainer.innerHTML = '';
      details.faqs.forEach(faq => {
        const div = document.createElement('div');
        div.className = 'flex flex-col gap-1 text-left';
        div.innerHTML = `
          <h4 class="font-sans font-bold text-xs text-slate-800">Q: ${faq.q}</h4>
          <p class="font-sans text-[11px] text-slate-400 leading-normal">A: ${faq.a}</p>
        `;
        faqsContainer.appendChild(div);
      });
    }

    // Handle form submission
    const form = document.getElementById('srv-inquiry-form');
    if (form) {
      form.addEventListener('submit', (e) => {
        e.preventDefault();
        const clientName = document.getElementById('srv-name').value;
        const clientPhone = document.getElementById('srv-phone').value;
        const comments = document.getElementById('srv-comments').value;
        
        console.log(`[SERVICE INQUIRY LOGGED]: ${details.title}`, {
          clientName,
          clientPhone,
          comments
        });
        
        form.reset();
        showSuccessModal();
      });
    }
    
  } else {
    srvMainContent.classList.add('hidden');
    srvErrorContent.classList.remove('hidden');
  }
}



