<?php

namespace Database\Seeders;

use App\Models\Product\SizeType;
use Illuminate\Database\Seeder;

class SizeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SizeType::truncate();

        // Define the sizes to insert
        $sizeTypes = [
            'XS',
            'S',
            'M',
            'L',
            'XL',
            'XXL',
        ];

        // Insert each size into the database
        foreach ($sizeTypes as $type) {
            SizeType::create(['description' => $type, 'is_default' => 0]);
        }
    }
}
