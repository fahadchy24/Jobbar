<?php

namespace Database\Factories;

use App\Enums\EmploymentType;
use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Number;
use Illuminate\Support\Str;

/**
 * @extends Factory<Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->realText(60);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            /*
            // Another approach
                'title' => fake()->realText(),
                'slug' => fn(array $attributes) => Str::slug($attributes['title']),
            */
            'employment_type' => fake()->randomElement(EmploymentType::cases())->value,
            'company_name' => fake()->company(),
            'company_logo' => fake()->imageUrl(100, 100),
            'role' => fake()->jobTitle(),
            'apply_url' => fake()->url(),
            'description' => fake()->realText(600),
            'salary' => Number::currency(fake()->numberBetween(1000, 5000)).' - '.Number::currency(fake()->numberBetween(1000, 5000)),
        ];
    }
}
