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
            'Paleo',
            'Pescatarian',
            'Dairy Free',
            'Nut Free',
            'Low Carb',
            'Low Fat',
            'Low Sodium',
            'Sugar Free',
            'Whole30',
            'Mediterranean',
            'Raw Food',
            'Flexitarian',
            'Plant-Based',
            'Halal',
            'Kosher',
            'Diabetic Friendly',
            'Heart Healthy',
            'Kidney Friendly',
        ];

        foreach ($names as $name) {
            DietaryType::firstOrCreate(['name' => $name]);
        }
    }
}

