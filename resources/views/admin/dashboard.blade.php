@extends('layouts.admin')

@section('title', 'Admissions Dashboard Overview')

@section('content')
<div class="space-y-8">
    
    <!-- Top Welcome Banner -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white p-6 rounded-3xl border border-stone-200 shadow-xs">
        <div>
            <h1 class="font-brand text-2xl sm:text-3xl font-bold text-slate-900">
                Welcome back, {{ auth()->user()->name }}! 👋
            </h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">
                Admissions overview & tour scheduling pipeline for Little Sprouts Nursery.
            </p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.bookings.index', ['status' => 'pending']) }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl font-bold text-xs bg-amber-500 hover:bg-amber-600 text-slate-950 transition shadow-xs">
                <span>{{ $pendingBookings }} Pending Reviews</span>
            </a>
            <a href="{{ route('admin.bookings.index') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl font-bold text-xs bg-emerald-600 hover:bg-emerald-700 text-white transition shadow-xs">
                <span>All Bookings &rarr;</span>
            </a>
        </div>
    </div>

    <!-- 5 Metrics Cards Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-5 gap-4">
        <!-- Total -->
        <div class="bg-white p-5 rounded-3xl border border-stone-200 shadow-xs space-y-2">
            <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Inquiries</span>
            <div class="flex items-baseline justify-between">
                <span class="font-brand text-3xl font-bold text-slate-900">{{ $totalBookings }}</span>
                <span class="text-xs text-slate-500 font-medium">All Time</span>
            </div>
        </div>

        <!-- Pending -->
        <div class="bg-white p-5 rounded-3xl border border-amber-200 bg-amber-50/20 shadow-xs space-y-2">
            <span class="text-xs font-bold uppercase tracking-wider text-amber-700">Pending Review</span>
            <div class="flex items-baseline justify-between">
                <span class="font-brand text-3xl font-bold text-amber-600">{{ $pendingBookings }}</span>
                <span class="text-[11px] font-semibold text-amber-700">Needs Action</span>
            </div>
        </div>

        <!-- Confirmed -->
        <div class="bg-white p-5 rounded-3xl border border-emerald-200 bg-emerald-50/20 shadow-xs space-y-2">
            <span class="text-xs font-bold uppercase tracking-wider text-emerald-700">Confirmed Tours</span>
            <div class="flex items-baseline justify-between">
                <span class="font-brand text-3xl font-bold text-emerald-600">{{ $confirmedBookings }}</span>
                <span class="text-[11px] font-semibold text-emerald-700">Active</span>
            </div>
        </div>

        <!-- Completed -->
        <div class="bg-white p-5 rounded-3xl border border-stone-200 shadow-xs space-y-2">
            <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Tours Completed</span>
            <div class="flex items-baseline justify-between">
                <span class="font-brand text-3xl font-bold text-slate-700">{{ $completedBookings }}</span>
                <span class="text-[11px] font-semibold text-slate-400">Past Visits</span>
            </div>
        </div>

        <!-- Cancelled -->
        <div class="bg-white p-5 rounded-3xl border border-stone-200 shadow-xs space-y-2">
            <span class="text-xs font-bold uppercase tracking-wider text-rose-600">Cancelled</span>
            <div class="flex items-baseline justify-between">
                <span class="font-brand text-3xl font-bold text-rose-600">{{ $cancelledBookings }}</span>
                <span class="text-[11px] font-semibold text-rose-500">Inactive</span>
            </div>
        </div>
    </div>

    <!-- Upcoming Visits in the Next 7 Days (Section 3 Persona Pain Point) -->
    <div class="bg-white rounded-3xl border border-stone-200 shadow-xs overflow-hidden">
        <div class="p-6 border-b border-stone-100 flex items-center justify-between">
            <div>
                <h2 class="font-brand text-lg font-bold text-slate-900">
                    Confirmed Visits This Week (Next 7 Days)
                </h2>
                <p class="text-xs text-slate-500 mt-0.5">Staff-guided tours scheduled across upcoming operating hours.</p>
            </div>
            <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800">
                {{ $upcomingVisits->count() }} Upcoming
            </span>
        </div>

        @if($upcomingVisits->isNotEmpty())
        <div class="divide-y divide-stone-100">
            @foreach($upcomingVisits as $visit)
            <div class="p-4 sm:p-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 hover:bg-stone-50/80 transition">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-800 font-bold flex flex-col items-center justify-center shrink-0">
                        <span class="text-[10px] uppercase font-semibold leading-none">{{ $visit->preferred_date->format('M') }}</span>
                        <span class="text-base font-extrabold leading-none mt-1">{{ $visit->preferred_date->format('d') }}</span>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <h3 class="font-bold text-sm text-slate-900">{{ $visit->parent_name }}</h3>
                            <span class="text-xs text-slate-400">&bull;</span>
                            <span class="text-xs text-emerald-700 font-semibold">{{ $visit->preferred_time }}</span>
                        </div>
                        <p class="text-xs text-slate-500 mt-1">
                            Child: <span class="font-medium text-slate-700">{{ $visit->child_age_or_dob }}</span> &bull; Tel: <a href="tel:{{ $visit->phone }}" class="text-emerald-700 hover:underline">{{ $visit->phone }}</a>
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.bookings.show', $visit) }}" class="px-3.5 py-1.5 rounded-xl border border-stone-200 text-xs font-bold text-slate-700 hover:bg-stone-100 transition">
                        View Details & Notes &rarr;
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="p-8 text-center text-xs text-slate-500">
            No confirmed visits scheduled for the upcoming 7 days.
        </div>
        @endif
    </div>

    <!-- Recent Bookings Table -->
    <div class="bg-white rounded-3xl border border-stone-200 shadow-xs overflow-hidden">
        <div class="p-6 border-b border-stone-100 flex items-center justify-between">
            <div>
                <h2 class="font-brand text-lg font-bold text-slate-900">
                    Latest Visit Tour Inquiries
                </h2>
                <p class="text-xs text-slate-500 mt-0.5">Most recently submitted parent requests.</p>
            </div>
            <a href="{{ route('admin.bookings.index') }}" class="text-xs font-bold text-emerald-700 hover:underline">
                View Full Manager Table &rarr;
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs border-collapse">
                <thead>
                    <tr class="bg-stone-50 border-b border-stone-200 font-bold uppercase text-slate-500 tracking-wider">
                        <th class="py-3 px-6">Parent & Child</th>
                        <th class="py-3 px-6">Requested Slot</th>
                        <th class="py-3 px-6">Target Start</th>
                        <th class="py-3 px-6">Status</th>
                        <th class="py-3 px-6 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100 text-slate-700">
                    @forelse($recentBookings as $b)
                    <tr class="hover:bg-stone-50/50 transition">
                        <td class="py-4 px-6">
                            <span class="font-bold text-slate-900 block">{{ $b->parent_name }}</span>
                            <span class="text-slate-500 text-[11px]">{{ $b->child_age_or_dob }} &bull; {{ $b->email }}</span>
                        </td>
                        <td class="py-4 px-6">
                            <span class="font-medium text-slate-800 block">{{ $b->preferred_date->format('M d, Y') }}</span>
                            <span class="text-slate-500 text-[11px]">{{ $b->preferred_time }}</span>
                        </td>
                        <td class="py-4 px-6 text-slate-600">
                            {{ $b->intended_start_date ?? 'Not specified' }}
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold border {{ $b->status->badgeClasses() }}">
                                {{ $b->status->label() }}
                            </span>
                        </td>
                        <td class="py-4 px-6 text-right">
                            <a href="{{ route('admin.bookings.show', $b) }}" class="inline-flex items-center px-3 py-1.5 rounded-lg font-bold text-emerald-700 hover:bg-emerald-50 transition">
                                Manage &rarr;
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-8 text-center text-slate-500">
                            No booking requests found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
