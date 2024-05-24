<?php

namespace Database\Seeders;

use App\Models\Setting\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Currency::truncate();
        $currencies = [
            [
                'short_name'        => 'VND',
                'long_name'         => 'Viet Nam Dong',
                'USD_exchange_rate' => '0.00004',
             ],
            [
                'short_name'        => 'USD',
                'long_name'         => 'US Dollar',
                'USD_exchange_rate' => '1.00',
             ],
            [
                'short_name'        => 'EUR',
                'long_name'         => 'Euro',
                'USD_exchange_rate' => '1.18',
             ],
            [
                'short_name'        => 'JPY',
                'long_name'         => 'Japanese Yen',
                'USD_exchange_rate' => '0.0091',
             ],
            [
                'short_name'        => 'GBP',
                'long_name'         => 'British Pound',
                'USD_exchange_rate' => '1.31',
             ],
            [
                'short_name'        => 'AUD',
                'long_name'         => 'Australian Dollar',
                'USD_exchange_rate' => '0.77',
             ],
         ];
        // Insert each size into the database
        foreach ($currencies as $c) {
            Currency::create($c);
        }
    }
}
