<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = [
            [
                'product' => 'Gamis Palestine',
                'stock' => '300',
                'product_date' => date('2021-07-23')
            ],
            [
                'product' => 'Kemeja Koko',
                'stock' => '100',
                'product_date' => date('2021-07-07')
            ],
            [
                'product' => 'Kerudung Instan',
                'stock' => '150',
                'product_date' => date('2021-07-10')
            ]
        ];

        foreach ($product as $product) {
            Product::create($product);
        }
    }
}
