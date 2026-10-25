<?php

namespace Database\Factories;

use App\Models\FeeTier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<FeeTier>
 */
class FeeTierFactory extends Factory
{
    protected $model = FeeTier::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'age_group_name' => fake()->randomElement(['Under 2s (0 - 24 months)', 'Over 2s (2 - 5 years)']),
            'session_type' => fake()->randomElement(['Full Day (08:00 - 18:00)', 'Morning Session (08:00 - 13:00)', 'Afternoon Session (13:00 - 18:00)']),
            'rate_per_day' => fake()->randomFloat(2, 45, 85),
        ];
    }
}
