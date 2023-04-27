<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Recipe;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'images' => fake(),
            'portion' => fake()->numberBetween(0, 50000),
            'cooking_time' => fake()->time(),
            'description' => fake()->text(),
            'origin_id' => Recipe::factory(),
            'category_id' => Category::factory(),
        ];
    }

    
    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => null,
            'images' => null,
            'portion' => null,
            'cooking_time' => null,
            'description' => null,
            'origin_id' => null,
            'category_id' => null,
        ]);
    }
}
