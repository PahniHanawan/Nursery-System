<?php

namespace Tests\Feature;

use App\Models\FeeTier;
use App\Models\GalleryImage;
use App\Models\PageContent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_can_be_rendered(): void
    {
        PageContent::set('global', 'announcement', 'Welcome to our nursery');

        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertSee('Little Sprouts');
        $response->assertSee('Welcome to our nursery');
    }

    public function test_about_page_can_be_rendered(): void
    {
        $response = $this->get(route('about'));

        $response->assertStatus(200);
        $response->assertSee('Sarah Jenkins');
        $response->assertSee('Educational Philosophy');
    }

    public function test_rooms_page_can_be_rendered(): void
    {
        $response = $this->get(route('rooms'));

        $response->assertStatus(200);
        $response->assertSee('Baby Discovery Suite');
        $response->assertSee('Toddler Explorers');
        $response->assertSee('Pre-School Readiness');
    }

    public function test_fees_page_displays_fee_tiers(): void
    {
        FeeTier::factory()->create([
            'age_group_name' => 'Under 2s (0 - 24 months)',
            'session_type' => 'Full Day (08:00 - 18:00)',
            'rate_per_day' => 78.00,
        ]);

        $response = $this->get(route('fees'));

        $response->assertStatus(200);
        $response->assertSee('Under 2s (0 - 24 months)');
        $response->assertSee('78.00');
        $response->assertSee('Real-Time Fee Calculator');
    }

    public function test_gallery_page_displays_images(): void
    {
        GalleryImage::factory()->create([
            'alt_text' => 'Children playing with wooden blocks',
            'sort_order' => 1,
        ]);

        $response = $this->get(route('gallery'));

        $response->assertStatus(200);
        $response->assertSee('Children playing with wooden blocks');
    }

    public function test_contact_page_can_be_rendered(): void
    {
        $response = $this->get(route('contact'));

        $response->assertStatus(200);
        $response->assertSee('Admissions Office');
        $response->assertSee('Campus Address');
    }

    public function test_privacy_policy_page_can_be_rendered(): void
    {
        $response = $this->get(route('privacy'));

        $response->assertStatus(200);
        $response->assertSee('EU GDPR Privacy Policy');
        $response->assertSee('Data Controller Identification');
        $response->assertSee('Right to be Forgotten');
    }

    public function test_book_a_visit_page_can_be_rendered(): void
    {
        $response = $this->get(route('bookings.create'));

        $response->assertStatus(200);
        $response->assertSee('Book a Personalized Visit Tour');
        $response->assertSee('GDPR Compliance Consent');
    }
}
