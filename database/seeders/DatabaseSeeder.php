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

        User::factory()->create([
            'name' => 'Test Gamer',
            'email' => 'gamer@example.com',
        ]);

        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Test Judge',
            'email' => 'judge@example.com',
            'role' => 'judge',
        ]);
    }
}
