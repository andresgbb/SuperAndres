<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Zumo de Naranja',
                'description' => 'Zumo de naranja recien exprimido',
                'price' => 2.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pasta de dientes',
                'description' => 'Pasta de dientes colgate',
                'price' => 1.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Comida para perrors',
                'description' => 'Comida para perros grandes',
                'price' => 10.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Carne de ternera',
                'description' => 'Carne de ternera de 500g',
                'price' => 11.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'pinchos de pollo',
                'description' => 'dos pinchos de carne ',
                'price' => 4.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Monster',
                'description' => 'bebida energetica monster lata verde ',
                'price' => 1.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paquete de oreo',
                'description' => 'Caja de paquetes de oreo ',
                'price' => 6.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chorizo',
                'description' => 'Embutido de cerdo ',
                'price' => 1.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
