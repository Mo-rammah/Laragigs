<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\listing>
 */
class listingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'tags' => 'laravel, API, Backend',
            'company' => fake()->company(),
            'website' => fake()->url(),
            'email' => fake()->companyEmail(),
            'location' => fake()->city(),
            'description' => fake()->paragraph(5),
        ];
    }
}
