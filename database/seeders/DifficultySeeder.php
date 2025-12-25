<?php

namespace Database\Seeders;

use App\Models\Difficulty;
use Illuminate\Database\Seeder;

class DifficultySeeder extends Seeder
{
    public function run(): void
    {
        $names = [
            'Easy',
            'Medium',
            'Hard',
        ];

        foreach ($names as $name) {
            Difficulty::firstOrCreate(['name' => $name]);
        }
    }
}

