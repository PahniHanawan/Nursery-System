@extends('layouts.public')

@section('title', 'Rooms & Learning Facilities - Little Sprouts Nursery')
@section('meta_description', 'Explore our nursery rooms in Kensington: Baby Discovery Suite, Toddler Explorers, Pre-School Readiness, and our secure enclosed Nature Garden.')

@section('content')
<!-- Header Banner -->
<section class="bg-gradient-to-b from-emerald-50/80 to-stone-50 py-16 border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <span class="text-xs font-bold tracking-wider uppercase text-emerald-800 bg-emerald-100/70 px-3.5 py-1.5 rounded-full border border-emerald-200">
            Our Learning Spaces
        </span>
        <h1 class="font-brand text-4xl sm:text-5xl font-bold text-slate-900">
            Rooms & Specialized Facilities
        </h1>
        <p class="text-slate-600 text-base sm:text-lg max-w-2xl mx-auto">
            Light-filled, purposefully zoned architectural spaces designed to stimulate imagination, foster independence, and ensure comfort.
        </p>
    </div>
</section>

<!-- Section 1: Baby Room -->
<section id="babies" class="py-20 bg-white border-b border-stone-200 scroll-mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-6 space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-amber-100 text-amber-900 rounded-full text-xs font-bold">
                    Age Group: 3 Months – 12 Months
                </div>
                <h2 class="font-brand text-3xl sm:text-4xl font-bold text-slate-900">
                    Baby Discovery Suite
                </h2>
                <p class="text-slate-600 text-base leading-relaxed">
                    Our calm, shoe-free baby sanctuary is tailored to mimic the warmth of home. With soft carpets, natural wood textures, and low-level sensory mirrors, infants are encouraged to roll, crawl, and explore at their own pace under continuous, loving supervision.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div class="p-4 rounded-2xl bg-stone-50 border border-stone-200">
                        <span class="font-bold text-slate-900 block text-sm">1:3 Statutory Ratio</span>
                        <p class="text-xs text-slate-600 mt-1">High attention and bonded key-person care for every infant.</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-stone-50 border border-stone-200">
                        <span class="font-bold text-slate-900 block text-sm">Darkened Sleep Pods</span>
                        <p class="text-xs text-slate-600 mt-1">Temperature-controlled quiet sleep room with white-noise acoustics.</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-stone-50 border border-stone-200">
                        <span class="font-bold text-slate-900 block text-sm">Sterilization Kitchen</span>
                        <p class="text-xs text-slate-600 mt-1">Dedicated milk and pureed meal prep area with strict sanitary controls.</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-stone-50 border border-stone-200">
                        <span class="font-bold text-slate-900 block text-sm">Tummy-Time Mats</span>
                        <p class="text-xs text-slate-600 mt-1">Non-toxic organic cotton surfaces with grasping toys.</p>
                    </div>
                </div>

                <div class="pt-2">
                    <a href="{{ route('bookings.create') }}" class="inline-flex items-center gap-2 font-bold text-emerald-700 hover:text-emerald-800 text-sm">
                        Schedule a Baby Room Tour &rarr;
                    </a>
                </div>
            </div>

            <div class="lg:col-span-6">
                <img src="https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&w=1000&q=80" alt="Baby room serene environment" class="rounded-3xl shadow-xl w-full h-[420px] object-cover">
            </div>
        </div>
    </div>
</section>

