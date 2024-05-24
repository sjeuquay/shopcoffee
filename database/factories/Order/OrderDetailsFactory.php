<?php

namespace Database\Factories\Order;

use App\Models\Order\OrderDetails;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order\OrderDetails>
 */
class OrderDetailsFactory extends Factory
{
    protected $model = OrderDetails::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => $this->faker->numberBetween(1, 4),
            'product_id' => $this->faker->numberBetween(1, 11),
            'quantity' => $this->faker->randomNumber(3),
            'unit_price' => $this->faker->randomFloat(2, 0, 1000),
            'sub_total' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
