<?php

namespace Database\Factories\Vendor;

use App\Models\Setting\Status;
use App\Models\Vendor\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vendor\Contact>
 */
class VendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'             => fake()->unique()->randomNumber(),
            'type_id'             => fake()->numberBetween(1, 3),
            'account_number'      => fake()->text(20),
            'title'               => fake()->company(),
            'display_name'        => fake()->company(),
            'logo'                => 'img/mock_vendor_logo.jpg',
            'owner_first_name'    => fake()->firstName(),
            'owner_last_name'     => fake()->lastName(),
            Vendor::STATUS_CODE   => Status::inRandomOrder()->first()[ Vendor::STATUS_CODE ],
            'currency_id'         => fake()->numberBetween(1, 6),
            'date_joined'         => fake()->date(),
            'date_exit'           => fake()->date(),
            'updated_time'        => now(),
            'modified_by_user_id' => '1',
         ];
    }
}
