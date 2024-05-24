<?php

namespace Database\Seeders;

use App\Models\Setting\CountryCode;
use Illuminate\Database\Seeder;

class CountryCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CountryCode::truncate();
        $countries = [
            [
                'language'   => 'English',
                'short_name' => 'USA',
                'full_name'  => 'United States of America',
                'code'       => '1',
             ],
            [
                'language'   => 'Spanish',
                'short_name' => 'ESP',
                'full_name'  => 'Kingdom of Spain',
                'code'       => '34',
             ],
            [
                'language'   => 'French',
                'short_name' => 'FRA',
                'full_name'  => 'French Republic',
                'code'       => '33',
             ],
            [
                'language'   => 'German',
                'short_name' => 'GER',
                'full_name'  => 'Federal Republic of Germany',
                'code'       => '49',
             ],
            [
                'language'   => 'Chinese',
                'short_name' => 'CHN',
                'full_name'  => 'People\'s Republic of China',
                'code'       => '86',
             ],
            [
                'language'   => 'Japanese',
                'short_name' => 'JPN',
                'full_name'  => 'State of Japan',
                'code'       => '81',
             ],
            [
                'language'   => 'Russian',
                'short_name' => 'RUS',
                'full_name'  => 'Russian Federation',
                'code'       => '7',
             ],
            [
                'language'   => 'Portuguese',
                'short_name' => 'BRA',
                'full_name'  => 'Federative Republic of Brazil',
                'code'       => '55',
             ],
            [
                'language'   => 'Hindi',
                'short_name' => 'IND',
                'full_name'  => 'Republic of India',
                'code'       => '91',
             ],
            [
                'language'   => 'Arabic',
                'short_name' => 'EGY',
                'full_name'  => 'Arab Republic of Egypt',
                'code'       => '20',
             ],
         ];

        // Insert each size into the database
        foreach ($countries as $c) {
            CountryCode::create($c);
        }
    }
}
