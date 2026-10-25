@extends('layouts.public')

@section('title', 'About Our Ethos & Educators - Little Sprouts Nursery')
@section('meta_description', 'Learn about Little Sprouts Nursery educational ethos, our certified early years educators, stringent safety protocols, and Ofsted standards.')

@section('content')
<!-- Header Banner -->
<section class="bg-gradient-to-b from-emerald-50/80 to-stone-50 py-16 border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <span class="text-xs font-bold tracking-wider uppercase text-emerald-800 bg-emerald-100/70 px-3.5 py-1.5 rounded-full border border-emerald-200">
            About Little Sprouts
        </span>
        <h1 class="font-brand text-4xl sm:text-5xl font-bold text-slate-900">
            Nurturing Confident, Happy Learners
        </h1>
        <p class="text-slate-600 text-base sm:text-lg max-w-2xl mx-auto">
            Founded with a passion for compassionate, child-centered early education, we provide an inspiring foundation for children from their earliest months to primary school transition.
        </p>
    </div>
</section>

<!-- Our Ethos -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <span class="text-xs font-bold uppercase tracking-wider text-emerald-700">Educational Philosophy</span>
                <h2 class="font-brand text-3xl font-bold text-slate-900 leading-snug">
                    A Blend of Natural Discovery & Structured Early Learning Goals
                </h2>
                <p class="text-slate-600 text-base leading-relaxed">
                    {{ \App\Models\PageContent::get('about', 'ethos_full', 'At Little Sprouts Nursery, we believe that the early childhood years are a unique, golden window for social development, curiosity, and emotional grounding. Our dedicated team of certified educators fosters a child-led atmosphere where every milestone is celebrated.') }}
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                    <div class="p-4 rounded-2xl bg-stone-50 border border-stone-200">
                        <h4 class="font-bold text-slate-900 text-sm">Reggio Emilia Influence</h4>
                        <p class="text-xs text-slate-600 mt-1">Viewing the physical environment as the 'third teacher' that inspires natural curiosity.</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-stone-50 border border-stone-200">
                        <h4 class="font-bold text-slate-900 text-sm">EYFS Framework</h4>
                        <p class="text-xs text-slate-600 mt-1">Rigorous adherence to the 7 key areas of Early Years Foundation Stage development.</p>
                    </div>
                </div>
            </div>
            <div>
                <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1000&q=80" alt="Children engaged in discovery classroom" class="rounded-3xl shadow-xl w-full object-cover h-96">
            </div>
        </div>
    </div>
</section>

<!-- Safety Standards & Certifications -->
<section class="py-20 bg-stone-50 border-y border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <span class="text-xs font-bold uppercase tracking-wider text-emerald-700">Safety & Security</span>
            <h2 class="font-brand text-3xl sm:text-4xl font-bold text-slate-900">
                Peace of Mind Every Single Day
            </h2>
            <p class="text-slate-600 text-base">
                {{ \App\Models\PageContent::get('about', 'safety_standards', 'Our campus features biometric security gates, certified pediatric first-aid trained practitioners on duty throughout all hours, CCTV coverage across common areas, and hygienic organic dining options.') }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-3xl border border-stone-200 shadow-xs space-y-4">
                <div class="w-12 h-12 bg-emerald-100 text-emerald-700 rounded-2xl flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="font-bold text-lg text-slate-900">Strict Practitioner Ratios</h3>
                <p class="text-sm text-slate-600 leading-relaxed">
                    We strictly maintain or exceed UK statutory staff-to-child ratios: 1:3 for babies under 2, 1:4 for toddlers aged 2, and 1:8 for preschool children.
                </p>
            </div>

            <div class="bg-white p-8 rounded-3xl border border-stone-200 shadow-xs space-y-4">
                <div class="w-12 h-12 bg-amber-100 text-amber-700 rounded-2xl flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                </div>
                <h3 class="font-bold text-lg text-slate-900">Access Control & Safeguarding</h3>
                <p class="text-sm text-slate-600 leading-relaxed">
                    Biometric access gates, CCTV coverage over external perimeters and lobbies, and rigorous visitor verification for all show-arounds.
                </p>
            </div>

            <div class="bg-white p-8 rounded-3xl border border-stone-200 shadow-xs space-y-4">
                <div class="w-12 h-12 bg-teal-100 text-teal-700 rounded-2xl flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                </div>
                <h3 class="font-bold text-lg text-slate-900">5-Star Food Hygiene & Nutrition</h3>
                <p class="text-sm text-slate-600 leading-relaxed">
                    On-site chef preparing fresh organic lunches, seasonal fruit snacks, and catering for all allergen/dietary requirements with 5-star Food Hygiene rating.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Leadership & Educators Team -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <span class="text-xs font-bold uppercase tracking-wider text-emerald-700">Our Dedicated Team</span>
            <h2 class="font-brand text-3xl sm:text-4xl font-bold text-slate-900">
                Meet Our Passionate Educators
            </h2>
            <p class="text-slate-600 text-base">
                All lead educators hold BA (Hons) in Early Childhood or minimum NVQ Level 3 qualifications, supported by ongoing continuous professional development.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Sarah Jenkins -->
            <div class="text-center space-y-4 p-6 rounded-3xl bg-stone-50 border border-stone-200">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80" alt="Sarah Jenkins, Nursery Manager" class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-white shadow-md">
                <div>
                    <h3 class="font-bold text-lg text-slate-900">Sarah Jenkins</h3>
                    <p class="text-xs font-bold text-emerald-700">Nursery Manager & Admissions Head</p>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                        Over 16 years leading high-standard nurseries across London. Holds Early Years Teacher Status (EYTS) and is dedicated to warm parent partnerships.
                    </p>
                </div>
            </div>

            <!-- Claire Davies -->
            <div class="text-center space-y-4 p-6 rounded-3xl bg-stone-50 border border-stone-200">
                <img src="https://images.unsplash.com/photo-1580894732444-8ecded7900cd?auto=format&fit=crop&w=600&q=80" alt="Claire Davies, Deputy Manager" class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-white shadow-md">
                <div>
                    <h3 class="font-bold text-lg text-slate-900">Claire Davies</h3>
                    <p class="text-xs font-bold text-emerald-700">Deputy Manager & SENCo Lead</p>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                        Specialized in speech development and inclusive education. Level 4 Early Years Practitioner and certified Forest School instructor.
                    </p>
                </div>
            </div>

            <!-- Thomas Moreau -->
            <div class="text-center space-y-4 p-6 rounded-3xl bg-stone-50 border border-stone-200">
                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80" alt="Emma Laurent, Pre-School Leader" class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-white shadow-md">
                <div>
                    <h3 class="font-bold text-lg text-slate-900">Emma Laurent</h3>
                    <p class="text-xs font-bold text-emerald-700">Pre-School Lead & Bilingual Educator</p>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                        Oversees the primary school readiness curriculum, early phonics mastery, and leads our weekly conversational French exploration classes.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Visit Callout -->
<section class="py-12 bg-emerald-50 border-t border-emerald-100 text-center">
    <div class="max-w-4xl mx-auto px-4">
        <h3 class="font-brand text-2xl font-bold text-slate-900 mb-2">Experience the Little Sprouts Difference</h3>
        <p class="text-sm text-slate-600 mb-6">Come walk through our classrooms and meet Sarah Jenkins and our teaching team in person.</p>
        <a href="{{ route('bookings.create') }}" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl font-bold text-sm bg-emerald-600 hover:bg-emerald-700 text-white shadow-md transition">
            Book an Admissions Walkthrough &rarr;
        </a>
    </div>
</section>
@endsection
