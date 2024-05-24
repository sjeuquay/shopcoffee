<?php

namespace Database\Seeders;

use App\Models\Product\Product;
use App\Models\Product\ProductSpecification;
use App\Models\Product\Ingredient;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        ProductSpecification::truncate();

        Product::factory(20)
            ->has(ProductSpecification::factory(1), 'productSpecification')
            ->create();
    }
}
