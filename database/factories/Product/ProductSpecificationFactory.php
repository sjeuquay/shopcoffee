<?php

namespace Database\Factories\Product;

use App\Models\Product\ProductSpecification;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product\ProductSpecification>
 */
class ProductSpecificationFactory extends Factory
{
    protected $model = ProductSpecification::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id'          => fake()->numberBetween(1, 11),
            'length'              => fake()->numberBetween(1, 20),
            'width'               => fake()->numberBetween(1, 20),
            'height'              => fake()->numberBetween(1, 20),
            'weight_id'           => fake()->numberBetween(1, 20),
            'actual_weight'       => fake()->numberBetween(1, 20),
            'actual_size'         => fake()->randomFloat(),
            'size_id'             => fake()->numberBetween(1, 3),
            'specification_price' => fake()->randomFloat(),
         ];
    }
}
