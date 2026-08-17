<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ResourceCategory;

class ResourceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ResourceCategory::firstOrCreate([
            'name' => 'Culinary',
        ]);
        ResourceCategory::firstOrCreate([
            'name' => 'Educational',
        ]);
    }
}
