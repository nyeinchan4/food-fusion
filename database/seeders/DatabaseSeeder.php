<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory()->create([
        //     'first_name' => 'Test',
        //     'last_name' => 'User',
        //     'email' => 'test@example.com',
        //     'is_admin' => false,
        // ]);

        $this->call([
            CuisineTypeSeeder::class,
            DietaryTypeSeeder::class,
            DifficultySeeder::class,
            UserSeeder::class,
            ResourceCategorySeeder::class,
            ResourceSeeder::class,
            PostSeeder::class,
            RecipeSeeder::class,
            ContactSeeder::class,
        ]);
    }
}
