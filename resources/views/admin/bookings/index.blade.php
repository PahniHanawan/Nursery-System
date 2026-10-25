@extends('layouts.admin')

@section('title', 'Manage Visit Bookings')

@section('content')
<div class="space-y-6">

    <!-- Header & Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="font-brand text-2xl sm:text-3xl font-bold text-slate-900">
                Visit Tour Bookings
            </h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">
                Manage prospective parent requests, update status, and log internal admissions notes.
            </p>
        </div>
        <div class="flex items-center gap-2">
            <span class="text-xs text-slate-500 font-medium">Total: {{ $counts['all'] }} Records</span>
        </div>
    </div>

    <!-- Filters & Search Toolbar -->
    <div class="bg-white p-4 sm:p-5 rounded-3xl border border-stone-200 shadow-xs flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        
        <!-- Status Tabs Filter -->
        <div class="flex flex-wrap items-center gap-1.5 text-xs font-bold">
            <a href="{{ route('admin.bookings.index') }}"
                class="px-3.5 py-2 rounded-xl transition {{ !$statusFilter ? 'bg-slate-900 text-white' : 'bg-stone-100 text-slate-600 hover:bg-stone-200' }}">
                All ({{ $counts['all'] }})
            </a>
            <a href="{{ route('admin.bookings.index', ['status' => 'pending', 'search' => $search]) }}"
                class="px-3.5 py-2 rounded-xl transition {{ $statusFilter === 'pending' ? 'bg-amber-500 text-slate-950 shadow-xs' : 'bg-amber-50 text-amber-800 hover:bg-amber-100' }}">
                Pending ({{ $counts['pending'] }})
            </a>
            <a href="{{ route('admin.bookings.index', ['status' => 'confirmed', 'search' => $search]) }}"
                class="px-3.5 py-2 rounded-xl transition {{ $statusFilter === 'confirmed' ? 'bg-emerald-600 text-white shadow-xs' : 'bg-emerald-50 text-emerald-800 hover:bg-emerald-100' }}">
                Confirmed ({{ $counts['confirmed'] }})
            </a>
            <a href="{{ route('admin.bookings.index', ['status' => 'completed', 'search' => $search]) }}"
                class="px-3.5 py-2 rounded-xl transition {{ $statusFilter === 'completed' ? 'bg-slate-700 text-white' : 'bg-stone-100 text-slate-700 hover:bg-stone-200' }}">
                Completed ({{ $counts['completed'] }})
            </a>
            <a href="{{ route('admin.bookings.index', ['status' => 'cancelled', 'search' => $search]) }}"
                class="px-3.5 py-2 rounded-xl transition {{ $statusFilter === 'cancelled' ? 'bg-rose-600 text-white' : 'bg-rose-50 text-rose-800 hover:bg-rose-100' }}">
                Cancelled ({{ $counts['cancelled'] }})
            </a>
        </div>

        <!-- Search Bar Form -->
        <form method="GET" action="{{ route('admin.bookings.index') }}" class="flex items-center gap-2">
            @if($statusFilter)
                <input type="hidden" name="status" value="{{ $statusFilter }}">
            @endif
            <div class="relative w-full sm:w-64">
                <input type="text" name="search" value="{{ $search }}" placeholder="Search parent, email, phone..."
                    class="w-full pl-9 pr-4 py-2 rounded-xl border border-stone-300 text-xs focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500">
                <svg class="w-4 h-4 text-slate-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            @if($search)
                <a href="{{ route('admin.bookings.index', ['status' => $statusFilter]) }}" class="px-3 py-2 rounded-xl bg-stone-100 hover:bg-stone-200 text-xs font-semibold text-slate-600">
                    Clear
                </a>
            @endif
            <button type="submit" class="px-4 py-2 rounded-xl bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold transition">
                Filter
            </button>
        </form>

    </div>

    <!-- Bookings Table Card -->
    <div class="bg-white rounded-3xl border border-stone-200 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs border-collapse">
                <thead>
                    <tr class="bg-stone-50 border-b border-stone-200 font-bold uppercase text-slate-500 tracking-wider">
                        <th class="py-3.5 px-6">ID</th>
                        <th class="py-3.5 px-6">Parent & Child</th>
                        <th class="py-3.5 px-6">Contact Details</th>
                        <th class="py-3.5 px-6">Visit Preference</th>
                        <th class="py-3.5 px-6">Target Intake</th>
                        <th class="py-3.5 px-6">Status</th>
                        <th class="py-3.5 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100 text-slate-700">
                    @forelse($bookings as $b)
                    <tr class="hover:bg-stone-50/60 transition {{ $b->isAnonymized() ? 'bg-stone-50/90 opacity-60' : '' }}">
                        <td class="py-4 px-6 font-mono text-[11px] text-slate-400">
                            #{{ $b->id }}
                        </td>

                        <td class="py-4 px-6">
                            <span class="font-bold text-slate-900 block text-sm">
                                {{ $b->parent_name }}
                            </span>
                            <span class="text-slate-500 text-[11px]">
                                Child: <strong class="text-slate-700">{{ $b->child_age_or_dob }}</strong>
                            </span>
                        </td>

                        <td class="py-4 px-6 space-y-0.5">
                            @if(!$b->isAnonymized())
                                <div><a href="mailto:{{ $b->email }}" class="text-emerald-700 hover:underline">{{ $b->email }}</a></div>
                                <div class="text-slate-500 font-mono">{{ $b->phone }}</div>
                            @else
                                <span class="italic text-slate-400">[GDPR Anonymized]</span>
                            @endif
                        </td>

                        <td class="py-4 px-6">
                            <span class="font-bold text-slate-800 block">
                                {{ $b->preferred_date->format('l, M j, Y') }}
                            </span>
                            <span class="text-slate-500 text-[11px]">
                                {{ $b->preferred_time }}
                            </span>
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
                            <a href="{{ route('admin.bookings.show', $b) }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl font-bold text-xs bg-stone-100 hover:bg-emerald-50 hover:text-emerald-800 text-slate-700 transition">
                                <span>Review & Notes</span>
                                &rarr;
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="py-12 text-center text-slate-500">
                            <svg class="w-12 h-12 mx-auto text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            <p class="font-bold text-sm text-slate-700">No booking requests found</p>
                            <p class="text-xs text-slate-400 mt-1">Try clearing your filters or check back later.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($bookings->hasPages())
        <div class="p-4 border-t border-stone-200 bg-stone-50">
            {{ $bookings->links() }}
        </div>
        @endif
    </div>

</div>
@endsection
