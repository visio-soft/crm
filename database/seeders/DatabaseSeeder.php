<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed CRM module data
        $this->call([
            \Modules\CRM\database\seeders\CRMDatabaseSeeder::class,
        ]);
    }
}
