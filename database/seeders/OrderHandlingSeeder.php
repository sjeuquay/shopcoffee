<?php

namespace Database\Seeders;

use App\Models\Order\OrderHandling;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderHandlingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderHandling::factory()->count(3)->create();
    }
}
