<?php

namespace Database\Seeders;

use App\Models\Vendor\Contact;
use App\Models\Vendor\Vendor;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Vendor::truncate();
        // Contact::truncate();
        Vendor::factory(5)
            ->has(Contact::factory(3), 'contact')
            ->create();
    }
}
