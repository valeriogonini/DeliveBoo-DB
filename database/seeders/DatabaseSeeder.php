<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Team_5',
            'email' => 'test@example.com',
            'last_name' => 'Boolean',

        ]);

        $this->call([
            // UserSeeder::class,
            RestaurantSeeder::class,
            TypeSeeder::class,
            DishSeeder::class

        ]);
    }
}
