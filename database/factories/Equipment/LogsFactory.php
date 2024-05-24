<?php

namespace Database\Factories\Equipment;

use App\Models\Equipment\Logs;
use App\Models\Setting\Sequence;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipment\Logs>
 */
class LogsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Logs::EQUIPMENT_ID => '',
            Logs::SEQUENCE_ID           => Sequence::inRandomOrder()->first()->id,
            Logs::FIRMWARE_CTL_ERROR_ID => fake()->randomNumber(),
         ];
    }
}
