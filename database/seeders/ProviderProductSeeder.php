<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Provider;
class ProviderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        $providers = Provider::all();

        foreach ($products as $product) {
            // Asigna cada producto a un proveedor aleatorio
            $product->providers()->attach($providers->random()->id);
        }
    }
}
