<?php

namespace Database\Seeders;

use App\Models\FeeTier;
use Illuminate\Database\Seeder;

class FeeTierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tiers = [
            [
                'age_group_name' => 'Under 2s (0 - 24 months)',
                'session_type' => 'Full Day (08:00 - 18:00)',
                'rate_per_day' => 78.00,
            ],
            [
                'age_group_name' => 'Under 2s (0 - 24 months)',
                'session_type' => 'Morning Session (08:00 - 13:00)',
                'rate_per_day' => 48.00,
            ],
            [
                'age_group_name' => 'Under 2s (0 - 24 months)',
                'session_type' => 'Afternoon Session (13:00 - 18:00)',
                'rate_per_day' => 45.00,
            ],
            [
                'age_group_name' => 'Over 2s (2 - 5 years)',
                'session_type' => 'Full Day (08:00 - 18:00)',
                'rate_per_day' => 68.00,
            ],
            [
                'age_group_name' => 'Over 2s (2 - 5 years)',
                'session_type' => 'Morning Session (08:00 - 13:00)',
                'rate_per_day' => 42.00,
            ],
            [
                'age_group_name' => 'Over 2s (2 - 5 years)',
                'session_type' => 'Afternoon Session (13:00 - 18:00)',
                'rate_per_day' => 39.00,
            ],
        ];

        foreach ($tiers as $tier) {
            FeeTier::firstOrCreate(
                [
                    'age_group_name' => $tier['age_group_name'],
                    'session_type' => $tier['session_type'],
                ],
                ['rate_per_day' => $tier['rate_per_day']]
            );
        }
    }
}
