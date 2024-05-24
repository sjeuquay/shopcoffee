<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            VendorSeeder::class,
            SizeTypeSeeder::class,
            CurrencySeeder::class,
            OrdersSeeder::class,
            OrderHandlingSeeder::class,
            OrderDetailsSeeder::class,
            StatusOrderSeeder::class,
            EquipmentSeeder::class,
            StatusSeeder::class,
            ProductSeeder::class,
            ProductSpecificationSeeder::class,
            IngredientSeeder::class,
            CategorySeeder::class
         ]);
    }
}
