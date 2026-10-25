@extends('layouts.admin')

@section('title', 'Booking #' . $booking->id . ' - ' . $booking->parent_name)

@section('content')
<div class="space-y-6 max-w-5xl">

    <!-- Top Breadcrumb & Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-xs text-slate-500 mb-1">
                <a href="{{ route('admin.bookings.index') }}" class="hover:underline">Visit Bookings</a>
                <span>&rsaquo;</span>
                <span class="text-slate-800 font-bold">Booking #{{ $booking->id }}</span>
            </div>
            <h1 class="font-brand text-2xl sm:text-3xl font-bold text-slate-900 flex items-center gap-3">
                {{ $booking->parent_name }}
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold border {{ $booking->status->badgeClasses() }}">
                    {{ $booking->status->label() }}
                </span>
            </h1>
        </div>

        <div class="flex items-center gap-2">
            <a href="{{ route('admin.bookings.index') }}" class="px-4 py-2 rounded-xl border border-stone-300 text-xs font-bold text-slate-700 bg-white hover:bg-stone-50 transition">
                &larr; Back to List
            </a>
        </div>
    </div>

    @if($booking->isAnonymized())
    <div class="p-4 rounded-2xl bg-amber-50 border border-amber-300 text-amber-900 text-xs flex items-center gap-3">
        <svg class="w-5 h-5 text-amber-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
        <span><strong>GDPR Notice:</strong> This booking record was anonymized under EU GDPR Right to be Forgotten. PII has been scrubbed from active storage.</span>
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

        <!-- Left Column: Details Breakdown -->
        <div class="lg:col-span-7 space-y-6">
            
            <!-- Parent & Visit Information Card -->
            <div class="bg-white rounded-3xl p-6 sm:p-7 border border-stone-200 shadow-xs space-y-6">
                <h2 class="font-brand text-lg font-bold text-slate-900 pb-3 border-b border-stone-100">
                    Application Details
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 text-xs">
                    <div>
                        <span class="text-slate-400 font-bold uppercase tracking-wider block mb-1">Parent Full Name</span>
                        <span class="text-sm font-bold text-slate-900 block">{{ $booking->parent_name }}</span>
                    </div>

                    <div>
                        <span class="text-slate-400 font-bold uppercase tracking-wider block mb-1">Child Age / DOB</span>
                        <span class="text-sm font-bold text-slate-900 block">{{ $booking->child_age_or_dob }}</span>
                    </div>

                    <div>
                        <span class="text-slate-400 font-bold uppercase tracking-wider block mb-1">Email Address</span>
                        @if(!$booking->isAnonymized())
                            <a href="mailto:{{ $booking->email }}" class="text-sm font-bold text-emerald-700 hover:underline block">{{ $booking->email }}</a>
                        @else
                            <span class="text-sm text-slate-400 italic">{{ $booking->email }}</span>
                        @endif
                    </div>

                    <div>
                        <span class="text-slate-400 font-bold uppercase tracking-wider block mb-1">Telephone</span>
                        @if(!$booking->isAnonymized())
                            <a href="tel:{{ $booking->phone }}" class="text-sm font-bold text-slate-800 hover:text-emerald-700 block font-mono">{{ $booking->phone }}</a>
                        @else
                            <span class="text-sm text-slate-400 italic">[ERASED]</span>
                        @endif
                    </div>

                    <div>
                        <span class="text-slate-400 font-bold uppercase tracking-wider block mb-1">Requested Tour Date</span>
                        <span class="text-sm font-bold text-slate-900 block">{{ $booking->preferred_date->format('l, F j, Y') }}</span>
                    </div>

                    <div>
                        <span class="text-slate-400 font-bold uppercase tracking-wider block mb-1">Requested Time Slot</span>
                        <span class="text-sm font-bold text-slate-900 block">{{ $booking->preferred_time }}</span>
                    </div>

                    <div>
                        <span class="text-slate-400 font-bold uppercase tracking-wider block mb-1">Intended Intake Term</span>
                        <span class="text-sm font-medium text-slate-800 block">{{ $booking->intended_start_date ?? 'Flexible / Unspecified' }}</span>
                    </div>

                    <div>
                        <span class="text-slate-400 font-bold uppercase tracking-wider block mb-1">Consent & IP Logging</span>
                        <span class="text-xs text-slate-600 block">
                            GDPR Consented &bull; IP: <span class="font-mono text-slate-500">{{ $booking->ip_address ?? 'N/A' }}</span>
                        </span>
                    </div>
                </div>

                @if($booking->notes)
                <div class="pt-4 border-t border-stone-100">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block mb-1.5">Parent Notes & Special Inquiries</span>
                    <div class="p-4 rounded-2xl bg-stone-50 border border-stone-200 text-xs sm:text-sm text-slate-700 leading-relaxed whitespace-pre-wrap">
                        {{ $booking->notes }}
                    </div>
                </div>
                @endif

                <div class="pt-2 text-[11px] text-slate-400 flex items-center justify-between border-t border-stone-100">
                    <span>Submitted: {{ $booking->created_at->format('M d, Y @ H:i') }}</span>
                    <span>Last updated: {{ $booking->updated_at->diffForHumans() }}</span>
                </div>
            </div>

            <!-- Staff Internal Notes (FR-05) -->
            <div class="bg-white rounded-3xl p-6 sm:p-7 border border-stone-200 shadow-xs space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-stone-100">
                    <h2 class="font-brand text-lg font-bold text-slate-900">
                        Staff Internal Admissions Log
                    </h2>
                    <span class="text-xs text-slate-400 font-medium">Visible only to nursery operators</span>
                </div>

                <form method="POST" action="{{ route('admin.bookings.update-notes', $booking) }}" class="space-y-4">
                    @csrf
                    @method('PATCH')

                    <div>
                        <textarea name="internal_notes" rows="4" placeholder="Log phone consultations, rescheduled dates, dietary packets sent, or parent preferences..."
                            class="w-full p-4 rounded-2xl border border-stone-300 text-xs sm:text-sm text-slate-800 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500">{{ old('internal_notes', $booking->internal_notes) }}</textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-5 py-2.5 rounded-xl font-bold text-xs bg-slate-900 hover:bg-slate-800 text-white transition">
                            Save Internal Notes
                        </button>
                    </div>
                </form>
            </div>

        </div>

        <!-- Right Column: Status Actions & GDPR Erase -->
        <div class="lg:col-span-5 space-y-6">
            
            <!-- Quick Status Transition Card (FR-05) -->
            <div class="bg-white rounded-3xl p-6 sm:p-7 border border-stone-200 shadow-xs space-y-5">
                <h3 class="font-brand text-lg font-bold text-slate-900">Update Booking Status</h3>
                <p class="text-xs text-slate-500">
                    Transition the parent inquiry through admissions confirmation stages.
                </p>

                <form method="POST" action="{{ route('admin.bookings.update-status', $booking) }}" class="space-y-4">
                    @csrf
                    @method('PATCH')

                    <div class="space-y-2">
                        <label class="flex items-center gap-3 p-3 rounded-2xl border cursor-pointer {{ $booking->status === \App\Enums\BookingStatus::Pending ? 'border-amber-400 bg-amber-50/50' : 'border-stone-200 hover:bg-stone-50' }}">
                            <input type="radio" name="status" value="pending" {{ $booking->status === \App\Enums\BookingStatus::Pending ? 'checked' : '' }} class="text-amber-500 focus:ring-amber-400">
                            <div>
                                <span class="font-bold text-xs text-slate-900 block">Pending Review</span>
                                <span class="text-[11px] text-slate-500">Initial parent request; awaiting phone/calendar check</span>
                            </div>
                        </label>

                        <label class="flex items-center gap-3 p-3 rounded-2xl border cursor-pointer {{ $booking->status === \App\Enums\BookingStatus::Confirmed ? 'border-emerald-400 bg-emerald-50/50' : 'border-stone-200 hover:bg-stone-50' }}">
                            <input type="radio" name="status" value="confirmed" {{ $booking->status === \App\Enums\BookingStatus::Confirmed ? 'checked' : '' }} class="text-emerald-600 focus:ring-emerald-500">
                            <div>
                                <span class="font-bold text-xs text-slate-900 block">Confirmed Tour</span>
                                <span class="text-[11px] text-slate-500">Tour date verified with admissions staff</span>
                            </div>
                        </label>

                        <label class="flex items-center gap-3 p-3 rounded-2xl border cursor-pointer {{ $booking->status === \App\Enums\BookingStatus::Completed ? 'border-slate-400 bg-slate-50' : 'border-stone-200 hover:bg-stone-50' }}">
                            <input type="radio" name="status" value="completed" {{ $booking->status === \App\Enums\BookingStatus::Completed ? 'checked' : '' }} class="text-slate-600 focus:ring-slate-500">
                            <div>
                                <span class="font-bold text-xs text-slate-900 block">Completed Visit</span>
                                <span class="text-[11px] text-slate-500">Tour finished; followed up with registration pack</span>
                            </div>
                        </label>

                        <label class="flex items-center gap-3 p-3 rounded-2xl border cursor-pointer {{ $booking->status === \App\Enums\BookingStatus::Cancelled ? 'border-rose-400 bg-rose-50/50' : 'border-stone-200 hover:bg-stone-50' }}">
                            <input type="radio" name="status" value="cancelled" {{ $booking->status === \App\Enums\BookingStatus::Cancelled ? 'checked' : '' }} class="text-rose-600 focus:ring-rose-500">
                            <div>
                                <span class="font-bold text-xs text-slate-900 block">Cancelled</span>
                                <span class="text-[11px] text-slate-500">Parent cancelled or opted for alternate timing</span>
                            </div>
                        </label>
                    </div>

                    <button type="submit" class="w-full py-3 rounded-2xl font-bold text-xs bg-emerald-600 hover:bg-emerald-700 text-white transition shadow-sm">
                        Apply Status Change
                    </button>
                </form>
            </div>

            <!-- GDPR Right to be Forgotten Suite (FR-07) -->
            <div class="bg-white rounded-3xl p-6 sm:p-7 border border-stone-200 shadow-xs space-y-4">
                <div class="flex items-center gap-2">
                    <span class="p-1.5 bg-rose-100 text-rose-700 rounded-lg">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    </span>
                    <h3 class="font-brand text-base font-bold text-slate-900">EU GDPR Data Compliance</h3>
                </div>

                <p class="text-xs text-slate-500 leading-relaxed">
                    Under Article 17 of EU GDPR, parents may request their Personal Identifiable Information (PII) to be permanently scrubbed.
                </p>

                @if(!$booking->isAnonymized())
                <form method="POST" action="{{ route('admin.bookings.anonymize', $booking) }}" onsubmit="return confirm('WARNING: Are you sure you want to permanently erase parent name, email, phone, and IP address for this booking under EU GDPR? This action is irreversible.');">
                    @csrf
                    <button type="submit" class="w-full py-2.5 px-4 rounded-xl border border-rose-300 text-rose-700 hover:bg-rose-50 text-xs font-bold transition">
                        Execute GDPR Right to Erasure
                    </button>
                </form>
                @else
                <div class="p-3 bg-stone-100 rounded-xl text-center text-xs text-slate-500 font-semibold">
                    PII Scrubbed &bull; Anonymized
                </div>
                @endif

                <div class="pt-3 border-t border-stone-100">
                    <form method="POST" action="{{ route('admin.bookings.destroy', $booking) }}" onsubmit="return confirm('Soft-delete this booking row? It will be archived and hidden from active views.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-xs text-slate-400 hover:text-rose-600 transition flex items-center gap-1.5 mx-auto">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            Soft Delete Booking
                        </button>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
