<?php

namespace Database\Seeders;

use App\Models\Setting\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::truncate();
        $statuses = [
            [ 'description' => 'active' ],
            [ 'description' => 'inactive' ],
            [ 'description' => 'shutdown' ],
            [ 'description' => 'onair' ],
         ];
        foreach ($statuses as $s) {
            Status::create($s);
        }

    }
}
