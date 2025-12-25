<?php

namespace Database\Seeders;

use App\Models\DietaryType;
use Illuminate\Database\Seeder;

class DietaryTypeSeeder extends Seeder
{
    public function run(): void
    {
        $names = [
            'Vegan',
            'Vegetarian',
            'Gluten Free',
            'Keto',
        ];

        foreach ($names as $name) {
            DietaryType::firstOrCreate(['name' => $name]);
        }
    }
}

