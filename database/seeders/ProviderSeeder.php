<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Provider;
class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provider = new Provider;
        $provider->name = "Amazon";
        $provider->email = "amazon@gmail.com";
        $provider->phone = 983412345;
        $provider->save();

        $provider2 = new Provider;
        $provider2->name = "MercaBlanca S.L";
        $provider2->email = "mercablanca@gmail.com";
        $provider2->phone = 922922922;
        $provider2->save();
    }
}
