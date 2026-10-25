<?php

namespace Tests\Feature;

use App\Enums\BookingStatus;
use App\Mail\BookingConfirmationParentMail;
use App\Mail\BookingNotificationAdminMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class BookingSubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_parent_can_submit_visit_booking(): void
    {
        Mail::fake();

        $data = [
            'parent_name' => 'Elena Rostova',
            'email' => 'elena.rostova@example.com',
            'phone' => '+44 7700 900123',
            'child_age_or_dob' => '14 months old',
            'preferred_date' => Carbon::tomorrow()->format('Y-m-d'),
            'preferred_time' => 'Morning (10:00 AM)',
            'intended_start_date' => 'Within 1 Month',
            'notes' => 'Looking for infant suite full-day placement.',
            'gdpr_consent' => '1',
            'website_url' => '', // Honeypot empty
        ];

        $response = $this->post(route('bookings.store'), $data);

        $response->assertRedirect(route('bookings.create'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('bookings', [
            'parent_name' => 'Elena Rostova',
            'email' => 'elena.rostova@example.com',
            'status' => BookingStatus::Pending->value,
        ]);
    }

    public function test_transactional_emails_are_dispatched_on_booking(): void
    {
        Mail::fake();

        User::factory()->create([
            'email' => 'admin@littlesprouts.test',
        ]);

        $data = [
            'parent_name' => 'David Miller',
            'email' => 'david.miller@example.com',
            'phone' => '+44 7700 900456',
            'child_age_or_dob' => '2 years old',
            'preferred_date' => Carbon::now()->addDays(3)->format('Y-m-d'),
            'preferred_time' => 'Afternoon (02:00 PM)',
            'gdpr_consent' => '1',
            'website_url' => '',
        ];

        $this->post(route('bookings.store'), $data);

        Mail::assertQueued(BookingConfirmationParentMail::class, function ($mail) {
            return $mail->hasTo('david.miller@example.com');
        });

        Mail::assertQueued(BookingNotificationAdminMail::class, function ($mail) {
            return $mail->hasTo('admin@littlesprouts.test');
        });
    }

    public function test_honeypot_field_drops_spam_submission(): void
    {
        Mail::fake();

        $data = [
            'parent_name' => 'Spam Bot',
            'email' => 'spambot@example.com',
            'phone' => '123456789',
            'child_age_or_dob' => '1 year',
            'preferred_date' => Carbon::tomorrow()->format('Y-m-d'),
            'preferred_time' => 'Morning (10:00 AM)',
            'gdpr_consent' => '1',
            'website_url' => 'https://spamlink.com', // Filled honeypot
        ];

        $response = $this->post(route('bookings.store'), $data);

        $response->assertRedirect(route('bookings.create'));
        $this->assertDatabaseMissing('bookings', [
            'parent_name' => 'Spam Bot',
        ]);
        Mail::assertNothingSent();
    }

    public function test_past_date_is_rejected(): void
    {
        $data = [
            'parent_name' => 'Elena Rostova',
            'email' => 'elena.rostova@example.com',
            'phone' => '+44 7700 900123',
            'child_age_or_dob' => '14 months old',
            'preferred_date' => Carbon::yesterday()->format('Y-m-d'),
            'preferred_time' => 'Morning (10:00 AM)',
            'gdpr_consent' => '1',
        ];

        $response = $this->post(route('bookings.store'), $data);

        $response->assertSessionHasErrors(['preferred_date']);
    }

    public function test_gdpr_consent_is_required(): void
    {
        $data = [
            'parent_name' => 'Elena Rostova',
            'email' => 'elena.rostova@example.com',
            'phone' => '+44 7700 900123',
            'child_age_or_dob' => '14 months old',
            'preferred_date' => Carbon::tomorrow()->format('Y-m-d'),
            'preferred_time' => 'Morning (10:00 AM)',
            // gdpr_consent omitted
        ];

        $response = $this->post(route('bookings.store'), $data);

        $response->assertSessionHasErrors(['gdpr_consent']);
    }

    public function test_rfc_email_validation_is_enforced(): void
    {
        $data = [
            'parent_name' => 'Elena Rostova',
            'email' => 'invalid-email-address',
            'phone' => '+44 7700 900123',
            'child_age_or_dob' => '14 months old',
            'preferred_date' => Carbon::tomorrow()->format('Y-m-d'),
            'preferred_time' => 'Morning (10:00 AM)',
            'gdpr_consent' => '1',
        ];

        $response = $this->post(route('bookings.store'), $data);

        $response->assertSessionHasErrors(['email']);
    }
}
