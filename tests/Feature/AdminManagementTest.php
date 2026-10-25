<?php

namespace Tests\Feature;

use App\Enums\BookingStatus;
use App\Models\Booking;
use App\Models\FeeTier;
use App\Models\PageContent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthenticated_user_cannot_access_admin_dashboard(): void
    {
        $response = $this->get(route('admin.dashboard'));

        $response->assertRedirect(route('login'));
    }

    public function test_admin_can_access_dashboard_overview(): void
    {
        $user = User::factory()->create();
        Booking::factory()->pending()->create();

        $response = $this->actingAs($user)->get(route('admin.dashboard'));

        $response->assertStatus(200);
        $response->assertSee('Admissions Dashboard Overview');
        $response->assertSee('Pending Reviews');
    }

    public function test_admin_can_filter_bookings_by_status(): void
    {
        $user = User::factory()->create();
        $pendingBooking = Booking::factory()->pending()->create(['parent_name' => 'Alice Pending']);
        $confirmedBooking = Booking::factory()->confirmed()->create(['parent_name' => 'Bob Confirmed']);

        $response = $this->actingAs($user)->get(route('admin.bookings.index', ['status' => 'pending']));

        $response->assertStatus(200);
        $response->assertSee('Alice Pending');
        $response->assertDontSee('Bob Confirmed');
    }

    public function test_admin_can_update_booking_status(): void
    {
        $user = User::factory()->create();
        $booking = Booking::factory()->pending()->create();

        $response = $this->actingAs($user)->patch(route('admin.bookings.update-status', $booking), [
            'status' => 'confirmed',
        ]);

        $response->assertSessionHas('success');
        $this->assertEquals(BookingStatus::Confirmed, $booking->fresh()->status);
    }

    public function test_admin_can_update_internal_staff_notes(): void
    {
        $user = User::factory()->create();
        $booking = Booking::factory()->create();

        $response = $this->actingAs($user)->patch(route('admin.bookings.update-notes', $booking), [
            'internal_notes' => 'Phone call: Rescheduled tour to Thursday 10:30am.',
        ]);

        $response->assertSessionHas('success');
        $this->assertEquals('Phone call: Rescheduled tour to Thursday 10:30am.', $booking->fresh()->internal_notes);
    }

    public function test_admin_can_soft_delete_booking(): void
    {
        $user = User::factory()->create();
        $booking = Booking::factory()->create();

        $response = $this->actingAs($user)->delete(route('admin.bookings.destroy', $booking));

        $response->assertRedirect(route('admin.bookings.index'));
        $this->assertSoftDeleted('bookings', ['id' => $booking->id]);
    }

    public function test_admin_can_anonymize_booking_under_gdpr(): void
    {
        $user = User::factory()->create();
        $booking = Booking::factory()->create([
            'parent_name' => 'John Sensitive',
            'email' => 'john.sensitive@example.com',
            'phone' => '+44 7700 900888',
            'ip_address' => '192.168.1.1',
        ]);

        $response = $this->actingAs($user)->post(route('admin.bookings.anonymize', $booking));

        $response->assertSessionHas('success');

        $fresh = $booking->fresh();
        $this->assertEquals('[GDPR_ERASED]', $fresh->parent_name);
        $this->assertEquals('[GDPR_ERASED]', $fresh->phone);
        $this->assertNull($fresh->ip_address);
        $this->assertTrue($fresh->isAnonymized());
    }

    public function test_admin_can_update_fee_tier_rate(): void
    {
        $user = User::factory()->create();
        $feeTier = FeeTier::factory()->create([
            'rate_per_day' => 60.00,
        ]);

        $response = $this->actingAs($user)->put(route('admin.fees.update', $feeTier), [
            'rate_per_day' => 69.50,
        ]);

        $response->assertSessionHas('success');
        $this->assertEquals('69.50', (string) $feeTier->fresh()->rate_per_day);
    }

    public function test_admin_can_update_cms_content(): void
    {
        $user = User::factory()->create();
        $item = PageContent::create([
            'page_slug' => 'global',
            'section_key' => 'announcement',
            'content_value' => 'Old announcement text',
        ]);

        $response = $this->actingAs($user)->post(route('admin.cms.update'), [
            'contents' => [
                $item->id => 'Updated announcement for Spring Term!',
            ],
        ]);

        $response->assertSessionHas('success');
        $this->assertEquals('Updated announcement for Spring Term!', $item->fresh()->content_value);
    }
}
