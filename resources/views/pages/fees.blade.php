@extends('layouts.public')

@section('title', 'Fees & Interactive Tuition Calculator - Little Sprouts Nursery')
@section('meta_description', 'Calculate your weekly and monthly nursery tuition fees in real-time. Transparent pricing, no hidden costs, hot meals and nappies included.')

@section('content')
<!-- Header Banner -->
<section class="bg-gradient-to-b from-emerald-50/80 to-stone-50 py-16 border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <span class="text-xs font-bold tracking-wider uppercase text-emerald-800 bg-emerald-100/70 px-3.5 py-1.5 rounded-full border border-emerald-200">
            Transparent Pricing
        </span>
        <h1 class="font-brand text-4xl sm:text-5xl font-bold text-slate-900">
            Fees & Interactive Tuition Estimator
        </h1>
        <p class="text-slate-600 text-base sm:text-lg max-w-2xl mx-auto">
            Clear, all-inclusive pricing with no hidden charges. Calculate your estimated weekly and monthly tuition based on your family's exact schedule.
        </p>
    </div>
</section>

<!-- Calculator Section (FR-02) -->
<section class="py-16 bg-white border-b border-stone-200"
    x-data="{
        ageGroup: 'under_2',
        sessionType: 'full_day',
        daysPerWeek: 3,

        // Fee rates lookup (sourced from nursery database seed)
        rates: {
            under_2: {
                full_day: 78.00,
                morning: 48.00,
                afternoon: 45.00
            },
            over_2: {
                full_day: 68.00,
                morning: 42.00,
                afternoon: 39.00
            }
        },

        get dailyRate() {
            return this.rates[this.ageGroup][this.sessionType] || 0;
        },

        get weeklyTotal() {
            return this.dailyRate * this.daysPerWeek;
        },

        get monthlyTotal() {
            // PRD Formula: (Weekly Total * 52) / 12
            return (this.weeklyTotal * 52) / 12;
        },

        formatCurrency(num) {
            return '£' + num.toFixed(2);
        }
    }">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-gradient-to-br from-stone-50 to-emerald-50/30 rounded-3xl border-2 border-emerald-200/80 shadow-xl overflow-hidden p-6 sm:p-10">
            <div class="text-center max-w-2xl mx-auto mb-10 space-y-2">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    Real-Time Fee Calculator
                </span>
                <h2 class="font-brand text-2xl sm:text-3xl font-bold text-slate-900">
                    Estimate Your Childcare Investment
                </h2>
                <p class="text-xs sm:text-sm text-slate-600">
                    Select your child's age bracket, session type, and the number of days per week to view immediate totals.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                <!-- Inputs Left Column -->
                <div class="lg:col-span-7 space-y-6">
                    
                    <!-- 1. Age Bracket Selection -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            1. Select Child Age Bracket
                        </label>
                        <div class="grid grid-cols-2 gap-3">
                            <button type="button"
                                @click="ageGroup = 'under_2'"
                                :class="ageGroup === 'under_2' ? 'border-emerald-600 bg-white ring-2 ring-emerald-500/20 text-emerald-900 shadow-sm' : 'border-stone-200 bg-stone-100/70 text-slate-600 hover:bg-white'"
                                class="p-3.5 rounded-2xl border text-left transition duration-150">
                                <span class="font-bold text-sm block">Under 2 Years</span>
                                <span class="text-xs text-slate-500 mt-0.5 block">0 to 24 Months (1:3 Ratio)</span>
                            </button>

                            <button type="button"
                                @click="ageGroup = 'over_2'"
                                :class="ageGroup === 'over_2' ? 'border-emerald-600 bg-white ring-2 ring-emerald-500/20 text-emerald-900 shadow-sm' : 'border-stone-200 bg-stone-100/70 text-slate-600 hover:bg-white'"
                                class="p-3.5 rounded-2xl border text-left transition duration-150">
                                <span class="font-bold text-sm block">Over 2 Years</span>
                                <span class="text-xs text-slate-500 mt-0.5 block">2 to 5 Years (Toddler & Preschool)</span>
                            </button>
                        </div>
                    </div>

                    <!-- 2. Session Type Selection -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            2. Select Daily Session Window
                        </label>
                        <div class="space-y-2">
                            <label class="flex items-center justify-between p-3.5 rounded-2xl border cursor-pointer transition duration-150"
                                :class="sessionType === 'full_day' ? 'border-emerald-600 bg-white ring-2 ring-emerald-500/20 text-emerald-900 shadow-sm' : 'border-stone-200 bg-stone-100/70 text-slate-600 hover:bg-white'">
                                <div class="flex items-center gap-3">
                                    <input type="radio" name="session_type" value="full_day" x-model="sessionType" class="text-emerald-600 focus:ring-emerald-500">
                                    <div>
                                        <span class="font-bold text-sm block">Full Day</span>
                                        <span class="text-xs text-slate-500">08:00 AM – 18:00 PM (10 Hours, Breakfast, Lunch & Tea included)</span>
                                    </div>
                                </div>
                                <span class="text-xs font-bold text-emerald-700" x-text="formatCurrency(rates[ageGroup].full_day) + ' / day'"></span>
                            </label>

                            <label class="flex items-center justify-between p-3.5 rounded-2xl border cursor-pointer transition duration-150"
                                :class="sessionType === 'morning' ? 'border-emerald-600 bg-white ring-2 ring-emerald-500/20 text-emerald-900 shadow-sm' : 'border-stone-200 bg-stone-100/70 text-slate-600 hover:bg-white'">
                                <div class="flex items-center gap-3">
                                    <input type="radio" name="session_type" value="morning" x-model="sessionType" class="text-emerald-600 focus:ring-emerald-500">
                                    <div>
                                        <span class="font-bold text-sm block">Morning Session</span>
                                        <span class="text-xs text-slate-500">08:00 AM – 13:00 PM (5 Hours, Breakfast & Hot Organic Lunch included)</span>
                                    </div>
                                </div>
                                <span class="text-xs font-bold text-emerald-700" x-text="formatCurrency(rates[ageGroup].morning) + ' / day'"></span>
                            </label>

                            <label class="flex items-center justify-between p-3.5 rounded-2xl border cursor-pointer transition duration-150"
                                :class="sessionType === 'afternoon' ? 'border-emerald-600 bg-white ring-2 ring-emerald-500/20 text-emerald-900 shadow-sm' : 'border-stone-200 bg-stone-100/70 text-slate-600 hover:bg-white'">
                                <div class="flex items-center gap-3">
                                    <input type="radio" name="session_type" value="afternoon" x-model="sessionType" class="text-emerald-600 focus:ring-emerald-500">
                                    <div>
                                        <span class="font-bold text-sm block">Afternoon Session</span>
                                        <span class="text-xs text-slate-500">13:00 PM – 18:00 PM (5 Hours, Afternoon Snack & Light Tea included)</span>
                                    </div>
                                </div>
                                <span class="text-xs font-bold text-emerald-700" x-text="formatCurrency(rates[ageGroup].afternoon) + ' / day'"></span>
                            </label>
                        </div>
                    </div>

                    <!-- 3. Number of Days per Week -->
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label class="text-xs font-bold uppercase tracking-wider text-slate-700">
                                3. Attendance Days per Week
                            </label>
                            <span class="text-xs font-extrabold text-emerald-800 bg-emerald-100 px-2.5 py-0.5 rounded-full" x-text="daysPerWeek + (daysPerWeek === 1 ? ' Day' : ' Days') + ' / week'"></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <template x-for="d in [1, 2, 3, 4, 5]" :key="d">
                                <button type="button"
                                    @click="daysPerWeek = d"
                                    :class="daysPerWeek === d ? 'bg-emerald-600 text-white font-bold shadow-md shadow-emerald-600/30' : 'bg-white text-slate-700 border border-stone-200 hover:bg-stone-100'"
                                    class="flex-1 py-3 rounded-xl text-sm font-semibold transition"
                                    x-text="d">
                                </button>
                            </template>
                        </div>
                    </div>

                </div>

                <!-- Calculated Output Card Right Column -->
                <div class="lg:col-span-5 bg-white rounded-3xl p-6 sm:p-7 border border-stone-200 shadow-lg space-y-6">
                    <div class="pb-4 border-b border-stone-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block mb-1">Estimated Tuition Summary</span>
                        <h3 class="font-brand text-xl font-bold text-slate-900">Calculated Estimate</h3>
                    </div>

                    <div class="space-y-4">
                        <!-- Daily Rate Breakdown -->
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-slate-500">Base Daily Rate:</span>
                            <span class="font-bold text-slate-800" x-text="formatCurrency(dailyRate)"></span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-slate-500">Schedule:</span>
                            <span class="font-bold text-slate-800" x-text="daysPerWeek + ' days per week'"></span>
                        </div>

                        <!-- Weekly Total -->
                        <div class="p-4 rounded-2xl bg-stone-50 border border-stone-200/80 flex justify-between items-center">
                            <div>
                                <span class="text-xs font-bold text-slate-500 uppercase block">Estimated Weekly</span>
                                <span class="text-xs text-slate-400">Paid on schedule</span>
                            </div>
                            <span class="font-brand text-2xl font-bold text-slate-900" x-text="formatCurrency(weeklyTotal)"></span>
                        </div>

                        <!-- Monthly Total (Formula: (weekly * 52) / 12) -->
                        <div class="p-5 rounded-2xl bg-gradient-to-tr from-emerald-700 to-teal-800 text-white shadow-md flex justify-between items-center">
                            <div>
                                <span class="text-xs font-bold text-emerald-200 uppercase tracking-wider block">Estimated Monthly</span>
                                <span class="text-[11px] text-emerald-100/80 block mt-0.5">(Weekly × 52) ÷ 12 mos</span>
                            </div>
                            <span class="font-brand text-3xl font-extrabold text-white" x-text="formatCurrency(monthlyTotal)"></span>
                        </div>
                    </div>

                    <!-- Dynamic Disclaimer (FR-02) -->
                    <div class="p-3.5 bg-amber-50 rounded-2xl border border-amber-200 text-xs text-amber-900 leading-relaxed">
                        <p class="font-medium">
                            <strong>Notice:</strong> This calculation is an estimate for guidance only. Extra meals, nappies, or government funding subsidies will be finalized upon registration.
                        </p>
                    </div>

                    <!-- Direct Book a Visit button -->
                    <div>
                        <a :href="'{{ route('bookings.create') }}?age=' + ageGroup + '&session=' + sessionType + '&days=' + daysPerWeek"
                           class="block w-full py-4 text-center rounded-2xl font-bold text-sm bg-emerald-600 hover:bg-emerald-700 text-white shadow-lg shadow-emerald-600/30 hover:-translate-y-0.5 transition duration-150">
                            Book a Visit with this Estimate &rarr;
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- Published Pricing Schedule Table -->
<section class="py-16 bg-stone-50">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12 space-y-2">
            <h2 class="font-brand text-3xl font-bold text-slate-900">
                Official Standard Fee Schedules
            </h2>
            <p class="text-sm text-slate-600">
                All daily rates include morning snack, hot chef-prepared lunch, afternoon tea, nappies, wipes, and specialized curriculum resources.
            </p>
        </div>

        <div class="bg-white rounded-3xl border border-stone-200 shadow-sm overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-stone-100/70 border-b border-stone-200 text-xs uppercase font-bold text-slate-600 tracking-wider">
                        <th class="py-4 px-6">Age Group</th>
                        <th class="py-4 px-6">Session Type</th>
                        <th class="py-4 px-6">Hours</th>
                        <th class="py-4 px-6 text-right">Rate / Day</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-200 text-sm">
                    @forelse($feeTiers as $tier)
                    <tr class="hover:bg-stone-50/80 transition">
                        <td class="py-4 px-6 font-semibold text-slate-900">
                            {{ $tier->age_group_name }}
                        </td>
                        <td class="py-4 px-6 text-slate-700">
                            {{ $tier->session_type }}
                        </td>
                        <td class="py-4 px-6 text-xs text-slate-500 font-mono">
                            @if(str_contains($tier->session_type, 'Full Day'))
                                08:00 – 18:00
                            @elseif(str_contains($tier->session_type, 'Morning'))
                                08:00 – 13:00
                            @else
                                13:00 – 18:00
                            @endif
                        </td>
                        <td class="py-4 px-6 text-right font-bold text-emerald-800 text-base">
                            £{{ number_format($tier->rate_per_day, 2) }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-6 text-center text-slate-500 text-sm">
                            Fee schedules are being updated. Please contact admissions.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Government Subsidies Info -->
        <div class="mt-12 bg-white rounded-3xl p-8 border border-stone-200 shadow-xs grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div class="space-y-3">
                <span class="text-xs font-bold uppercase tracking-wider text-emerald-700">Government Support</span>
                <h3 class="font-brand text-2xl font-bold text-slate-900">15 & 30 Hours Funded Childcare</h3>
                <p class="text-sm text-slate-600 leading-relaxed">
                    Little Sprouts Nursery gladly accepts UK government funded hours for eligible working parents of 9-month-olds, 2-year-olds, and 3-to-4-year-olds. We also accept all Tax-Free Childcare accounts and corporate childcare vouchers.
                </p>
            </div>
            <div class="bg-emerald-50 rounded-2xl p-6 border border-emerald-100 space-y-3">
                <h4 class="font-bold text-sm text-emerald-950">How to apply funding to your fees:</h4>
                <p class="text-xs text-emerald-800 leading-relaxed">
                    Obtain your 11-digit eligibility code via <span class="font-mono">childcarechoices.gov.uk</span> and provide it during your visit tour or enrollment registration. Our bursar will adjust your monthly invoice accordingly.
                </p>
                <a href="{{ route('contact') }}" class="inline-block text-xs font-bold text-emerald-700 hover:text-emerald-900">
                    Questions on funding eligibility? Speak to Admissions &rarr;
                </a>
            </div>
        </div>

    </div>
</section>
@endsection