<!-- Section 2: Toddler Room -->
<section id="toddlers" class="py-20 bg-stone-50 border-b border-stone-200 scroll-mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-6 order-2 lg:order-1">
                <img src="https://images.unsplash.com/photo-1516627145497-ae6968895b74?auto=format&fit=crop&w=1000&q=80" alt="Toddler exploratory room with wooden blocks" class="rounded-3xl shadow-xl w-full h-[420px] object-cover">
            </div>

            <div class="lg:col-span-6 order-1 lg:order-2 space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-emerald-100 text-emerald-900 rounded-full text-xs font-bold">
                    Age Group: 1 Year – 2 Years
                </div>
                <h2 class="font-brand text-3xl sm:text-4xl font-bold text-slate-900">
                    Toddler Explorers Zone
                </h2>
                <p class="text-slate-600 text-base leading-relaxed">
                    Toddlerhood is a whirlwind of language discovery, sensory exploration, and newfound independence. Our Toddler room offers open shelving, sensory sand and water tables, messy painting easels, and sturdy climbing modules to foster gross and fine motor coordination.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div class="p-4 rounded-2xl bg-white border border-stone-200 shadow-xs">
                        <span class="font-bold text-slate-900 block text-sm">1:4 Practitioner Ratio</span>
                        <p class="text-xs text-slate-600 mt-1">Guiding active toddlers safely through cooperative social play.</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-white border border-stone-200 shadow-xs">
                        <span class="font-bold text-slate-900 block text-sm">Messy Art & Sensory</span>
                        <p class="text-xs text-slate-600 mt-1">Daily non-toxic finger painting, clay sculpting, and water play.</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-white border border-stone-200 shadow-xs">
                        <span class="font-bold text-slate-900 block text-sm">Early Communication</span>
                        <p class="text-xs text-slate-600 mt-1">Sing-along circles, Makaton sign integration, and rich storybooks.</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-white border border-stone-200 shadow-xs">
                        <span class="font-bold text-slate-900 block text-sm">Gentle Toilet Training</span>
                        <p class="text-xs text-slate-600 mt-1">Child-sized facilities designed for stress-free transition milestones.</p>
                    </div>
                </div>

                <div class="pt-2">
                    <a href="{{ route('bookings.create') }}" class="inline-flex items-center gap-2 font-bold text-emerald-700 hover:text-emerald-800 text-sm">
                        Schedule a Toddler Room Tour &rarr;
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 3: Preschool Room -->
<section id="preschool" class="py-20 bg-white border-b border-stone-200 scroll-mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-6 space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-teal-100 text-teal-900 rounded-full text-xs font-bold">
                    Age Group: 3 Years – 5 Years
                </div>
                <h2 class="font-brand text-3xl sm:text-4xl font-bold text-slate-900">
                    Pre-School Readiness Studio
                </h2>
                <p class="text-slate-600 text-base leading-relaxed">
                    Designed to bridge the step into formal reception schooling with confidence, resilience, and curiosity. Children engage with systematic phonics (Read Write Inc. fundamentals), early mathematical reasoning, scientific curiosity experiments, and self-regulation skills.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div class="p-4 rounded-2xl bg-stone-50 border border-stone-200">
                        <span class="font-bold text-slate-900 block text-sm">1:8 Early Years Ratio</span>
                        <p class="text-xs text-slate-600 mt-1">Led by qualified teachers preparing children for top primary schools.</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-stone-50 border border-stone-200">
                        <span class="font-bold text-slate-900 block text-sm">STEM & Phonics Labs</span>
                        <p class="text-xs text-slate-600 mt-1">Interactive early numeracy, balance scales, and phonics games.</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-stone-50 border border-stone-200">
                        <span class="font-bold text-slate-900 block text-sm">Bilingual Club</span>
                        <p class="text-xs text-slate-600 mt-1">Weekly French songs, numbers, and cultural discovery.</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-stone-50 border border-stone-200">
                        <span class="font-bold text-slate-900 block text-sm">Self-Reliance Skills</span>
                        <p class="text-xs text-slate-600 mt-1">Coat fastening, shoes, handwashing, and communal dining etiquette.</p>
                    </div>
                </div>

                <div class="pt-2">
                    <a href="{{ route('bookings.create') }}" class="inline-flex items-center gap-2 font-bold text-emerald-700 hover:text-emerald-800 text-sm">
                        Schedule a Pre-School Tour &rarr;
                    </a>
                </div>
            </div>

            <div class="lg:col-span-6">
                <img src="https://images.unsplash.com/photo-1587654780291-39c9404d746b?auto=format&fit=crop&w=1000&q=80" alt="Preschool interactive readiness classroom" class="rounded-3xl shadow-xl w-full h-[420px] object-cover">
            </div>
        </div>
    </div>
</section>

<!-- Section 4: Outdoor Garden & Forest School -->
<section id="outdoor" class="py-20 bg-stone-50 scroll-mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <span class="text-xs font-bold uppercase tracking-wider text-emerald-700">All-Weather Outdoor Play</span>
            <h2 class="font-brand text-3xl sm:text-4xl font-bold text-slate-900">
                Enclosed Nature Garden & Forest Explorations
            </h2>
            <p class="text-slate-600 text-base">
                Fresh air is central to our daily routine. Rain or shine, our children put on outdoor all-in-one waterproof suits and wellies to connect directly with the living natural world.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-3xl overflow-hidden border border-stone-200 shadow-xs flex flex-col">
                <img src="https://images.unsplash.com/photo-1502086223501-7ea6ecd79368?auto=format&fit=crop&w=800&q=80" alt="Mud kitchen and vegetable gardening patch" class="h-48 w-full object-cover">
                <div class="p-6 flex-1 space-y-2">
                    <h3 class="font-bold text-lg text-slate-900">Kitchen Garden & Herbs</h3>
                    <p class="text-sm text-slate-600">
                        Children plant seeds, water tomatoes and strawberries, and learn where fresh food comes from with our gardening club.
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-3xl overflow-hidden border border-stone-200 shadow-xs flex flex-col">
                <img src="https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?auto=format&fit=crop&w=800&q=80" alt="Sensory mud kitchen and sandpit" class="h-48 w-full object-cover">
                <div class="p-6 flex-1 space-y-2">
                    <h3 class="font-bold text-lg text-slate-900">Mud Kitchen & Sensory Pit</h3>
                    <p class="text-sm text-slate-600">
                        Wooden cooking utensils, pinecones, water pumps, and safe gravel textures encourage open-ended imaginative play.
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-3xl overflow-hidden border border-stone-200 shadow-xs flex flex-col">
                <img src="https://images.unsplash.com/photo-1516627145497-ae6968895b74?auto=format&fit=crop&w=800&q=80" alt="Safe shock-absorbent soft turf play area" class="h-48 w-full object-cover">
                <div class="p-6 flex-1 space-y-2">
                    <h3 class="font-bold text-lg text-slate-900">All-Weather Soft Turf</h3>
                    <p class="text-sm text-slate-600">
                        Shock-absorbing hygienic outdoor grass enables running, balance bicycles, obstacle courses, and parachute games year-round.
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-14 text-center">
            <a href="{{ route('bookings.create') }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-2xl font-bold bg-emerald-600 hover:bg-emerald-700 text-white shadow-xl shadow-emerald-600/25 transition">
                Book a Visit to Walk the Grounds &rarr;
            </a>
        </div>
    </div>
</section>
@endsection
