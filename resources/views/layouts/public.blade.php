<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Little Sprouts Nursery') - Nurturing Early Years Excellence</title>
    <meta name="description" content="@yield('meta_description', 'Award-winning early years education in Kensington, London. Transparent tuition fees and personalized visit tours for infant to preschool care.')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Fredoka:wght@500;600;700&display=swap" rel="stylesheet">

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .font-brand {
            font-family: 'Fredoka', 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-stone-50 text-slate-800 antialiased min-h-screen flex flex-col selection:bg-emerald-500 selection:text-white" x-data="{ mobileMenuOpen: false }">

    <!-- Top Announcement Bar -->
    <div class="bg-gradient-to-r from-emerald-800 via-emerald-700 to-teal-800 text-white text-xs md:text-sm py-2 px-4 text-center font-medium shadow-sm relative z-50">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <span class="mx-auto flex items-center gap-2">
                <span class="inline-block w-2 h-2 rounded-full bg-amber-400 animate-ping"></span>
                {{ \App\Models\PageContent::get('global', 'announcement', '🎉 Now Enrolling for Autumn & Spring Terms — Limited Places in Baby & Toddler Suites!') }}
            </span>
            <a href="tel:{{ str_replace(' ', '', \App\Models\PageContent::get('global', 'phone', '+442079460912')) }}" class="hidden lg:flex items-center gap-1 text-emerald-100 hover:text-white transition">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                {{ \App\Models\PageContent::get('global', 'phone', '+44 (0) 20 7946 0912') }}
            </a>
        </div>
    </div>

    <!-- Main Navigation Header -->
    <header class="bg-white/95 backdrop-blur-md sticky top-0 z-40 border-b border-stone-200 transition-all duration-200 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand / Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-emerald-600 to-teal-500 text-white flex items-center justify-center shadow-md shadow-emerald-500/20 group-hover:scale-105 transition duration-200">
                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2a9 9 0 0 1 9 9c0 4-3 7-7 8l-2 3-2-3c-4-1-7-4-7-8a9 9 0 0 1 9-9Z"/>
                            <path d="M12 7v5"/>
                            <path d="M10 9l2-2 2 2"/>
                        </svg>
                    </div>
                    <div>
                        <span class="font-brand text-2xl font-bold text-slate-900 tracking-tight block leading-tight">
                            Little Sprouts
                        </span>
                        <span class="text-xs font-semibold text-emerald-700 tracking-wider uppercase block">
                            Nursery & Preschool
                        </span>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex items-center gap-1 lg:gap-2">
                    <a href="{{ route('home') }}" class="px-3.5 py-2 rounded-xl text-sm font-semibold transition {{ request()->routeIs('home') ? 'text-emerald-700 bg-emerald-50' : 'text-slate-600 hover:text-emerald-700 hover:bg-stone-100' }}">
                        Home
                    </a>
                    <a href="{{ route('about') }}" class="px-3.5 py-2 rounded-xl text-sm font-semibold transition {{ request()->routeIs('about') ? 'text-emerald-700 bg-emerald-50' : 'text-slate-600 hover:text-emerald-700 hover:bg-stone-100' }}">
                        About Us
                    </a>
                    <a href="{{ route('rooms') }}" class="px-3.5 py-2 rounded-xl text-sm font-semibold transition {{ request()->routeIs('rooms') ? 'text-emerald-700 bg-emerald-50' : 'text-slate-600 hover:text-emerald-700 hover:bg-stone-100' }}">
                        Rooms & Facilities
                    </a>
                    <a href="{{ route('fees') }}" class="px-3.5 py-2 rounded-xl text-sm font-semibold transition {{ request()->routeIs('fees') ? 'text-emerald-700 bg-emerald-50' : 'text-slate-600 hover:text-emerald-700 hover:bg-stone-100' }}">
                        Fees & Calculator
                    </a>
                    <a href="{{ route('gallery') }}" class="px-3.5 py-2 rounded-xl text-sm font-semibold transition {{ request()->routeIs('gallery') ? 'text-emerald-700 bg-emerald-50' : 'text-slate-600 hover:text-emerald-700 hover:bg-stone-100' }}">
                        Gallery
                    </a>
                    <a href="{{ route('contact') }}" class="px-3.5 py-2 rounded-xl text-sm font-semibold transition {{ request()->routeIs('contact') ? 'text-emerald-700 bg-emerald-50' : 'text-slate-600 hover:text-emerald-700 hover:bg-stone-100' }}">
                        Contact
                    </a>
                </nav>

                <!-- Action Button -->
                <div class="hidden sm:flex items-center gap-3">
                    <a href="{{ route('bookings.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl font-bold text-sm bg-emerald-600 hover:bg-emerald-700 text-white shadow-md shadow-emerald-600/25 hover:shadow-lg hover:shadow-emerald-600/35 hover:-translate-y-0.5 transition duration-150">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        Book a Visit
                    </a>
                </div>

                <!-- Mobile Hamburger Button -->
                <div class="flex md:hidden">
                    <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" class="p-2.5 rounded-xl text-slate-600 hover:text-slate-900 hover:bg-stone-100 focus:outline-none" aria-label="Toggle Navigation">
                        <svg class="w-6 h-6" x-show="!mobileMenuOpen" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        <svg class="w-6 h-6" x-show="mobileMenuOpen" x-cloak fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div x-show="mobileMenuOpen" x-cloak class="md:hidden border-t border-stone-200 bg-white px-4 pt-3 pb-6 space-y-2 shadow-lg" @click.away="mobileMenuOpen = false">
            <a href="{{ route('home') }}" class="block px-4 py-2.5 rounded-xl text-base font-semibold {{ request()->routeIs('home') ? 'bg-emerald-50 text-emerald-700' : 'text-slate-700 hover:bg-stone-50' }}">
                Home
            </a>
            <a href="{{ route('about') }}" class="block px-4 py-2.5 rounded-xl text-base font-semibold {{ request()->routeIs('about') ? 'bg-emerald-50 text-emerald-700' : 'text-slate-700 hover:bg-stone-50' }}">
                About Us
            </a>
            <a href="{{ route('rooms') }}" class="block px-4 py-2.5 rounded-xl text-base font-semibold {{ request()->routeIs('rooms') ? 'bg-emerald-50 text-emerald-700' : 'text-slate-700 hover:bg-stone-50' }}">
                Rooms & Facilities
            </a>
            <a href="{{ route('fees') }}" class="block px-4 py-2.5 rounded-xl text-base font-semibold {{ request()->routeIs('fees') ? 'bg-emerald-50 text-emerald-700' : 'text-slate-700 hover:bg-stone-50' }}">
                Fees & Tuition Calculator
            </a>
            <a href="{{ route('gallery') }}" class="block px-4 py-2.5 rounded-xl text-base font-semibold {{ request()->routeIs('gallery') ? 'bg-emerald-50 text-emerald-700' : 'text-slate-700 hover:bg-stone-50' }}">
                Photo Gallery
            </a>
            <a href="{{ route('contact') }}" class="block px-4 py-2.5 rounded-xl text-base font-semibold {{ request()->routeIs('contact') ? 'bg-emerald-50 text-emerald-700' : 'text-slate-700 hover:bg-stone-50' }}">
                Contact Us
            </a>
            <div class="pt-2">
                <a href="{{ route('bookings.create') }}" class="block text-center w-full py-3 rounded-xl font-bold bg-emerald-600 text-white shadow-md">
                    Book a Visit Tour
                </a>
            </div>
        </div>
    </header>

    <!-- Flash Notifications -->
    @if(session('success'))
    <div class="max-w-4xl mx-auto px-4 mt-6 w-full" x-data="{ show: true }" x-show="show">
        <div class="bg-emerald-50 border-2 border-emerald-300 rounded-2xl p-4 sm:p-5 flex items-start gap-4 shadow-sm text-emerald-900">
            <div class="p-2 bg-emerald-100 rounded-xl text-emerald-700 shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            </div>
            <div class="flex-1 text-sm sm:text-base font-medium">
                {{ session('success') }}
            </div>
            <button @click="show = false" class="text-emerald-700 hover:text-emerald-950 p-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>
    @endif

    @if($errors->any())
    <div class="max-w-4xl mx-auto px-4 mt-6 w-full" x-data="{ show: true }" x-show="show">
        <div class="bg-rose-50 border-2 border-rose-300 rounded-2xl p-4 sm:p-5 flex items-start gap-4 shadow-sm text-rose-900">
            <div class="p-2 bg-rose-100 rounded-xl text-rose-700 shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            </div>
            <div class="flex-1 text-sm sm:text-base">
                <p class="font-bold mb-1">Please check the following errors:</p>
                <ul class="list-disc list-inside space-y-0.5 text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button @click="show = false" class="text-rose-700 hover:text-rose-950 p-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>
    @endif

    <!-- Main Content Area -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-300 mt-20 pt-16 pb-12 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 pb-12 border-b border-slate-800">
                <!-- Nursery Info -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-bold">
                            LS
                        </div>
                        <span class="font-brand text-2xl font-bold text-white tracking-tight">Little Sprouts</span>
                    </div>
                    <p class="text-sm text-slate-400 leading-relaxed">
                        Excellence in early childhood education. Providing secure, loving, and stimulus-rich environments where every child's potential can naturally bloom.
                    </p>
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-slate-800 text-xs text-emerald-400 font-semibold border border-slate-700">
                        <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                        Ofsted Outstanding Regulated
                    </div>
                </div>

                <!-- Navigation Links -->
                <div>
                    <h3 class="text-white font-bold text-base mb-4 tracking-wide uppercase text-xs">Explore Nursery</h3>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-emerald-400 transition">Home Overview</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-emerald-400 transition">About Our Ethos</a></li>
                        <li><a href="{{ route('rooms') }}" class="hover:text-emerald-400 transition">Rooms & Age Groups</a></li>
                        <li><a href="{{ route('fees') }}" class="hover:text-emerald-400 transition">Fees & Tuition Estimator</a></li>
                        <li><a href="{{ route('gallery') }}" class="hover:text-emerald-400 transition">Photo Gallery Tour</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-emerald-400 transition">Contact & Parking Guidance</a></li>
                        <li><a href="{{ route('privacy') }}" class="hover:text-emerald-400 transition">GDPR & Privacy Policy</a></li>
                    </ul>
                </div>

                <!-- Working Hours & Sessions -->
                <div>
                    <h3 class="text-white font-bold text-base mb-4 tracking-wide uppercase text-xs">Opening Hours</h3>
                    <ul class="space-y-3 text-sm">
                        <li class="flex justify-between items-center pb-2 border-b border-slate-800">
                            <span class="text-slate-400">Monday – Friday</span>
                            <span class="text-white font-medium">07:30 – 18:00</span>
                        </li>
                        <li class="flex justify-between items-center pb-2 border-b border-slate-800">
                            <span class="text-slate-400">Morning Session</span>
                            <span class="text-white font-medium">08:00 – 13:00</span>
                        </li>
                        <li class="flex justify-between items-center pb-2 border-b border-slate-800">
                            <span class="text-slate-400">Afternoon Session</span>
                            <span class="text-white font-medium">13:00 – 18:00</span>
                        </li>
                        <li class="flex justify-between items-center">
                            <span class="text-slate-400">Weekends & Bank Holidays</span>
                            <span class="text-rose-400 font-medium">Closed</span>
                        </li>
                    </ul>
                </div>

                <!-- Contact & Visit Booking -->
                <div class="space-y-4">
                    <h3 class="text-white font-bold text-base mb-4 tracking-wide uppercase text-xs">Admissions Desk</h3>
                    <p class="text-sm text-slate-400">
                        {{ \App\Models\PageContent::get('global', 'address', '14 Primrose Lane, Kensington, London, W8 7PT') }}
                    </p>
                    <p class="text-sm text-slate-300 font-semibold">
                        Tel: {{ \App\Models\PageContent::get('global', 'phone', '+44 (0) 20 7946 0912') }}
                    </p>
                    <p class="text-sm text-slate-400">
                        Email: {{ \App\Models\PageContent::get('global', 'email', 'admissions@littlesproutsnursery.test') }}
                    </p>
                    <div class="pt-2">
                        <a href="{{ route('bookings.create') }}" class="inline-block w-full py-2.5 px-4 text-center rounded-xl font-bold text-sm bg-emerald-600 hover:bg-emerald-500 text-white transition shadow">
                            Request Show-Around
                        </a>
                    </div>
                </div>
            </div>

            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500 gap-4">
                <p>&copy; {{ date('Y') }} Little Sprouts Nursery Limited. All rights reserved. Registered in England & Wales.</p>
                <div class="flex items-center gap-6">
                    <a href="{{ route('privacy') }}" class="hover:text-slate-400 transition">Privacy & Cookies</a>
                    <span class="text-slate-700">&bull;</span>
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="text-emerald-400 hover:text-emerald-300 font-medium transition flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Staff Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="hover:text-slate-400 transition flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            Staff Login
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </footer>

    <!-- EU GDPR Cookie Consent Banner (FR-07) -->
    <div x-data="{
        consent: localStorage.getItem('gdpr_cookie_consent'),
        acceptAll() {
            localStorage.setItem('gdpr_cookie_consent', 'accepted');
            this.consent = 'accepted';
        },
        acceptEssential() {
            localStorage.setItem('gdpr_cookie_consent', 'essential');
            this.consent = 'essential';
        }
    }"
    x-show="!consent"
    x-cloak
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-y-4"
    x-transition:enter-end="opacity-100 transform translate-y-0"
    class="fixed bottom-4 left-4 right-4 md:left-auto md:right-8 md:max-w-md z-50 bg-white/95 backdrop-blur-md rounded-2xl p-5 border border-stone-200 shadow-2xl text-slate-800">
        <div class="flex items-start gap-3">
            <div class="p-2 bg-emerald-100 text-emerald-700 rounded-xl shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
            </div>
            <div>
                <h4 class="font-bold text-sm text-slate-900">Your Privacy & GDPR Cookie Choices</h4>
                <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                    We use strictly essential cookies for secure browsing and session state. No invasive advertising trackers are stored without your explicit consent. Read our <a href="{{ route('privacy') }}" class="text-emerald-700 underline font-semibold">Privacy Policy</a>.
                </p>
                <div class="flex items-center gap-2 mt-4">
                    <button @click="acceptAll()" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold transition shadow-xs">
                        Accept All
                    </button>
                    <button @click="acceptEssential()" class="px-3.5 py-2 bg-stone-100 hover:bg-stone-200 text-slate-700 rounded-xl text-xs font-semibold transition">
                        Essential Only
                    </button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
