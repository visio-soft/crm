<?php

namespace Modules\CRM\database\seeders;

use Illuminate\Database\Seeder;

class CRMDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ProductSeeder::class,
            EmailTemplateSeeder::class,
        ]);
    }
}
