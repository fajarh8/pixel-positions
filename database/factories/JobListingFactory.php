<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobListing>
 */
class JobListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employer_id' => Employer::factory(),
            'title' => fake()->jobTitle(),
            'salary' => fake()->randomElement([100000, 150000, 200000, 250000, 300000]),
            'location' => fake()->city(),
            'schedule' => fake()->randomElement(['full-time', 'part-time']),
            'url' => fake()->url(),
            'featured' => false,
        ];
    }
}
