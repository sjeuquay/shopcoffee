<?php

namespace Database\Factories\Product;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imagePaths = ['bac-xiu.png', 'Coffee_Latte_300x300.png', 'caphelyden.png', 'caphekem.png', 'Ca-phe-da.png'];

        return [
            'category_id'         => $this->faker->numberBetween(1, 4),
            'name'                => $this->faker->text(20),
            'description'         => $this->faker->text(20),
            'short_description'   => $this->faker->text(200),
            'meta_description'    => $this->faker->text(200),
            'sku'                 => $this->faker->text(40),
            'internal_image_path' => $this->faker->randomElement($imagePaths),
            'quantity_available'  => $this->faker->randomNumber(2),
            'unit_price'          => $this->faker->randomFloat(2, 0, 1000),
            'url_key'             => $this->faker->text(200),
        ];
    }
}
