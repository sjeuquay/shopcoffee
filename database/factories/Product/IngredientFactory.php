<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingredient>
 */
class IngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id ' => $this->faker->numberBetween(1, 11),
            'option_1' => $this->faker->text(20),
            'description' => $this->faker->text(20),
            'short_description' => $this->faker->text(200),
            'meta_description' => $this->faker->text(200),
            'sku' => $this->faker->text(40),
            'internal_image_path' => $this->faker->text(20),
            'quantity_available' => $this->faker->randomNumber(2), // Số ngẫu nhiên cho trường 'quantity_available'
            'unit_price' => $this->faker->randomFloat(2, 0, 1000),
            'url_key' => $this->faker->text(200)
        ];
    }
}
