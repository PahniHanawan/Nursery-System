<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BookingStatus;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\FeeTier;
use App\Models\GalleryImage;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * Display the nursery management dashboard.
     */
    public function index(): View
    {
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', BookingStatus::Pending)->count();
        $confirmedBookings = Booking::where('status', BookingStatus::Confirmed)->count();
        $completedBookings = Booking::where('status', BookingStatus::Completed)->count();
        $cancelledBookings = Booking::where('status', BookingStatus::Cancelled)->count();

        $upcomingVisits = Booking::where('status', BookingStatus::Confirmed)
            ->whereDate('preferred_date', '>=', Carbon::today())
            ->whereDate('preferred_date', '<=', Carbon::today()->addDays(7))
            ->orderBy('preferred_date')
            ->get();

        $recentBookings = Booking::latest()->take(6)->get();

        $galleryCount = GalleryImage::count();
        $feeTiersCount = FeeTier::count();

        return view('admin.dashboard', compact(
            'totalBookings',
            'pendingBookings',
            'confirmedBookings',
            'completedBookings',
            'cancelledBookings',
            'upcomingVisits',
            'recentBookings',
            'galleryCount',
            'feeTiersCount'
        ));
    }
}
