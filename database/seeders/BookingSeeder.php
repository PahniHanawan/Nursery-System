<?php

namespace Database\Seeders;

use App\Enums\BookingStatus;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookings = [
            [
                'parent_name' => 'Elena Rostova',
                'email' => 'elena.rostova@example.com',
                'phone' => '+44 7700 900123',
                'child_age_or_dob' => '14 months old',
                'preferred_date' => Carbon::tomorrow()->format('Y-m-d'),
                'preferred_time' => 'Morning (10:00 AM)',
                'intended_start_date' => 'Within 1 Month',
                'notes' => 'Looking for full-day placement for infant room starting next month as returning to work.',
                'status' => BookingStatus::Pending,
                'internal_notes' => 'Followed up via automated confirmation; awaiting parent response for 10am slot.',
                'gdpr_consent' => true,
                'ip_address' => '127.0.0.1',
            ],
            [
                'parent_name' => 'David Miller',
                'email' => 'david.miller@example.co.uk',
                'phone' => '+44 7700 900456',
                'child_age_or_dob' => '2.5 years old',
                'preferred_date' => Carbon::now()->addDays(3)->format('Y-m-d'),
                'preferred_time' => 'Afternoon (02:00 PM)',
                'intended_start_date' => 'Next Term (Autumn)',
                'notes' => 'Interested in 3 full days per week. Would like to see the outdoor garden.',
                'status' => BookingStatus::Confirmed,
                'internal_notes' => 'Confirmed tour with Sarah on Oct 25. Requested dietary info packet.',
                'gdpr_consent' => true,
                'ip_address' => '127.0.0.1',
            ],
            [
                'parent_name' => 'Amina Khan',
                'email' => 'amina.k@example.org',
                'phone' => '+44 7700 900789',
                'child_age_or_dob' => '9 months old',
                'preferred_date' => Carbon::now()->addDays(5)->format('Y-m-d'),
                'preferred_time' => 'Late Afternoon (04:00 PM)',
                'intended_start_date' => 'Immediately',
                'notes' => 'Seeking baby room vacancy for immediate start. Need info on government childcare funding.',
                'status' => BookingStatus::Pending,
                'internal_notes' => null,
                'gdpr_consent' => true,
                'ip_address' => '127.0.0.1',
            ],
            [
                'parent_name' => 'Marcus Thorne',
                'email' => 'm.thorne@example.com',
                'phone' => '+44 7700 900321',
                'child_age_or_dob' => '3 years old',
                'preferred_date' => Carbon::now()->subDays(2)->format('Y-m-d'),
                'preferred_time' => 'Morning (10:00 AM)',
                'intended_start_date' => 'Spring Term',
                'notes' => 'Show-around completed with team lead Claire.',
                'status' => BookingStatus::Completed,
                'internal_notes' => 'Parent was very impressed with Reggio Emilia workshop. Waiting for enrollment papers.',
                'gdpr_consent' => true,
                'ip_address' => '127.0.0.1',
            ],
        ];

        foreach ($bookings as $b) {
            Booking::firstOrCreate(
                ['email' => $b['email'], 'preferred_date' => $b['preferred_date']],
                $b
            );
        }
    }
}
