<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Product::create(['name' => 'Product 1', 'pdf_path' => 'pdfs/product1.pdf']);
        Product::create(['name' => 'Product 2', 'pdf_path' => 'pdfs/product2.pdf']);
        Product::create(['name' => 'Product 3', 'pdf_path' => 'pdfs/product3.pdf']);
    }
}
