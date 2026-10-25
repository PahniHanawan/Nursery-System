<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Mail\BookingConfirmationParentMail;
use App\Mail\BookingNotificationAdminMail;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    /**
     * Show the visit booking form.
     */
    public function create(): View
    {
        return view('pages.book_a_visit');
    }

    /**
     * Store a newly created visit booking in storage.
     */
    public function store(StoreBookingRequest $request): RedirectResponse
    {
        // Honeypot check: if filled, quietly drop to thwart bots
        if (! empty($request->input('website_url'))) {
            return redirect()->route('bookings.create')
                ->with('success', 'Your request has been received.');
        }

        $validated = $request->validated();
        $validated['ip_address'] = $request->ip();

        /** @var Booking $booking */
        $booking = Booking::create($validated);

        // Transactional emails with try/catch to avoid breaking user flow if mail server is unconfigured
        try {
            Mail::to($booking->email)->send(new BookingConfirmationParentMail($booking));

            $adminEmail = config('mail.from.address', 'admin@littlesprouts.test');
            $adminUser = User::first();
            if ($adminUser && ! empty($adminUser->email)) {
                $adminEmail = $adminUser->email;
            }

            Mail::to($adminEmail)->send(new BookingNotificationAdminMail($booking));
        } catch (\Throwable $e) {
            Log::error('Failed to send booking transactional emails: '.$e->getMessage(), [
                'booking_id' => $booking->id,
            ]);
        }

        return redirect()->route('bookings.create')
            ->with('success', 'Thank you, '.$booking->parent_name.'! Your visit tour request has been submitted. Our admissions team will review and confirm availability with you within 24–48 hours.');
    }
}
