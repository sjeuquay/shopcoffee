<?php

namespace Database\Factories\Equipment;

use App\Models\Equipment\Branch;
use App\Models\Setting\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipment\Branch>
 */
class BranchFactory extends Factory
{
    protected $model = Branch::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            Branch::BRANCH_NAME      => substr(fake()->company(), 0, 20),
            Branch::DESCRIPTION      => substr(fake()->paragraph(), 0, 200),
            Branch::RENT_PRICE       => fake()->randomFloat(),
            Branch::STATUS           => fake()->randomElement([ 'Active', 'Inactive' ]),
            Branch::DATE_MANUFACTURE => fake()->date(),
            Branch::UPDATED_TIME     => fake()->dateTime(),
         ];
    }
}
