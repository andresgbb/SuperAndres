<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User;
        $user->name = "Angabe";
        $user->email = "angabe@gmail.com";
        $user->password = Hash::make('1234');
        $user->save();

        $user2 = new User;
        $user2->name = "marc";
        $user2->email = "marc@gmail.com";
        $user2->password = Hash::make('1234');
        $user2->save();
    }
}
