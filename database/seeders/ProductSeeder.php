<?php

namespace Modules\CRM\database\seeders;

use Illuminate\Database\Seeder;
use Modules\CRM\app\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'CRM Software License',
                'description' => 'Annual license for our premium CRM software',
                'sku' => 'CRM-SOFT-001',
                'price' => 999.00,
                'cost' => 500.00,
                'category' => 'software',
                'is_active' => true,
                'stock_quantity' => 100,
            ],
            [
                'name' => 'Implementation Service',
                'description' => 'Professional implementation and setup service',
                'sku' => 'SRV-IMPL-001',
                'price' => 1500.00,
                'cost' => 750.00,
                'category' => 'service',
                'is_active' => true,
                'stock_quantity' => 0,
            ],
            [
                'name' => 'Training Package',
                'description' => '8-hour training package for your team',
                'sku' => 'TRN-PKG-001',
                'price' => 800.00,
                'cost' => 400.00,
                'category' => 'training',
                'is_active' => true,
                'stock_quantity' => 0,
            ],
            [
                'name' => 'Premium Support',
                'description' => 'Annual premium support package with 24/7 assistance',
                'sku' => 'SUP-PREM-001',
                'price' => 599.00,
                'cost' => 200.00,
                'category' => 'service',
                'is_active' => true,
                'stock_quantity' => 50,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
