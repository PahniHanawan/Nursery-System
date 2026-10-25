<?php

namespace Database\Factories;

use App\Enums\BookingStatus;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Booking>
 */
class BookingFactory extends Factory
{
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'parent_name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'child_age_or_dob' => fake()->randomElement(['14 months', '2 years old', '8 months', '3.5 years old', '2024-05-12']),
            'preferred_date' => fake()->dateTimeBetween('now', '+30 days')->format('Y-m-d'),
            'preferred_time' => fake()->randomElement(['Morning (10:00 AM)', 'Afternoon (02:00 PM)', 'Late Afternoon (04:00 PM)']),
            'intended_start_date' => fake()->randomElement(['Immediately', 'Next Month', 'Autumn Term', 'Spring Term']),
            'notes' => fake()->optional(0.6)->sentence(10),
            'status' => fake()->randomElement(BookingStatus::cases()),
            'internal_notes' => fake()->optional(0.3)->sentence(8),
            'gdpr_consent' => true,
            'ip_address' => fake()->ipv4(),
        ];
    }

    /**
     * Indicate that the booking is pending.
     */
    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => BookingStatus::Pending,
        ]);
    }

    /**
     * Indicate that the booking is confirmed.
     */
    public function confirmed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => BookingStatus::Confirmed,
        ]);
    }
}
