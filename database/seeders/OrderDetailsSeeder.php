<?php

namespace Database\Seeders;

use App\Models\Order\OrderDetails;
use Illuminate\Database\Seeder;

class OrderDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderDetails::factory()->count(20)->create();
    }
}
