@extends('layouts.admin')

@section('title', 'Manage Tuition Fee Schedules')

@section('content')
<div class="space-y-8 max-w-5xl">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="font-brand text-2xl sm:text-3xl font-bold text-slate-900">
                Tuition Fee Schedules & Calculator Rates
            </h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">
                Edit standard daily rates. Any adjustments made here immediately update the parent interactive calculator on the Fees page.
            </p>
        </div>
    </div>

    <!-- Fee Tiers Table -->
    <div class="bg-white rounded-3xl border border-stone-200 shadow-xs overflow-hidden">
        <div class="p-6 border-b border-stone-100">
            <h2 class="font-brand text-lg font-bold text-slate-900">Active Rate Tiers</h2>
            <p class="text-xs text-slate-500 mt-0.5">Rates are billed per child per day in GBP (£).</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs border-collapse">
                <thead>
                    <tr class="bg-stone-50 border-b border-stone-200 font-bold uppercase text-slate-500 tracking-wider">
                        <th class="py-3.5 px-6">Age Bracket</th>
                        <th class="py-3.5 px-6">Session Window</th>
                        <th class="py-3.5 px-6">Daily Rate (£)</th>
                        <th class="py-3.5 px-6 text-right">Quick Update</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100 text-slate-700">
                    @forelse($feeTiers as $tier)
                    <tr class="hover:bg-stone-50/60 transition">
                        <td class="py-4 px-6 font-bold text-slate-900">
                            {{ $tier->age_group_name }}
                        </td>

                        <td class="py-4 px-6 font-medium text-slate-800">
                            {{ $tier->session_type }}
                        </td>

                        <td class="py-4 px-6">
                            <span class="font-brand text-base font-bold text-emerald-800">
                                £{{ number_format($tier->rate_per_day, 2) }}
                            </span>
                        </td>

                        <td class="py-4 px-6 text-right">
                            <form method="POST" action="{{ route('admin.fees.update', $tier) }}" class="inline-flex items-center gap-2">
                                @csrf
                                @method('PUT')
                                <div class="relative w-28">
                                    <span class="absolute left-2.5 top-2 text-slate-400 font-bold">£</span>
                                    <input type="number" step="0.50" min="0" name="rate_per_day" value="{{ $tier->rate_per_day }}" required
                                        class="w-full pl-6 pr-2 py-1.5 rounded-xl border border-stone-300 text-xs font-bold focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500">
                                </div>
                                <button type="submit" class="px-3 py-1.5 bg-slate-900 hover:bg-slate-800 text-white rounded-xl font-bold text-xs transition">
                                    Update
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-8 text-center text-slate-500">
                            No fee tiers configured.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add New Tier Card -->
    <div class="bg-white rounded-3xl p-6 sm:p-7 border border-stone-200 shadow-xs space-y-4">
        <h3 class="font-brand text-lg font-bold text-slate-900">Add New Fee Tier</h3>
        <p class="text-xs text-slate-500">Add custom session types or supplemental fee programs.</p>

        <form method="POST" action="{{ route('admin.fees.store') }}" class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
            @csrf
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Age Bracket</label>
                <input type="text" name="age_group_name" required placeholder="e.g. Under 2s (0 - 24 months)"
                    class="w-full px-3.5 py-2.5 rounded-xl border border-stone-300 text-xs focus:ring-2 focus:ring-emerald-500/20">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Session Type</label>
                <input type="text" name="session_type" required placeholder="e.g. Extended Full Day (07:30 - 18:30)"
                    class="w-full px-3.5 py-2.5 rounded-xl border border-stone-300 text-xs focus:ring-2 focus:ring-emerald-500/20">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Rate per Day (£)</label>
                <div class="flex items-center gap-2">
                    <input type="number" step="0.50" min="0" name="rate_per_day" required placeholder="75.00"
                        class="w-full px-3.5 py-2.5 rounded-xl border border-stone-300 text-xs font-bold focus:ring-2 focus:ring-emerald-500/20">
                    <button type="submit" class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl font-bold text-xs shrink-0 transition">
                        Add Tier
                    </button>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection
