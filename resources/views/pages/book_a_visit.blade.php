@extends('layouts.public')

@section('title', 'Book a Visit Tour (Show-Around) - Little Sprouts Nursery')
@section('meta_description', 'Schedule a personalized tour of Little Sprouts Nursery Kensington. Walk through our classrooms, meet teachers, and discover our early learning community.')

@section('content')
<!-- Header Banner -->
<section class="bg-gradient-to-b from-emerald-50/80 to-stone-50 py-12 border-b border-stone-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="text-xs font-bold tracking-wider uppercase text-emerald-800 bg-emerald-100/70 px-3.5 py-1.5 rounded-full border border-emerald-200">
            Admissions & Show-Arounds
        </span>
        <h1 class="font-brand text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900">
            Book a Personalized Visit Tour
        </h1>
        <p class="text-slate-600 text-sm sm:text-base max-w-2xl mx-auto">
            Experience our classrooms in action. Tours are hosted on weekdays to maintain tranquil learning environments while giving your family dedicated time with our team.
        </p>
    </div>
</section>

<!-- Form Container -->
<section class="py-14 bg-stone-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white rounded-3xl p-6 sm:p-10 border border-stone-200 shadow-xl space-y-8">
            
            <div class="border-b border-stone-100 pb-5">
                <h2 class="font-brand text-2xl font-bold text-slate-900">Parent & Visit Information</h2>
                <p class="text-xs sm:text-sm text-slate-500 mt-1">
                    Please provide your contact details and preferred date. Our admissions office will verify availability and confirm within 24–48 hours.
                </p>
            </div>

            <form action="{{ route('bookings.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Honeypot Antispam Field (Must stay empty) -->
                <div class="hidden" style="display:none !important;" aria-hidden="true">
                    <label for="website_url">Leave this field blank</label>
                    <input type="text" name="website_url" id="website_url" tabindex="-1" autocomplete="off">
                </div>

                <!-- 1. Parent Name & Email -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="parent_name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Parent / Guardian Full Name <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" name="parent_name" id="parent_name" required
                            value="{{ old('parent_name') }}"
                            placeholder="e.g. Elena Rostova"
                            class="w-full px-4 py-3 rounded-2xl border @error('parent_name') border-rose-400 bg-rose-50/30 @else border-stone-300 bg-stone-50/50 @enderror focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 text-sm transition">
                        @error('parent_name')
                            <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Email Address <span class="text-rose-500">*</span>
                        </label>
                        <input type="email" name="email" id="email" required
                            value="{{ old('email') }}"
                            placeholder="elena.rostova@example.com"
                            class="w-full px-4 py-3 rounded-2xl border @error('email') border-rose-400 bg-rose-50/30 @else border-stone-300 bg-stone-50/50 @enderror focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 text-sm transition">
                        @error('email')
                            <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- 2. Phone & Child DOB/Age -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="phone" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Contact Telephone Number <span class="text-rose-500">*</span>
                        </label>
                        <input type="tel" name="phone" id="phone" required
                            value="{{ old('phone') }}"
                            placeholder="+44 7700 900123"
                            class="w-full px-4 py-3 rounded-2xl border @error('phone') border-rose-400 bg-rose-50/30 @else border-stone-300 bg-stone-50/50 @enderror focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 text-sm transition">
                        @error('phone')
                            <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="child_age_or_dob" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Child Age or Date of Birth <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" name="child_age_or_dob" id="child_age_or_dob" required
                            value="{{ old('child_age_or_dob') }}"
                            placeholder="e.g. 14 months or 12/05/2024"
                            class="w-full px-4 py-3 rounded-2xl border @error('child_age_or_dob') border-rose-400 bg-rose-50/30 @else border-stone-300 bg-stone-50/50 @enderror focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 text-sm transition">
                        @error('child_age_or_dob')
                            <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- 3. Preferred Date & Time Window -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="preferred_date" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Preferred Visit Date <span class="text-rose-500">*</span>
                        </label>
                        <input type="date" name="preferred_date" id="preferred_date" required
                            min="{{ date('Y-m-d') }}"
                            value="{{ old('preferred_date', date('Y-m-d', strtotime('+1 day'))) }}"
                            class="w-full px-4 py-3 rounded-2xl border @error('preferred_date') border-rose-400 bg-rose-50/30 @else border-stone-300 bg-stone-50/50 @enderror focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 text-sm transition">
                        <span class="text-[11px] text-slate-500 mt-1 block">Tours hosted Monday to Friday.</span>
                        @error('preferred_date')
                            <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="preferred_time" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Preferred Time Window <span class="text-rose-500">*</span>
                        </label>
                        <select name="preferred_time" id="preferred_time" required
                            class="w-full px-4 py-3 rounded-2xl border @error('preferred_time') border-rose-400 bg-rose-50/30 @else border-stone-300 bg-stone-50/50 @enderror focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 text-sm transition">
                            <option value="">-- Choose a window --</option>
                            <option value="Morning (10:00 AM)" {{ old('preferred_time') === 'Morning (10:00 AM)' ? 'selected' : '' }}>Morning (10:00 AM)</option>
                            <option value="Afternoon (02:00 PM)" {{ old('preferred_time') === 'Afternoon (02:00 PM)' ? 'selected' : '' }}>Afternoon (02:00 PM)</option>
                            <option value="Late Afternoon (04:00 PM)" {{ old('preferred_time') === 'Late Afternoon (04:00 PM)' ? 'selected' : '' }}>Late Afternoon (04:00 PM)</option>
                        </select>
                        @error('preferred_time')
                            <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- 4. Estimated Start Term / Month -->
                <div>
                    <label for="intended_start_date" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Estimated Start Term / Month (Optional)
                    </label>
                    <select name="intended_start_date" id="intended_start_date"
                        class="w-full px-4 py-3 rounded-2xl border border-stone-300 bg-stone-50/50 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 text-sm transition">
                        <option value="">-- Select approximate intake timeframe --</option>
                        <option value="Immediate Vacancy" {{ old('intended_start_date') === 'Immediate Vacancy' ? 'selected' : '' }}>Immediate Vacancy (Within 2 Weeks)</option>
                        <option value="Within 1 Month" {{ old('intended_start_date') === 'Within 1 Month' ? 'selected' : '' }}>Within 1 Month</option>
                        <option value="Within 3 Months" {{ old('intended_start_date') === 'Within 3 Months' ? 'selected' : '' }}>Within 3 Months</option>
                        <option value="Autumn Term (September)" {{ old('intended_start_date') === 'Autumn Term (September)' ? 'selected' : '' }}>Autumn Term (September)</option>
                        <option value="Spring Term (January)" {{ old('intended_start_date') === 'Spring Term (January)' ? 'selected' : '' }}>Spring Term (January)</option>
                        <option value="Summer Term (April)" {{ old('intended_start_date') === 'Summer Term (April)' ? 'selected' : '' }}>Summer Term (April)</option>
                    </select>
                </div>

                <!-- 5. Additional Inquiries / Notes -->
                <div>
                    <label for="notes" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Additional Inquiries / Estimated Sessions
                    </label>
                    <textarea name="notes" id="notes" rows="3"
                        placeholder="e.g. Interested in 3 full days for our toddler. Would also like information on the 15 hours funding scheme."
                        class="w-full px-4 py-3 rounded-2xl border border-stone-300 bg-stone-50/50 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 text-sm transition">{{ old('notes', request('session') ? 'Interested in: ' . request('session') . ', ' . request('days', 3) . ' days/week (Estimated from Tuition Calculator)' : '') }}</textarea>
                </div>

                <!-- 6. GDPR Consent Checkbox (FR-03 & FR-07) -->
                <div class="p-4 rounded-2xl bg-stone-100/70 border border-stone-200">
                    <label class="flex items-start gap-3 cursor-pointer">
                        <input type="checkbox" name="gdpr_consent" value="1" required
                            {{ old('gdpr_consent') ? 'checked' : '' }}
                            class="mt-1 w-4 h-4 text-emerald-600 rounded border-stone-300 focus:ring-emerald-500">
                        <span class="text-xs text-slate-700 leading-relaxed">
                            <span class="font-bold text-slate-900">GDPR Compliance Consent:</span>
                            I consent to having this website store my submitted information so they can respond to my enquiry in accordance with the EU General Data Protection Regulation (GDPR). Your data is never sold or shared with third-party advertisers. See our <a href="{{ route('privacy') }}" target="_blank" class="text-emerald-700 underline font-semibold">Privacy Policy</a>.
                        </span>
                    </label>
                    @error('gdpr_consent')
                        <p class="text-xs text-rose-600 mt-2 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit"
                        class="w-full py-4 rounded-2xl font-bold text-base bg-emerald-600 hover:bg-emerald-700 text-white shadow-xl shadow-emerald-600/30 hover:-translate-y-0.5 transition duration-150 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Submit Visit Request
                    </button>
                    <p class="text-center text-xs text-slate-500 mt-3">
                        No financial commitment required. Visits are complimentary and obligation-free.
                    </p>
                </div>

            </form>

        </div>

    </div>
</section>
@endsection
