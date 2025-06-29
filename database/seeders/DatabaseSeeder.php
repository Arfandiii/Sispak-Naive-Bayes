<?php

namespace Database\Seeders;

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

        $this->call([
            CareerSeeder::class,
            CareerStatementSeeder::class,
            RuleSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        // Tambah 10 user biasa
        User::factory(10)->create();
    }
    
}
