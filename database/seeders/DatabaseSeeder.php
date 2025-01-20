<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ttg;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('VSCodeIsAwesome'),
            'remember_token' => Str::random(10),
        ]);

        ttg::factory(10)->create([
            'name' => fake()->name(),
            'description' => fake()->sentence(),
            'numberofplayers' => fake()->numberBetween(1, 10),
        ]);
    }
}
