<?php

namespace Database\Factories\Equipment;

use App\Models\Equipment\Equipment;
use App\Models\Setting\Status;
use App\Models\Vendor\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipment\Equipment>
 */
class EquipmentFactory extends Factory
{
    protected $model = Equipment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            Equipment::SERIAL_NUMBER     => fake()->unique()->numerify('SN########'),
            Equipment::VENDOR_ID         => Vendor::inRandomOrder()->first()->id,
            // Equipment::BRANCH_ID         => '',
            Equipment::NAME              => fake()->name(),
            Equipment::DESCRIPTION       => substr(fake()->paragraph(), 0, 200),
            Equipment::STATUS_CODE       => Status::inRandomOrder()->first()->status_code,
            Equipment::TOTAL_TIME_USED   => fake()->randomFloat(),
            Equipment::COMMISSION_TIME   => fake()->dateTime(),
            Equipment::DECOMMISSION_TIME => fake()->dateTime(),
            Equipment::UPDATED_TIME      => fake()->dateTime(),
         ];
    }
}
