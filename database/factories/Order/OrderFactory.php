<?php

namespace Database\Factories\Order;

use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_name' => $this->faker->text(50),
            'ship_first_name' => $this->faker->text(100),
            'ship_last_name' => $this->faker->text(100),
            'ship_address' => $this->faker->text(100),
            'city' => $this->faker->text(50),
            'zip' => $this->faker->text(50),
            'phone' => $this->faker->randomNumber(5),
            'email' => $this->faker->randomNumber(5),
            'state' => $this->faker->text(50),
            'amount' => $this->faker->randomNumber(2),
            'payment_id' => $this->faker->randomNumber(1),
            'payable_amount' => $this->faker->randomNumber(5),
            'status_code' => $this->faker->numberBetween(01, 08),
            'handling_id' => $this->faker->randomNumber(1),
        ];
    }
}
