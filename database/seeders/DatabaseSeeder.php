<?php

namespace Database\Seeders;

use App\Models\Toko;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Toko::factory(10)->create();
        
        // User::factory(5)->has(Toko::factory(10))->create();

        User::factory()->has(Toko::factory(20))->create([
            'name' => 'fino',
            'email' => 'fitranovtariadi151@gmail.com',
            'password' => '123456789'
        ]);
        User::factory()->has(Toko::factory(20))->create([
            'name' => 'fino',
            'email' => 'rio151@gmail.com',
            'password' => '123456789'
        ]);
    }
}
