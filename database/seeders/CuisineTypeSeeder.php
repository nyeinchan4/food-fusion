<?php

namespace Database\Seeders;

use App\Models\CuisineType;
use Illuminate\Database\Seeder;

class CuisineTypeSeeder extends Seeder
{
    public function run(): void
    {
        $names = [
            'Italian',
            'Chinese',
            'Indian',
            'Mexican',
            'Thai',
            'Burmese',
        ];

        foreach ($names as $name) {
            CuisineType::firstOrCreate(['name' => $name]);
        }
    }
}

