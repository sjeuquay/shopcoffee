<?php

namespace Database\Factories\Vendor;

use App\Models\Vendor\Contact;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vendor\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            Contact::ADDRESS      => substr(fake()->address(), 0, 50),
            Contact::ADDRESS_2    => substr(fake()->address(), 0, 200),
            Contact::CITY         => substr(fake()->city(), 0, 50),
            Contact::PROVINCE     => substr(fake()->city(), 0, 50),
            Contact::COUNTRY      => substr(fake()->country(), 0, 10),
            Contact::EMAIL        => substr(fake()->email(), 0, 120),
            Contact::PHONE        => substr(fake()->phoneNumber(), 0, 20),
            Contact::LATITUDE     => fake()->latitude(),
            Contact::LONGTITUDE   => fake()->longitude(),
            Contact::OPENING_TIME => Carbon::parse('2001-01-01 ' . fake()->time('H:i')),
            Contact::CLOSING_TIME => Carbon::parse('2001-01-01 ' . fake()->time('H:i')),
            Contact::IS_MOBILE    => fake()->numberBetween(0, 1),
            Contact::IS_DEFAULT   => fake()->numberBetween(0, 1),
            Contact::IS_SHIPPING  => fake()->numberBetween(0, 1),
            Contact::IS_BILLING   => fake()->numberBetween(0, 1),
            Contact::UPDATE_TIME  => fake()->dateTime(),
         ];
    }
}
