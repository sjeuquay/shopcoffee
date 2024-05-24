<?php

namespace Database\Seeders;

use App\Models\Equipment\Branch;
use App\Models\Equipment\Equipment;
use App\Models\Equipment\Logs;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    public function run(): void
    {
        Branch::truncate();
        Equipment::truncate();
        Logs::truncate();

        Branch::factory(2)
            ->has(
                Equipment::factory(2), 'equipments')
            ->create();
    }
}
