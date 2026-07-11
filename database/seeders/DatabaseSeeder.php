<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\TourPackage;
use App\Models\ItineraryDay;
use App\Models\Service;
use App\Models\VisaRule;
use App\Models\VisaRequirement;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── Admin User ──────────────────────────────────────────────
        User::firstOrCreate(
            ['email' => 'admin@airbridge.com'],
            [
                'name'     => 'Airbridge Admin',
                'password' => Hash::make('password'),
            ]
        );

        // ── Tour Packages ────────────────────────────────────────────
        $packages = [
            [
                'slug'          => 'dubai',
                'title'         => 'Dubai Premium Experience',
                'subtitle'      => 'Experience the futuristic city safari in absolute luxury',
                'category'      => 'City & Desert Safari',
                'is_spotlight'  => true,
                'duration'      => '5 Days / 4 Nights',
                'duration_days' => 5,
                'price'         => 65000,
                'stars'         => 5,
                'reviews_count' => 240,
                'overview'      => 'From the height of Burj Khalifa to the depths of desert safaris, experience the best of Dubai with luxury hotel stays and VIP transportation.',
                'image_path'    => 'packages/dubai_safari.png',
                'inclusions'    => [
                    'Return flights from Dhaka to Dubai (pre-allocated seating)',
                    '4 Nights accommodation in 5-star luxury hotel',
                    'Daily buffet breakfast at the hotel',
                    'Marina cruise dinner & Desert safari dinner included',
                    'All sightseeing entry tickets (Burj Khalifa, Miracle Garden, etc.)',
                    'Private VIP airport transfers and sightseeing transits',
                ],
                'exclusions' => [
                    'Visa fee (processed separately)',
                    'Lunch and meals not specified in the itinerary',
                    'Personal travel insurance and tips',
                ],
                'days' => [
                    ['title' => 'Day 1: Arrival & Dhow Cruise', 'description' => 'Arrival in Dubai. Meet our representative for a VIP private transfer to your 5-star hotel. In the evening, enjoy a luxury Marina Dhow Cruise with an international buffet dinner.'],
                    ['title' => 'Day 2: City Sightseeing & Burj Khalifa', 'description' => 'Embark on a half-day Dubai City Tour (Gold Souk, Jumeirah Mosque, Palm Jumeirah). In the afternoon, visit the Dubai Mall and experience the 124th Floor Observation Deck of the iconic Burj Khalifa.'],
                    ['title' => 'Day 3: Desert Safari & BBQ Dinner', 'description' => 'Morning at leisure. Afternoon 4x4 desert safari adventure featuring thrilling dune bashing, camel riding, sandboarding, Tanoura show, and a traditional BBQ dinner.'],
                    ['title' => 'Day 4: Miracle Garden & Global Village', 'description' => 'Explore the floral displays of the Dubai Miracle Garden and spend the evening visiting the Global Village, experiencing multi-cultural pavilions and dining options.'],
                    ['title' => 'Day 5: Departure', 'description' => 'Enjoy breakfast at the hotel, check out, and transfer via private VIP vehicle to Dubai International Airport for your returning flight to Dhaka.'],
                ],
            ],
            [
                'slug'          => 'thailand',
                'title'         => 'Thailand Island & City Escape',
                'subtitle'      => 'Phuket island hopping & Bangkok city explorer',
                'category'      => 'Beach & Island Hopping',
                'duration'      => '6 Days / 5 Nights',
                'duration_days' => 6,
                'price'         => 58000,
                'stars'         => 5,
                'reviews_count' => 190,
                'overview'      => 'Ditch the rush. Relax with island hopping in Phuket, explore Bangkok\'s historic temples, and indulge in pristine beachfront resorts.',
                'image_path'    => 'packages/thailand_phuket.png',
                'inclusions'    => [
                    'Return flights from Dhaka to Bangkok & Bangkok to Phuket',
                    '3 Nights in Phuket beachfront resort + 2 Nights in Bangkok central hotel',
                    'Daily buffet breakfast at the hotels',
                    'Phi Phi Island tour with lunch & Chao Phraya cruise dinner',
                    'Private airport transfers and local sightseeing transits',
                ],
                'exclusions' => [
                    'Thailand visa processing fee (sticker visa support available)',
                    'Lunch and dinners not listed in the itinerary',
                    'Personal shopping expenses',
                ],
                'days' => [
                    ['title' => 'Day 1: Arrival in Phuket', 'description' => 'Arrival in Phuket International Airport. Transfer to your premium beachfront resort. Spend the day relaxing by the infinity pool or walking on Patong Beach.'],
                    ['title' => 'Day 2: Phi Phi Islands Speedboat Tour', 'description' => 'Full-day speed boat trip to Phi Phi Islands, Maya Bay, and Khai Island. Enjoy snorkeling in crystal clear waters and a beachside buffet lunch.'],
                    ['title' => 'Day 3: Phuket City Sightseeing', 'description' => 'Explore Phuket\'s landmarks: The Big Buddha, Wat Chalong Temple, and Old Phuket Town. Evening at leisure for shopping.'],
                    ['title' => 'Day 4: Flight to Bangkok & River Cruise', 'description' => 'Transfer to airport for a short flight to Bangkok. Check-in to city hotel. In the evening, enjoy the Chao Phraya River Princess dinner cruise.'],
                    ['title' => 'Day 5: Bangkok Temples & Grand Palace', 'description' => 'Half-day tour of Bangkok\'s iconic temples: The Grand Palace, Wat Pho (Reclining Buddha), and Wat Arun. Spend the evening shopping at Siam Paragon.'],
                    ['title' => 'Day 6: Check-out & Departure', 'description' => 'Morning free for souvenir shopping. Check out and transfer via private coach to Suvarnabhumi Airport for your flight to Dhaka.'],
                ],
            ],
            [
                'slug'          => 'singapore',
                'title'         => 'Singapore FutureCity Escape',
                'subtitle'      => 'The ultimate modern metropolis family getaway',
                'category'      => 'Modern Metropolis',
                'duration'      => '5 Days / 4 Nights',
                'duration_days' => 5,
                'price'         => 72000,
                'stars'         => 5,
                'reviews_count' => 310,
                'overview'      => 'Immerse your family in Sentosa Island adventures, explore the futuristic supertrees at Gardens by the Bay, and tour Universal Studios.',
                'image_path'    => 'packages/singapore_modern.png',
                'inclusions'    => [
                    'Return flights from Dhaka to Singapore (seat priority)',
                    '4 Nights stay in highly connected 4-star hotels',
                    'Daily buffet breakfast at the hotel',
                    'All entry tickets (Universal Studios, Night Safari, Gardens by the Bay)',
                    'Private airport transfers and sightseeing transits',
                ],
                'exclusions' => [
                    'Singapore visa processing fee (eVisa processing support available)',
                    'Daily lunches and dinners',
                    'Personal tips and travel insurance',
                ],
                'days' => [
                    ['title' => 'Day 1: Arrival & Night Safari', 'description' => 'Arrival at Changi Airport. Transfer to your hotel. In the evening, experience the Singapore Night Safari tram ride through wildlife habitats.'],
                    ['title' => 'Day 2: Sentosa Island Attractions', 'description' => 'Full-day trip to Sentosa Island. Ride the scenic Cable Car, visit Madame Tussauds, and watch the Wings of Time multi-sensory light show.'],
                    ['title' => 'Day 3: Universal Studios Singapore', 'description' => 'A full day of thrilling rides and movie magic at Universal Studios Singapore (all rides pre-paid entry ticket included).'],
                    ['title' => 'Day 4: Gardens by the Bay & Shopping', 'description' => 'Visit Gardens by the Bay (Flower Dome and Cloud Forest). Spend the afternoon shopping at Orchard Road malls.'],
                    ['title' => 'Day 5: Check-out & Departure', 'description' => 'Enjoy breakfast at the hotel, check out, and take a private shuttle to Changi Airport for your returning flight to Dhaka.'],
                ],
            ],
            [
                'slug'          => 'bali',
                'title'         => 'Bali Paradise Beach Resort',
                'subtitle'      => 'Nature, jungle swings, and temple culture in Ubud & Nusa Dua',
                'category'      => 'Nature & Temple Culture',
                'duration'      => '5 Days / 4 Nights',
                'duration_days' => 5,
                'price'         => 48000,
                'stars'         => 5,
                'reviews_count' => 150,
                'overview'      => 'Connect with nature, beaches, and historic Hindu temples in Ubud and Nusa Dua with private guides.',
                'image_path'    => 'packages/bali_beach.png',
                'inclusions'    => [
                    'Return flights from Dhaka to Denpasar (Bali)',
                    '4 Nights in luxury 4-star Nusa Dua beach resort',
                    'Daily breakfast at the resort + Seafood dinner at Jimbaran',
                    'Ubud tour entries and jungle swing tickets',
                    'Private English-speaking guide and VIP transfers',
                ],
                'exclusions' => [
                    'Bali Visa On Arrival fee (approx USD 35 paid at airport)',
                    'Lunches and dinners not listed',
                    'Personal expenses',
                ],
                'days' => [
                    ['title' => 'Day 1: Arrival in Denpasar', 'description' => 'Arrival at Bali International Airport. Private pickup and warm welcome, transfer to Nusa Dua beach resort. Day at leisure.'],
                    ['title' => 'Day 2: Ubud Culture & Jungle Swing', 'description' => 'Full-day tour of Ubud: Visit Tegenungan Waterfall, Tegallalang Rice Terrace, and Ubud monkey forest. Experience the Bali jungle swing.'],
                    ['title' => 'Day 3: Tanah Lot Sunset Visit', 'description' => 'Morning at leisure at Nusa Dua beach. Afternoon transfer to visit the offshore rock temple of Tanah Lot for sunset.'],
                    ['title' => 'Day 4: Uluwatu Temple & Jimbaran Bay Dinner', 'description' => 'Visit Uluwatu cliff temple, watch a Kecak fire dance performance, and enjoy a fresh seafood dinner at Jimbaran Bay.'],
                    ['title' => 'Day 5: Check-out & Departure', 'description' => 'Souvenir shopping at Kuta art market. Check out and transfer to airport for returning flight to Dhaka.'],
                ],
            ],
            [
                'slug'          => 'maldives',
                'title'         => 'Maldives Luxury Overwater Villa',
                'subtitle'      => 'Pure luxury over crystal clear turquoise lagoons',
                'category'      => 'Premium Overwater Villa',
                'duration'      => '4 Days / 3 Nights',
                'duration_days' => 4,
                'price'         => 85000,
                'stars'         => 5,
                'reviews_count' => 110,
                'overview'      => 'Immerse yourself in pure luxury at an overwater bungalow with an all-inclusive meal plan.',
                'image_path'    => 'packages/maldives_luxury.png',
                'inclusions'    => [
                    'Return flights from Dhaka to Male',
                    '3 Nights stay in luxury Overwater Bungalow',
                    'All Inclusive Plan: Daily Breakfast, Lunch, Dinner, and unlimited beverages',
                    'Roundtrip airport speedboat transfers',
                    'Snorkeling gears and kayak rentals',
                ],
                'exclusions' => [
                    'Green tax (approx USD 6 per person per night paid at resort)',
                    'Visa on arrival (free for Bangladesh tourists)',
                    'Premium activities (scuba diving, parasailing)',
                ],
                'days' => [
                    ['title' => 'Day 1: Arrival & Speedboat Transfer', 'description' => 'Arrival at Male Airport. Meet resort representative for a private speedboat transfer to your overwater villa. Welcome drinks and resort check-in.'],
                    ['title' => 'Day 2: Snorkeling Safari & Dolphin Watch', 'description' => 'Guided snorkeling safari around the private island reef. In the evening, enjoy a sunset dolphin-watching cruise.'],
                    ['title' => 'Day 3: Sandbank Picnic & Water Sports', 'description' => 'Boat trip to a private sandbank for a picnic lunch. Free time for resort water sports (kayaking, paddleboarding).'],
                    ['title' => 'Day 4: Male Departure', 'description' => 'Enjoy spa treatment, check out, and take a speedboat transfer back to Male Airport for departure flight to Dhaka.'],
                ],
            ],
            [
                'slug'          => 'malaysia',
                'title'         => 'Malaysia Twin Towers & Beach',
                'subtitle'      => 'Kuala Lumpur metropolis and Langkawi island shores',
                'category'      => 'City Skyline & Langkawi Beaches',
                'duration'      => '5 Days / 4 Nights',
                'duration_days' => 5,
                'price'         => 42000,
                'stars'         => 5,
                'reviews_count' => 180,
                'overview'      => 'See the Petronas Twin Towers, Genting Highlands, and escape to Langkawi beach resorts.',
                'image_path'    => 'packages/malaysia_towers.png',
                'inclusions'    => [
                    'Return flights from Dhaka to Kuala Lumpur & domestic flight to Langkawi',
                    '2 Nights in Kuala Lumpur + 2 Nights in Langkawi beachfront resort',
                    'Daily breakfast at the hotels',
                    'Sightseeing tickets and Genting Cable Car entries',
                    'Private airport transfers and sightseeing transits',
                ],
                'exclusions' => [
                    'Malaysia visa fee (processed separately)',
                    'Lunches and dinners not listed',
                    'Personal expenses',
                ],
                'days' => [
                    ['title' => 'Day 1: Arrival in Kuala Lumpur', 'description' => 'Arrival in KLIA. Private transfer to your hotel. Evening tour of Chinatown and photo stop at Petronas Twin Towers.'],
                    ['title' => 'Day 2: Genting Highlands & Batu Caves', 'description' => 'Day tour of Batu Caves Hindu temple, Genting Highlands mountain resort, and cable car ride.'],
                    ['title' => 'Day 3: Flight to Langkawi', 'description' => 'Transfer to airport for domestic flight to Langkawi. Transfer to beachfront resort. Enjoy a sunset dinner cruise.'],
                    ['title' => 'Day 4: Langkawi Island Hopping', 'description' => 'Boat trip to Pregnant Maiden Lake, Eagle feeding, and Wet Rice Island. Afternoon visit to Langkawi SkyBridge.'],
                    ['title' => 'Day 5: Check-out & Departure', 'description' => 'Check out and transfer to Langkawi Airport for returning flight to Dhaka.'],
                ],
            ],
        ];

        foreach ($packages as $data) {
            $days = $data['days'];
            unset($data['days']);
            $package = TourPackage::updateOrCreate(['slug' => $data['slug']], $data);
            if ($package->wasRecentlyCreated || ItineraryDay::where('tour_package_id', $package->id)->count() === 0) {
                ItineraryDay::where('tour_package_id', $package->id)->delete();
                foreach ($days as $i => $day) {
                    ItineraryDay::create([
                        'tour_package_id' => $package->id,
                        'day_number'      => $i + 1,
                        'title'           => $day['title'],
                        'description'     => $day['description'],
                    ]);
                }
            }
        }

        // ── Visa Rules ───────────────────────────────────────────────
        $visaRules = [
            [
                'country_code'    => 'dubai',
                'title'           => 'Dubai (UAE) Tourist eVisa Support',
                'price'           => 14500,
                'processing_time' => '5-7 Working Days',
                'requirements'    => [
                    'employee' => [
                        'Color scan copy of Passport (first page, validity minimum 6 months)',
                        'Embassy specification photograph (white background, digital copy)',
                        'Personal Bank Statement (last 6 months with minimum balance ৳150,000)',
                        'Bank Solvency Certificate from branch manager',
                        'No Objection Certificate (NOC) from employer on company letterhead',
                        'Recent 3 months payslips or official corporate visiting card',
                    ],
                    'business' => [
                        'Color scan copy of Passport (first page, validity minimum 6 months)',
                        'Embassy specification photograph (white background, digital copy)',
                        'Personal & Company Bank Statement (last 6 months with minimum balance ৳200,000)',
                        'Bank Solvency Certificates for personal & company accounts',
                        'Trade License copy (valid & updated) with notarized English translation',
                        'Company Letterhead Pad and visiting cards',
                    ],
                    'student' => [
                        'Color scan copy of Passport (first page, validity minimum 6 months)',
                        'Embassy specification photograph (white background, digital copy)',
                        "Parent's Bank Statement (last 6 months with solvency certificate)",
                        'Sponsor letter from parent acknowledging visa & travel expenses',
                        'NOC letter from school/college/university authority',
                        'Valid Student ID card scan',
                    ],
                    'retired' => [
                        'Color scan copy of Passport (first page, validity minimum 6 months)',
                        'Embassy specification photograph (white background, digital copy)',
                        'Personal Bank Statement (last 6 months with solvency certificate)',
                        'Retirement Letter copy or Pension payment documents proof',
                    ],
                ],
            ],
            [
                'country_code'    => 'thailand',
                'title'           => 'Thailand Tourist Sticker Visa Processing',
                'price'           => 6500,
                'processing_time' => '7-10 Working Days',
                'requirements'    => [
                    'employee' => [
                        'Original Passport with minimum 6 months validity & previous passports',
                        '2 copies color photos (3.5 x 4.5 cm, matte finish, white background)',
                        'Original Personal Bank Statement (last 6 months, balance ৳150,000+ per person)',
                        'Original Bank Solvency Certificate',
                        'Employer NOC letter detailing designation, joining, and salary logs',
                        'Office Visiting Card and ID card copy',
                    ],
                    'business' => [
                        'Original Passport with minimum 6 months validity & previous passports',
                        '2 copies color photos (3.5 x 4.5 cm, matte finish, white background)',
                        'Original Bank Statement (6 months) & Bank Solvency Certificate',
                        'Trade License copy (updated) with English translation & notary public seals',
                        'Company Visiting Card & Letterhead pad',
                    ],
                    'student' => [
                        'Original Passport with minimum 6 months validity & previous passports',
                        '2 copies color photos (3.5 x 4.5 cm, matte finish, white background)',
                        "Parent's Original Bank Statement (6 months) & Bank Solvency",
                        'NOC from school/college/university authority on official pad',
                        'Copy of Student ID card',
                    ],
                    'retired' => [
                        'Original Passport with minimum 6 months validity & previous passports',
                        '2 copies color photos (3.5 x 4.5 cm, matte finish, white background)',
                        'Original Bank Statement (6 months) & Bank Solvency',
                        'Retirement document copy or proof of stable assets',
                    ],
                ],
            ],
            [
                'country_code'    => 'singapore',
                'title'           => 'Singapore Tourist eVisa Facilitation',
                'price'           => 5500,
                'processing_time' => '4-6 Working Days',
                'requirements'    => [
                    'employee' => [
                        'High resolution scan copy of Passport and visa pages',
                        'Embassy specification digital photograph (white background)',
                        'Original Personal Bank Statement (last 6 months) & Solvency Certificate',
                        'No Objection Certificate (NOC) from corporate employer',
                        'Official Visiting Card & ID card copy',
                        'Air ticket booking copy and hotel booking reference copy',
                    ],
                    'business' => [
                        'High resolution scan copy of Passport and visa pages',
                        'Embassy specification digital photograph (white background)',
                        'Personal & Company Bank Statement (last 6 months) & Solvency',
                        'Updated Trade License copy with notarized English translation',
                        'Company Visiting Card and Letterhead Pad',
                    ],
                    'student' => [
                        'High resolution scan copy of Passport and visa pages',
                        'Embassy specification digital photograph (white background)',
                        "Parent's Bank Statement (6 months) & Solvency Certificate",
                        'Student ID card copy & NOC from educational institution',
                    ],
                    'retired' => [
                        'High resolution scan copy of Passport and visa pages',
                        'Embassy specification digital photograph (white background)',
                        'Bank Statement (6 months) & Solvency Certificate',
                        'Retirement letters / pension proof',
                    ],
                ],
            ],
            [
                'country_code'    => 'malaysia',
                'title'           => 'Malaysia Tourist eVisa Support',
                'price'           => 6000,
                'processing_time' => '3-5 Working Days',
                'requirements'    => [
                    'employee' => [
                        'High resolution scan copy of Passport (first page, validity minimum 6 months)',
                        'Embassy specification digital photograph (white background)',
                        'Personal Bank Statement (last 6 months) & Solvency Certificate',
                        'No Objection Certificate (NOC) from employer',
                        'Confirmed return air ticket copy & hotel booking voucher',
                    ],
                    'business' => [
                        'High resolution scan copy of Passport (first page, validity minimum 6 months)',
                        'Embassy specification digital photograph (white background)',
                        'Personal & Company Bank Statement (last 6 months) & Solvency',
                        'Updated Trade License copy with notarized English translation',
                        'Confirmed return air ticket copy & hotel booking voucher',
                    ],
                    'student' => [
                        'High resolution scan copy of Passport (first page, validity minimum 6 months)',
                        'Embassy specification digital photograph (white background)',
                        "Parent's Bank Statement (6 months) & Solvency Certificate",
                        'Student ID card copy & university NOC letter',
                        'Confirmed return air ticket copy & hotel booking voucher',
                    ],
                    'retired' => [
                        'High resolution scan copy of Passport (first page, validity minimum 6 months)',
                        'Embassy specification digital photograph (white background)',
                        'Bank Statement (6 months) & Solvency Certificate',
                        'Confirmed return air ticket copy & hotel booking voucher',
                    ],
                ],
            ],
        ];

        foreach ($visaRules as $ruleData) {
            $requirements = $ruleData['requirements'];
            unset($ruleData['requirements']);
            $rule = VisaRule::firstOrCreate(['country_code' => $ruleData['country_code']], $ruleData);
            if ($rule->wasRecentlyCreated) {
                foreach ($requirements as $occupation => $reqs) {
                    foreach ($reqs as $i => $req) {
                        VisaRequirement::create([
                            'visa_rule_id' => $rule->id,
                            'occupation'   => $occupation,
                            'requirement'  => $req,
                            'sort_order'   => $i,
                        ]);
                    }
                }
            }
        }

        // ── Services ─────────────────────────────────────────────────
        $services = [
            [
                'slug'     => 'tickets',
                'title'    => 'Aviation Logistics (Air Ticket)',
                'subtitle' => 'Securing optimal flight schedules and priority seat options.',
                'icon'     => '✈',
                'overview' => 'Through direct GDS connections and major airline contracts, we handle flight routing, seat layouts, and block booking allocations from Dhaka.',
                'benefits' => [
                    ['icon' => '✈', 'title' => 'GDS Integration', 'desc' => 'Direct search across SABRE, Amadeus, and Galileo for instant ticketing.'],
                    ['icon' => '🎫', 'title' => 'Block Seat Allocations', 'desc' => 'Block spaces secured on popular holiday sectors from Dhaka.'],
                    ['icon' => '🔄', 'title' => 'Flexible Date Pathways', 'desc' => 'Adjustment loops for changes in corporate schedules or family itineraries.'],
                ],
                'steps' => [
                    ['title' => 'Stage 1: Route Optimization', 'desc' => 'Analyze direct vs connecting flight schedules to match your timeline constraints.'],
                    ['title' => 'Stage 2: Pricing & Fare Match', 'desc' => 'Run checks across airline consolidator fares to extract competitive ticketing rates.'],
                    ['title' => 'Stage 3: Issuance & Seat Lock', 'desc' => 'Confirm pre-allocated seating, meal selections, and baggage allowance configurations.'],
                ],
                'faqs' => [
                    ['q' => 'Can I make changes to issued tickets?', 'a' => 'Yes, date change fees apply based on airline policies. Our 24/7 concierge will assist you immediately.'],
                    ['q' => 'Are baggage allowances included?', 'a' => 'Yes, standard allowances (usually 30kg or 40kg) are guaranteed with all priority booking allocations.'],
                ],
            ],
            [
                'slug'     => 'hotels',
                'title'    => 'Luxury Hotel Stays',
                'subtitle' => 'Vetted partner properties calibrated to safety, comfort, and budget targets.',
                'icon'     => '🏨',
                'overview' => 'We physically audit and select handpicked 4 and 5-star hotels that match strict corporate safety and family-friendly protocols.',
                'benefits' => [
                    ['icon' => '🏨', 'title' => 'Vetted Properties', 'desc' => 'Hotel reviews audited for cleanliness, neighborhood safety, and locations.'],
                    ['icon' => '🍳', 'title' => 'Gourmet Breakfast', 'desc' => 'Daily buffet breakfast pre-included in all booking tiers.'],
                    ['icon' => '🤝', 'title' => 'Direct Partner Rates', 'desc' => 'Contracted wholesale rates directly with properties to maximize savings.'],
                ],
                'steps' => [
                    ['title' => 'Stage 1: Parameter Intake', 'desc' => 'Understand room configurations, check-in timelines, and transit location access.'],
                    ['title' => 'Stage 2: Selection Showcase', 'desc' => 'Present three vetted hotel options matching client profile and budget parameters.'],
                    ['title' => 'Stage 3: Booking Lock', 'desc' => 'Confirm room upgrades, early check-in approvals, and pre-payment logs.'],
                ],
                'faqs' => [
                    ['q' => 'Is breakfast included in the booking?', 'a' => 'Yes, our packages guarantee daily buffet breakfast in all vetted 4 & 5-star hotels.'],
                    ['q' => 'Can I request early check-in?', 'a' => 'Early check-in is subject to room availability, but we pre-coordinate with hotel desks for priority access.'],
                ],
            ],
            [
                'slug'     => 'itinerary',
                'title'    => 'Custom Tour Itineraries',
                'subtitle' => 'Hour-by-hour scheduling logs planned by local destination experts.',
                'icon'     => '🗺',
                'overview' => 'Connect with nature, cities, and historic heritage sites at your own speed with custom timelines and local guide transits.',
                'benefits' => [
                    ['icon' => '🗺', 'title' => 'Tailored Timelines', 'desc' => 'Sightseeing tracks balanced with free slots for leisure.'],
                    ['icon' => '🧔', 'title' => 'Local Elite Guides', 'desc' => 'Vetted escorts detailing cultural insights and language aid.'],
                    ['icon' => '⚡', 'title' => 'Pre-Paid Entries', 'desc' => 'Attraction tickets pre-purchased to bypass long entrance lines.'],
                ],
                'steps' => [
                    ['title' => 'Stage 1: Interest Profiling', 'desc' => 'Align plans based on group preferences (shopping, nature, adventure, heritage).'],
                    ['title' => 'Stage 2: Draft Timeline Build', 'desc' => 'Layout sequential day structures and restaurant locations for approval.'],
                    ['title' => 'Stage 3: Pre-Paid Confirmation', 'desc' => 'Lock all logistics, coordinate guide handshakes, and issue vouchers.'],
                ],
                'faqs' => [
                    ['q' => 'Are sightseeing tickets pre-purchased?', 'a' => 'Yes, all attraction entries are pre-purchased and handdelivered to avoid long ticket lines.'],
                    ['q' => 'Can we skip items in the itinerary?', 'a' => 'Yes, the custom timeline is fully yours. You can adjust plans with your dedicated guide.'],
                ],
            ],
            [
                'slug'     => 'transport',
                'title'    => 'Local Elite Transit (Transport)',
                'subtitle' => 'Airport shuttle pickups and private tour transport fleets.',
                'icon'     => '🚐',
                'overview' => 'Ride in luxury. Our local transport packages feature clean air-conditioned SUV/microbus vehicles, vetted drivers, and real-time tracking.',
                'benefits' => [
                    ['icon' => '🚐', 'title' => 'Premium VIP Fleets', 'desc' => 'Air-conditioned vehicles matching private passenger sizes.'],
                    ['icon' => '👮', 'title' => 'Vetted Driver Escort', 'desc' => 'Safe, professional local drivers meeting clear guidelines.'],
                    ['icon' => '📍', 'title' => 'GPS Tracking', 'desc' => 'Coordinates monitored real-time for airport flight drops.'],
                ],
                'steps' => [
                    ['title' => 'Stage 1: Flight Verification', 'desc' => 'Match arrival/departure flight schedules to allocate transits.'],
                    ['title' => 'Stage 2: Fleet Allocation', 'desc' => 'Assign private sedan, SUV, or microbus based on baggage metrics.'],
                    ['title' => 'Stage 3: Terminal Handshake', 'desc' => 'Vetted guide or chauffeur greets travelers at the arrivals exit gate.'],
                ],
                'faqs' => [
                    ['q' => 'How do I locate the driver at the airport?', 'a' => 'Our driver will stand at the arrival gate holding a placard with your name.'],
                    ['q' => 'Are tolls and fuel included?', 'a' => 'Yes, all parking fees, tolls, fuel, and driver charges are completely included.'],
                ],
            ],
            [
                'slug'     => 'visa',
                'title'    => 'Visa Facilitation Desk',
                'subtitle' => 'Eliminate rejection worries with strict documentation checklists.',
                'icon'     => '🛂',
                'overview' => 'Expert checking pipelines, pre-filled visa application forms, and hand-delivered passport support for tourist and business visa submissions.',
                'benefits' => [
                    ['icon' => '🛂', 'title' => 'Paperwork Pre-Vetting', 'desc' => 'Rigorous checks on bank statements, trade licenses, and solvency codes.'],
                    ['icon' => '📈', 'title' => 'High Approval Rates', 'desc' => 'Document structuring that yields a verified 99.4% visa track record.'],
                    ['icon' => '🏢', 'title' => 'Embassy Support', 'desc' => 'Direct hand-delivery submission desk for eVisa and sticker channels.'],
                ],
                'steps' => [
                    ['title' => 'Stage 1: Documentation Review', 'desc' => 'Screen bank solvencies, trade certificates, and NOC letter parameters.'],
                    ['title' => 'Stage 2: Form Pre-Filling', 'desc' => 'Embassy forms drafted by visa desk specialists to avoid inputs mismatch.'],
                    ['title' => 'Stage 3: Submission & Handback', 'desc' => 'Process eVisa or file passport at visa application centers, tracking status.'],
                ],
                'faqs' => [
                    ['q' => 'How long does visa processing take?', 'a' => 'Processing times vary by country: Dubai 5-7 days, Thailand 7-10 days, Singapore 4-6 days, Malaysia 3-5 days.'],
                    ['q' => 'What if my visa gets rejected?', 'a' => 'We offer a re-application service and analyze rejection reasons to resubmit with corrected documents.'],
                ],
            ],
            [
                'slug'     => 'group',
                'title'    => 'Enterprise & Group Tours',
                'subtitle' => 'Specialized logistics for large groups and corporate retreats.',
                'icon'     => '👥',
                'overview' => 'Specialized logistics for large family vacations, corporate business retreats, and incentive travel, featuring dedicated local coordinators.',
                'benefits' => [
                    ['icon' => '👥', 'title' => 'Group Discounts', 'desc' => 'Preferential rates on flights, hotels, and activities for groups of 10+.'],
                    ['icon' => '🎯', 'title' => 'Dedicated Coordinator', 'desc' => 'A single point of contact managing all group logistics end-to-end.'],
                    ['icon' => '📋', 'title' => 'Custom Itineraries', 'desc' => 'Group-specific activity planning tailored to team-building or leisure goals.'],
                ],
                'steps' => [
                    ['title' => 'Stage 1: Group Profile Briefing', 'desc' => 'Understand group size, demographics, and travel preferences.'],
                    ['title' => 'Stage 2: Logistics Planning', 'desc' => 'Coordinate flights, hotels, and coaches for large group movement.'],
                    ['title' => 'Stage 3: On-Ground Support', 'desc' => 'Dedicated local coordinator present throughout the trip.'],
                ],
                'faqs' => [
                    ['q' => 'What is the minimum group size?', 'a' => 'We handle groups from 10 to 500+ travelers with tailored pricing.'],
                    ['q' => 'Can we get custom branded experiences?', 'a' => 'Yes, we offer branded welcome kits, custom signage, and personalized experiences for corporate groups.'],
                ],
            ],
        ];

        foreach ($services as $serviceData) {
            Service::firstOrCreate(['slug' => $serviceData['slug']], $serviceData);
        }

        // ── Testimonials ──────────────────────────────────────────────
        $testimonials = [
            [
                'name' => 'Rafsan Mahmud',
                'company_or_title' => 'Head of Operations, Apex Digital BD',
                'quote' => 'Our corporate retreat to Singapore was handled flawlessly. Airbridge managed logistics, VIP shuttles, and Gardens by the Bay arrangements with absolute precision. Highly recommended for corporate entities!',
                'stars' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Sabrina Nusrat',
                'company_or_title' => 'Dhaka, Bangladesh',
                'quote' => 'Planning my family vacation to Thailand was so simple with their visa guidance. Handpicked resorts in Phuket and Pattaya made our kids extremely happy. Will travel with Airbridge again next year!',
                'stars' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Tanvir Hasan',
                'company_or_title' => 'Entrepreneur',
                'quote' => 'Dubai safari, luxury shopping, and hotel transfers were absolutely error-free. The 24/7 flight concierge helped us adjust our returning seat layout in minutes. Incredible service!',
                'stars' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($testimonials as $t) {
            \App\Models\Testimonial::firstOrCreate(['name' => $t['name']], $t);
        }

        // ── Settings ──────────────────────────────────────────────────
        $settings = [
            'contact_phone'        => '+880 1711 223344',
            'contact_email'        => 'info@airbridgebd.com',
            'office_address'       => 'Suite 4B, Level 4, Navana Tower, Gulshan 1, Dhaka, Bangladesh',
            'office_hours'         => 'Sat - Thu (10:00 AM - 07:00 PM)',
            'facebook_url'         => 'https://facebook.com/airbridge',
            'linkedin_url'         => 'https://linkedin.com/company/airbridge',
            'instagram_url'        => 'https://instagram.com/airbridge',
            'milestone_horizons'   => '20+',
            'milestone_concierge'  => '24/7',
            'milestone_care'       => '100%',
            'notification_email'   => 'alerts@airbridgebd.com',
            'slack_webhook_url'    => '',
            'telegram_webhook_url' => '',
            'site_name'            => 'Airbridge',
            'site_tagline'         => 'Tours & Travel',
            'site_logo'            => '',
            'site_favicon'         => '',
            
            // About Page Parameters
            'about_badge'                 => 'Founded with Trust in Bangladesh',
            'about_heading'               => 'We Build The <span class="text-emerald-500">Bridge</span> to the World',
            'about_description'           => 'Airbridge Tours & Travel was established with a singular mission: to eliminate the headaches, hidden costs, and operational stresses associated with international holiday planning from Bangladesh. We believe that global exploration should be flawless, guided, and premium.',
            'about_stat_corporate_val'    => '1200+',
            'about_stat_corporate_label'  => 'Corporate Travelers',
            'about_stat_visa_val'         => '99.4%',
            'about_stat_visa_label'       => 'Visa Approval Rate',
            'about_stat_airlines_val'     => '12+',
            'about_stat_airlines_label'   => 'Airline Partners',
            'about_stat_market_val'       => '2027',
            'about_stat_market_label'     => 'Market Ready',
            'about_pillars_badge'         => 'Our Guiding Pillars',
            'about_pillars_heading'       => 'Operational Guidelines Calibrating Quality',
            'about_pillar1_title'         => 'Absolute Cost Transparency',
            'about_pillar1_desc'          => 'Zero hidden charges. Flights, taxes, luxury properties, transfers, and guided sightseeing are fully detailed and itemized upfront in BDT.',
            'about_pillar2_title'         => 'Budget Calibrated Stays',
            'about_pillar2_desc'          => 'We physically audit and select handpicked 4 and 5-star hotels that match strict corporate and premium family safety protocols.',
            'about_pillar3_title'         => 'Real-time Concierge Guard',
            'about_pillar3_desc'          => 'A live, dedicated hotline agent is assigned to every group routing, offering real-time help for flight delays, seat changes, or health concerns.',
            'about_retreat_badge'         => 'Enterprise & Family Retreats',
            'about_retreat_heading'       => 'High-Density Group Coordination',
            'about_retreat_desc'          => 'Corporate group travels and large family retreats require rigorous management. We oversee visas, private luxury coaches, customized banquet menus, conference setup, and regional group escorts.',
            'about_retreat_btn_text'      => 'Configure Group Retreat',
            'about_retreat_details_title' => 'Retreat Package Details',
            'about_retreat_col1_label'    => 'Corporate Booking',
            'about_retreat_col1_val'      => 'Priority Seats & Ticketing',
            'about_retreat_col2_label'    => 'Lodging Focus',
            'about_retreat_col2_val'      => 'Meeting & Banquet Arenas',
            'about_retreat_col3_label'    => 'Logistics',
            'about_retreat_col3_val'      => 'Dedicated VIP Bus Fleets',
            'about_retreat_footnote'      => '* Group bookings starting from 10+ travelers qualify for dedicated onsite coordinators and customized group pricing discounts.',
        ];

        foreach ($settings as $key => $val) {
            \App\Models\Setting::firstOrCreate(['key' => $key], ['value' => $val]);
        }
    }
}
