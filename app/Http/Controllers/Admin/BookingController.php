<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BookingStatus;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookingController extends Controller
{
    /**
     * Display a listing of the bookings.
     */
    public function index(Request $request): View
    {
        $statusFilter = $request->query('status');
        $search = $request->query('search');

        $query = Booking::latest();

        if ($statusFilter && in_array($statusFilter, ['pending', 'confirmed', 'cancelled', 'completed'], true)) {
            $query->where('status', $statusFilter);
        }

        if (! empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('parent_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('child_age_or_dob', 'like', "%{$search}%");
            });
        }

        $bookings = $query->paginate(15)->withQueryString();

        $counts = [
            'all' => Booking::count(),
            'pending' => Booking::where('status', BookingStatus::Pending)->count(),
            'confirmed' => Booking::where('status', BookingStatus::Confirmed)->count(),
            'cancelled' => Booking::where('status', BookingStatus::Cancelled)->count(),
            'completed' => Booking::where('status', BookingStatus::Completed)->count(),
        ];

        return view('admin.bookings.index', compact('bookings', 'statusFilter', 'search', 'counts'));
    }

    /**
     * Display the specified booking details.
     */
    public function show(Booking $booking): View
    {
        return view('admin.bookings.show', compact('booking'));
    }

    /**
     * Update the status of the booking.
     */
    public function updateStatus(Request $request, Booking $booking): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', Rule::enum(BookingStatus::class)],
        ]);

        $booking->update([
            'status' => $validated['status'],
        ]);

        return back()->with('success', 'Booking status updated to '.$booking->status->label().'.');
    }

    /**
     * Update internal staff notes on the booking.
     */
    public function updateNotes(Request $request, Booking $booking): RedirectResponse
    {
        $validated = $request->validate([
            'internal_notes' => ['nullable', 'string', 'max:5000'],
        ]);

        $booking->update([
            'internal_notes' => $validated['internal_notes'],
        ]);

        return back()->with('success', 'Staff internal notes updated successfully.');
    }

    /**
     * Soft delete the specified booking.
     */
    public function destroy(Booking $booking): RedirectResponse
    {
        $booking->delete();

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking record #'.$booking->id.' was removed (soft deleted).');
    }

    /**
     * Execute GDPR Right to be Forgotten: erase all personal identifiable information.
     */
    public function anonymize(Booking $booking): RedirectResponse
    {
        $booking->anonymize();

        return back()->with('success', 'GDPR Erase executed: Personal Identifiable Information for booking #'.$booking->id.' has been permanently scrubbed.');
    }
}
