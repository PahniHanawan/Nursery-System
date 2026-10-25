<?php

namespace Database\Factories;

use App\Models\PageContent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PageContent>
 */
class PageContentFactory extends Factory
{
    protected $model = PageContent::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'page_slug' => fake()->randomElement(['home', 'about', 'rooms', 'fees', 'contact']),
            'section_key' => fake()->unique()->slug(2),
            'content_value' => fake()->paragraph(),
        ];
    }
}
