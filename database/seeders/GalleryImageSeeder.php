<?php

namespace Database\Seeders;

use App\Models\GalleryImage;
use Illuminate\Database\Seeder;

class GalleryImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            [
                'image_path' => 'https://images.unsplash.com/photo-1587654780291-39c9404d746b?auto=format&fit=crop&w=1200&q=80',
                'alt_text' => 'Spacious and bright toddler creative play and art workshop room',
                'sort_order' => 1,
            ],
            [
                'image_path' => 'https://images.unsplash.com/photo-1502086223501-7ea6ecd79368?auto=format&fit=crop&w=1200&q=80',
                'alt_text' => 'Green outdoor sensory garden and play equipment with safe soft turf',
                'sort_order' => 2,
            ],
            [
                'image_path' => 'https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?auto=format&fit=crop&w=1200&q=80',
                'alt_text' => 'Cozy storytelling and reading library corner with soft cushions',
                'sort_order' => 3,
            ],
            [
                'image_path' => 'https://images.unsplash.com/photo-1516627145497-ae6968895b74?auto=format&fit=crop&w=1200&q=80',
                'alt_text' => 'Sensory discovery station with wooden natural blocks and tactile materials',
                'sort_order' => 4,
            ],
            [
                'image_path' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&w=1200&q=80',
                'alt_text' => 'Baby discovery lounge with padded crawling pods and gentle pastel decor',
                'sort_order' => 5,
            ],
            [
                'image_path' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1200&q=80',
                'alt_text' => 'Dining and snack area with hygienic child-sized eco bamboo tables',
                'sort_order' => 6,
            ],
        ];

        foreach ($images as $img) {
            GalleryImage::firstOrCreate(
                ['image_path' => $img['image_path']],
                [
                    'alt_text' => $img['alt_text'],
                    'sort_order' => $img['sort_order'],
                ]
            );
        }
    }
}
