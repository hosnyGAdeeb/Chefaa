<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'image' => '/assets/images/default.jpg',
            'title' => $this->faker->unique()->sentence(3),
            'description' => $this->faker->text(),
            'price' => rand(1, 1000),
            'quantity' => 100,
        ];
    }
}
