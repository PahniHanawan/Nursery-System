@extends('layouts.public')

@section('title', 'Welcome to Little Sprouts Nursery - Kensington, London')
@section('meta_description', 'Award-winning nursery and preschool in Kensington. Providing loving, nature-rich, and stimulating early learning for children aged 3 months to 5 years.')

@section('content')
<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-b from-emerald-50/70 via-stone-50 to-stone-50 pt-12 pb-20 lg:pt-16 lg:pb-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            
            <!-- Hero Left Content -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100/80 border border-emerald-200 text-emerald-800 text-xs sm:text-sm font-bold tracking-wide">
                    <span class="w-2 h-2 rounded-full bg-emerald-600 animate-pulse"></span>
                    Kensington's Premier Early Years Community
                </div>

                <h1 class="font-brand text-4xl sm:text-5xl lg:text-6xl font-bold text-slate-900 tracking-tight leading-[1.12]">
                    Where <span class="text-emerald-700 underline decoration-amber-400 decoration-wavy decoration-2">Curiosity Blooms</span> & Little Minds Thrive
                </h1>

                <p class="text-base sm:text-lg text-slate-600 leading-relaxed max-w-2xl mx-auto lg:mx-0">
                    {{ \App\Models\PageContent::get('home', 'hero_subtitle', 'Award-winning early years education nurturing empathy, confidence, and creative exploration in a safe, nature-rich environment.') }}
                </p>

                <!-- Value Props Bullet Badges -->
                <div class="flex flex-wrap justify-center lg:justify-start gap-3 pt-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-white border border-stone-200 text-xs font-semibold text-slate-700 shadow-xs">
                        <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        1:3 Baby Room Ratio
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-white border border-stone-200 text-xs font-semibold text-slate-700 shadow-xs">
                        <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        Organic Chef-Prepared Meals
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-white border border-stone-200 text-xs font-semibold text-slate-700 shadow-xs">
                        <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        Forest School & Outdoor Garden
                    </span>
                </div>

                <!-- Call to Actions -->
                <div class="pt-4 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                    <a href="{{ route('bookings.create') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-7 py-4 rounded-2xl font-bold text-base bg-emerald-600 hover:bg-emerald-700 text-white shadow-xl shadow-emerald-600/30 hover:shadow-emerald-600/40 hover:-translate-y-0.5 transition duration-150">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        Book a Facility Visit
                    </a>
                    <a href="{{ route('fees') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-4 rounded-2xl font-bold text-base bg-white hover:bg-stone-100 text-slate-800 border border-stone-300 shadow-sm transition">
                        <svg class="w-5 h-5 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                        Calculate Tuition Fees
                    </a>
                </div>

                <div class="pt-4 flex items-center justify-center lg:justify-start gap-6 text-xs text-slate-500">
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        Rated 4.9/5 by 120+ Families
                    </span>
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        Biometric Security Access
                    </span>
                </div>
            </div>

            <!-- Hero Right Card / Image Showcase -->
            <div class="lg:col-span-5 relative">
                <div class="relative mx-auto max-w-md lg:max-w-none">
                    <div class="absolute -top-6 -left-6 w-72 h-72 bg-amber-200/50 rounded-full filter blur-3xl opacity-70"></div>
                    <div class="absolute -bottom-6 -right-6 w-72 h-72 bg-emerald-200/50 rounded-full filter blur-3xl opacity-70"></div>

                    <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white bg-white">
                        <img src="https://images.unsplash.com/photo-1587654780291-39c9404d746b?auto=format&fit=crop&w=1000&q=80" alt="Children engaged in creative early learning activities" class="w-full h-80 object-cover">
                        <div class="p-6 bg-white space-y-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="font-bold text-slate-900 text-lg">Next Guided Tour Window</h3>
                                    <p class="text-xs text-slate-500">Personalized 1-on-1 walkthroughs with Admissions</p>
                                </div>
                                <span class="px-3 py-1 bg-amber-100 text-amber-800 rounded-full text-xs font-bold">
                                    Few Slots Left
                                </span>
                            </div>
                            <div class="grid grid-cols-2 gap-2 text-xs">
                                <div class="p-2.5 rounded-xl bg-stone-50 border border-stone-200">
                                    <span class="block text-slate-500">Morning Session</span>
                                    <span class="font-bold text-slate-900">10:00 AM – 11:30 AM</span>
                                </div>
                                <div class="p-2.5 rounded-xl bg-stone-50 border border-stone-200">
                                    <span class="block text-slate-500">Afternoon Session</span>
                                    <span class="font-bold text-slate-900">02:00 PM – 03:30 PM</span>
                                </div>
                            </div>
                            <a href="{{ route('bookings.create') }}" class="block text-center w-full py-2.5 rounded-xl font-bold text-xs bg-slate-900 text-white hover:bg-emerald-700 transition">
                                Choose Date & Reserve &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Age Groups & Rooms Preview -->
<section class="py-20 bg-white border-y border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <span class="text-xs font-bold tracking-wider uppercase text-emerald-700 bg-emerald-50 px-3.5 py-1.5 rounded-full border border-emerald-200">
                Tailored Developmental Stages
            </span>
            <h2 class="font-brand text-3xl sm:text-4xl font-bold text-slate-900">
                Environments Crafted for Every Milestone
            </h2>
            <p class="text-slate-600 text-base">
                Each purpose-designed space delivers optimal staff-to-child ratios, age-appropriate sensory materials, and safe open-ended discovery.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Baby Room Card -->
            <div class="rounded-3xl border border-stone-200 bg-stone-50 overflow-hidden shadow-xs hover:shadow-lg transition duration-200 group flex flex-col">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&w=800&q=80" alt="Baby room calm sleep and sensory zone" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-4 left-4 px-3 py-1 bg-white/90 backdrop-blur-md rounded-full text-xs font-bold text-emerald-800 shadow-sm">
                        0 – 12 Months
                    </span>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                    <div>
                        <h3 class="font-bold text-xl text-slate-900">Baby Discovery Suite</h3>
                        <p class="text-sm text-slate-600 mt-2 leading-relaxed">
                            A serene, cocooned environment with individualized sleep schedules, soft sensory play, and a dedicated 1:3 practitioner ratio.
                        </p>
                    </div>
                    <ul class="text-xs space-y-1.5 text-slate-600 font-medium border-t border-stone-200 pt-3">
                        <li class="flex items-center gap-2">&bull; Individual sleep monitor pods</li>
                        <li class="flex items-center gap-2">&bull; Gentle sensory lights & soothing acoustics</li>
                        <li class="flex items-center gap-2">&bull; Dedicated milk preparation kitchen</li>
                    </ul>
                    <a href="{{ route('rooms') }}#babies" class="inline-flex items-center text-xs font-bold text-emerald-700 hover:text-emerald-800 pt-2">
                        Explore Baby Suite &rarr;
                    </a>
                </div>
            </div>

            <!-- Toddler Room Card -->
            <div class="rounded-3xl border border-stone-200 bg-stone-50 overflow-hidden shadow-xs hover:shadow-lg transition duration-200 group flex flex-col">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1516627145497-ae6968895b74?auto=format&fit=crop&w=800&q=80" alt="Toddler hands-on discovery materials" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-4 left-4 px-3 py-1 bg-white/90 backdrop-blur-md rounded-full text-xs font-bold text-emerald-800 shadow-sm">
                        1 – 2 Years
                    </span>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                    <div>
                        <h3 class="font-bold text-xl text-slate-900">Toddler Explorers</h3>
                        <p class="text-sm text-slate-600 mt-2 leading-relaxed">
                            Active zones supporting early motor skills, speech development, cooperative play, and tactile creativity in a 1:4 ratio.
                        </p>
                    </div>
                    <ul class="text-xs space-y-1.5 text-slate-600 font-medium border-t border-stone-200 pt-3">
                        <li class="flex items-center gap-2">&bull; Wooden climbing ramps & balance bridges</li>
                        <li class="flex items-center gap-2">&bull; Messy art & water sensory basins</li>
                        <li class="flex items-center gap-2">&bull; Potty training support suites</li>
                    </ul>
                    <a href="{{ route('rooms') }}#toddlers" class="inline-flex items-center text-xs font-bold text-emerald-700 hover:text-emerald-800 pt-2">
                        Explore Toddler Zone &rarr;
                    </a>
                </div>
            </div>

            <!-- Preschool Card -->
            <div class="rounded-3xl border border-stone-200 bg-stone-50 overflow-hidden shadow-xs hover:shadow-lg transition duration-200 group flex flex-col">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=800&q=80" alt="Preschool school readiness and STEM activities" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-4 left-4 px-3 py-1 bg-white/90 backdrop-blur-md rounded-full text-xs font-bold text-emerald-800 shadow-sm">
                        3 – 5 Years
                    </span>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                    <div>
                        <h3 class="font-bold text-xl text-slate-900">Pre-School Readiness</h3>
                        <p class="text-sm text-slate-600 mt-2 leading-relaxed">
                            School readiness programs focusing on phonics, early numeracy, emotional resilience, bilingual French club, and science curiosity.
                        </p>
                    </div>
                    <ul class="text-xs space-y-1.5 text-slate-600 font-medium border-t border-stone-200 pt-3">
                        <li class="flex items-center gap-2">&bull; Phonics & interactive storytelling circle</li>
                        <li class="flex items-center gap-2">&bull; STEM discovery station & gardening</li>
                        <li class="flex items-center gap-2">&bull; 15 & 30 Hours Gov Funding accepted</li>
                    </ul>
                    <a href="{{ route('rooms') }}#preschool" class="inline-flex items-center text-xs font-bold text-emerald-700 hover:text-emerald-800 pt-2">
                        Explore Pre-School &rarr;
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-12 text-center">
            <a href="{{ route('rooms') }}" class="inline-flex items-center gap-2 font-bold text-emerald-700 hover:text-emerald-800 text-sm">
                View all facilities and our enclosed Nature Garden &rarr;
            </a>
        </div>
    </div>
</section>

<!-- Values & Why Choose Us -->
<section class="py-20 bg-stone-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-5 space-y-6">
                <span class="text-xs font-bold tracking-wider uppercase text-emerald-700 bg-emerald-100/60 px-3 py-1 rounded-full border border-emerald-200">
                    Our Core Pillars
                </span>
                <h2 class="font-brand text-3xl sm:text-4xl font-bold text-slate-900 leading-tight">
                    Nurturing Heart, Mind, and Health in Kensington
                </h2>
                <p class="text-slate-600 text-base leading-relaxed">
                    {{ \App\Models\PageContent::get('home', 'ethos_summary', 'We combine Reggio Emilia inspired discovery with the EYFS curriculum to build a resilient foundation for lifelong learning.') }}
                </p>
                <div class="space-y-4 pt-2">
                    <div class="flex items-start gap-4">
                        <div class="p-3 bg-emerald-100 text-emerald-700 rounded-2xl shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-base">Child-Led Play & Structured EYFS</h4>
                            <p class="text-xs sm:text-sm text-slate-600 mt-1">Children explore interests through guided experiments, music, drama, and language immersion.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="p-3 bg-amber-100 text-amber-700 rounded-2xl shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-base">Transparent, Predictable Tuition</h4>
                            <p class="text-xs sm:text-sm text-slate-600 mt-1">No hidden application fees or surprise add-ons. All wholesome hot meals, nappies, and enrichment classes included.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="p-3 bg-teal-100 text-teal-700 rounded-2xl shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-base">Uncompromising Safety Standards</h4>
                            <p class="text-xs sm:text-sm text-slate-600 mt-1">100% of core staff are Paediatric First Aid qualified with continuous enhanced DBS clearances.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-7">
                <div class="grid grid-cols-2 gap-4">
                    <img src="https://images.unsplash.com/photo-1502086223501-7ea6ecd79368?auto=format&fit=crop&w=800&q=80" alt="Outdoor natural sensory play" class="rounded-3xl object-cover h-64 w-full shadow-md">
                    <img src="https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?auto=format&fit=crop&w=800&q=80" alt="Storytelling library nook" class="rounded-3xl object-cover h-64 w-full shadow-md mt-6">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Callout Banner to Visit Booking -->
<section class="py-16 bg-gradient-to-r from-emerald-800 to-teal-900 text-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-6">
        <h2 class="font-brand text-3xl sm:text-4xl font-bold tracking-tight">
            Ready to See Little Sprouts in Person?
        </h2>
        <p class="text-emerald-100 max-w-2xl mx-auto text-base sm:text-lg">
            We invite prospective parents for relaxed, guided walkthroughs to experience our warm community, meet the teachers, and ask any questions.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-2">
            <a href="{{ route('bookings.create') }}" class="w-full sm:w-auto px-8 py-4 rounded-2xl font-bold bg-amber-400 hover:bg-amber-300 text-slate-900 shadow-xl transition">
                Request a Tour Date Now
            </a>
            <a href="{{ route('fees') }}" class="w-full sm:w-auto px-6 py-4 rounded-2xl font-bold bg-white/10 hover:bg-white/20 text-white border border-white/20 transition">
                Explore Fee Schedules
            </a>
        </div>
    </div>
</section>
@endsection
