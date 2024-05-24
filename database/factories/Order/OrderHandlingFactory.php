<?php

namespace Database\Factories\Order;

use App\Models\Order\OrderHandling;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order\OrderHandling>
 */
class OrderHandlingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderHandling::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->numberBetween(0, 32767), // kiểu smallint
            'short_description' => $this->faker->text(50), // kiểu varchar(50)
            'long_description' => $this->faker->realText(150), // kiểu tinytext(255)
        ];
    }
}
