<?php

namespace Database\Seeders;

use App\Models\PageContent;
use Illuminate\Database\Seeder;

class PageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contents = [
            // Global & Home
            ['page_slug' => 'global', 'section_key' => 'nursery_name', 'content_value' => 'Little Sprouts Nursery'],
            ['page_slug' => 'global', 'section_key' => 'phone', 'content_value' => '+44 (0) 20 7946 0912'],
            ['page_slug' => 'global', 'section_key' => 'email', 'content_value' => 'admissions@littlesproutsnursery.test'],
            ['page_slug' => 'global', 'section_key' => 'address', 'content_value' => '14 Primrose Lane, Kensington, London, W8 7PT'],
            ['page_slug' => 'global', 'section_key' => 'opening_hours', 'content_value' => 'Monday – Friday: 07:30 AM – 06:00 PM'],
            ['page_slug' => 'global', 'section_key' => 'announcement', 'content_value' => '🎉 Now Enrolling for Autumn & Spring Terms — Book your personalized visit today!'],

            // Home Page
            ['page_slug' => 'home', 'section_key' => 'hero_title', 'content_value' => 'Where Curiosity Blooms & Little Minds Thrive'],
            ['page_slug' => 'home', 'section_key' => 'hero_subtitle', 'content_value' => 'Award-winning early years education nurturing empathy, confidence, and creative exploration in a safe, nature-rich environment.'],
            ['page_slug' => 'home', 'section_key' => 'ethos_summary', 'content_value' => 'We combine Reggio Emilia inspired discovery with the EYFS curriculum to build a resilient foundation for lifelong learning.'],

            // About Page
            ['page_slug' => 'about', 'section_key' => 'ethos_full', 'content_value' => 'At Little Sprouts Nursery, we believe that the early childhood years are a unique, golden window for social development, curiosity, and emotional grounding. Our dedicated team of certified educators fosters a child-led atmosphere where every milestone is celebrated.'],
            ['page_slug' => 'about', 'section_key' => 'safety_standards', 'content_value' => 'Our campus features biometric security gates, certified pediatric first-aid trained practitioners on duty throughout all hours, CCTV coverage across common areas, and hygienic organic dining options.'],

            // Contact Page
            ['page_slug' => 'contact', 'section_key' => 'parking_guidance', 'content_value' => 'Complimentary 15-minute visitor parking bays are located directly opposite the reception gate. Stroller and pram storage is provided in the heated entrance lobby.'],
        ];

        foreach ($contents as $item) {
            PageContent::updateOrCreate(
                [
                    'page_slug' => $item['page_slug'],
                    'section_key' => $item['section_key'],
                ],
                ['content_value' => $item['content_value']]
            );
        }
    }
}
