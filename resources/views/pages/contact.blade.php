@extends('layouts.public')

@section('title', 'Contact Us & Location Guidance - Little Sprouts Nursery')
@section('meta_description', 'Contact Little Sprouts Nursery Kensington. View our location map, visitor parking guidance, telephone, and admissions desk opening hours.')

@section('content')
<!-- Header Banner -->
<section class="bg-gradient-to-b from-emerald-50/80 to-stone-50 py-16 border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <span class="text-xs font-bold tracking-wider uppercase text-emerald-800 bg-emerald-100/70 px-3.5 py-1.5 rounded-full border border-emerald-200">
            Get in Touch
        </span>
        <h1 class="font-brand text-4xl sm:text-5xl font-bold text-slate-900">
            Contact & Location Guidance
        </h1>
        <p class="text-slate-600 text-base sm:text-lg max-w-2xl mx-auto">
            We are nestled on a peaceful, tree-lined lane in Kensington with convenient transport links and dedicated short-stay drop-off bays.
        </p>
    </div>
</section>

<!-- Contact Details & Map Grid -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Contact Info Left Column -->
            <div class="lg:col-span-5 space-y-8">
                <div>
                    <h2 class="font-brand text-2xl sm:text-3xl font-bold text-slate-900">
                        Admissions Office
                    </h2>
                    <p class="text-sm text-slate-600 mt-2">
                        Sarah Jenkins and our admissions coordinators are on hand to answer questions regarding vacancies, term schedules, or funding.
                    </p>
                </div>

                <div class="space-y-4">
                    <!-- Address Card -->
                    <div class="p-5 rounded-2xl bg-stone-50 border border-stone-200 flex items-start gap-4">
                        <div class="p-3 bg-emerald-100 text-emerald-700 rounded-xl shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-sm text-slate-900">Campus Address</h3>
                            <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                                {{ \App\Models\PageContent::get('global', 'address', '14 Primrose Lane, Kensington, London, W8 7PT') }}
                            </p>
                        </div>
                    </div>

                    <!-- Phone Card -->
                    <div class="p-5 rounded-2xl bg-stone-50 border border-stone-200 flex items-start gap-4">
                        <div class="p-3 bg-emerald-100 text-emerald-700 rounded-xl shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-sm text-slate-900">Direct Telephone</h3>
                            <p class="text-xs text-slate-600 mt-1">
                                <a href="tel:{{ str_replace(' ', '', \App\Models\PageContent::get('global', 'phone', '+442079460912')) }}" class="text-emerald-700 font-semibold hover:underline">
                                    {{ \App\Models\PageContent::get('global', 'phone', '+44 (0) 20 7946 0912') }}
                                </a>
                            </p>
                            <span class="text-[11px] text-slate-500 block mt-0.5">Lines open weekdays 08:00 – 17:30</span>
                        </div>
                    </div>

                    <!-- Email Card -->
                    <div class="p-5 rounded-2xl bg-stone-50 border border-stone-200 flex items-start gap-4">
                        <div class="p-3 bg-emerald-100 text-emerald-700 rounded-xl shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-sm text-slate-900">Admissions Email</h3>
                            <p class="text-xs text-slate-600 mt-1">
                                <a href="mailto:{{ \App\Models\PageContent::get('global', 'email', 'admissions@littlesproutsnursery.test') }}" class="text-emerald-700 font-semibold hover:underline">
                                    {{ \App\Models\PageContent::get('global', 'email', 'admissions@littlesproutsnursery.test') }}
                                </a>
                            </p>
                        </div>
                    </div>

                    <!-- Parking Guidance Card -->
                    <div class="p-5 rounded-2xl bg-amber-50/70 border border-amber-200 flex items-start gap-4">
                        <div class="p-3 bg-amber-100 text-amber-800 rounded-xl shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-sm text-amber-950">Visitor & Drop-Off Parking Guidance</h3>
                            <p class="text-xs text-amber-900 mt-1 leading-relaxed">
                                {{ \App\Models\PageContent::get('contact', 'parking_guidance', 'Complimentary 15-minute visitor parking bays are located directly opposite the reception gate. Stroller and pram storage is provided in the heated entrance lobby.') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="pt-2">
                    <a href="{{ route('bookings.create') }}" class="inline-flex items-center justify-center gap-2 w-full py-4 rounded-2xl font-bold bg-emerald-600 hover:bg-emerald-700 text-white shadow-lg transition">
                        Schedule an Admissions Tour &rarr;
                    </a>
                </div>
            </div>

            <!-- Google Maps Embed Right Column -->
            <div class="lg:col-span-7 space-y-6">
                <div class="rounded-3xl overflow-hidden shadow-xl border border-stone-200 bg-stone-100 h-[480px] relative">
                    <iframe
                        title="Little Sprouts Nursery Kensington Location Map"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9934.331422731983!2d-0.19897184988771802!3d51.502288048604724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48760544f8f41151%3A0x6a1c5d9595562d97!2sKensington%2C%20London%2C%20UK!5e0!3m2!1sen!2suk!4v1700000000000!5m2!1sen!2suk"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <div class="bg-stone-50 rounded-2xl p-4 border border-stone-200 text-xs text-slate-600 flex items-center justify-between">
                    <span>Nearest Tube Stations: High Street Kensington (District & Circle Lines, 6 min walk) &bull; Notting Hill Gate (10 min walk)</span>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
