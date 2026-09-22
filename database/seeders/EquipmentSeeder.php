<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Equipment;

class EquipmentSeeder extends Seeder
{
    public function run(): void
    {
        Equipment::create([
            'name' => 'Tenda Dome 4P',
            'category' => 'Tenda',
            'daily_rental_rate' => 60000,
            'total_stock' => 15,
        ]);

        Equipment::create([
            'name' => 'Kompor Portable Ultralight',
            'category' => 'Alat Masak',
            'daily_rental_rate' => 20000,
            'total_stock' => 25,
        ]);
    }
}