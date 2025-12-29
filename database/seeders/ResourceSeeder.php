<?php

namespace Database\Seeders;

use App\Models\Resource;
use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    public function run(): void
    {
        // --- TASK 3.6: CULINARY RESOURCES ---
        
        Resource::create([
            'title' => 'Advanced Knife Skills Masterclass',
            'category_id' => '1',
            'file_type' => 'video',
            'file_path' => 'resources/culinary/knife-skills.mp4',
            'description' => 'In 2025, downloadable cooking courses provide a comprehensive digital toolkit designed for offline mastery, moving beyond simple recipes to focus on core culinary principles. These programs typically include high-definition video masterclasses covering foundational skills like knife work, heat management, and plating, alongside interactive PDF workbooks that feature technique cheat sheets and standardized recipe cards'
        ]);

        Resource::create([
            'title' => 'Kitchen Safety & Hygiene Checklist',
            'category_id' => '1',
            'file_type' => 'pdf',
            'file_path' => 'resources/culinary/safety-guide.pdf',
            'description' => 'In 2025, downloadable cooking courses provide a comprehensive digital toolkit designed for offline mastery, moving beyond simple recipes to focus on core culinary principles. These programs typically include high-definition video masterclasses covering foundational skills like knife work, heat management, and plating, alongside interactive PDF workbooks that feature technique cheat sheets and standardized recipe cards'
        ]);

        Resource::create([
            'title' => 'Essential Herbs & Spices Chart',
            'category_id' => '1',
            'file_type' => 'image',
            'file_path' => 'resources/culinary/spice-chart.jpg',
            'description' => 'In 2025, downloadable cooking courses provide a comprehensive digital toolkit designed for offline mastery, moving beyond simple recipes to focus on core culinary principles. These programs typically include high-definition video masterclasses covering foundational skills like knife work, heat management, and plating, alongside interactive PDF workbooks that feature technique cheat sheets and standardized recipe cards'
        ]);

        // --- TASK 3.7: RENEWABLE ENERGY RESOURCES ---

        Resource::create([
            'title' => 'Solar Panel Installation Guide 2024',
            'category_id' => '2',
            'file_type' => 'pdf',
            'file_path' => 'resources/energy/solar-guide.pdf',
            'description' => 'In 2025, downloadable cooking courses provide a comprehensive digital toolkit designed for offline mastery, moving beyond simple recipes to focus on core culinary principles. These programs typically include high-definition video masterclasses covering foundational skills like knife work, heat management, and plating, alongside interactive PDF workbooks that feature technique cheat sheets and standardized recipe cards'

        ]);

        Resource::create([
            'title' => 'How Wind Turbines Generate Power',
            'category_id' => '2',
            'file_type' => 'video',
            'file_path' => 'resources/energy/wind-energy-explained.mp4',
            'description' => 'In 2025, downloadable cooking courses provide a comprehensive digital toolkit designed for offline mastery, moving beyond simple recipes to focus on core culinary principles. These programs typically include high-definition video masterclasses covering foundational skills like knife work, heat management, and plating, alongside interactive PDF workbooks that feature technique cheat sheets and standardized recipe cards'

        ]);

        Resource::create([
            'title' => 'The Future of Green Energy Infographic',
            'category_id' => '2',
            'file_type' => 'image',
            'file_path' => 'resources/energy/green-future.png',
            'description' => 'In 2025, downloadable cooking courses provide a comprehensive digital toolkit designed for offline mastery, moving beyond simple recipes to focus on core culinary principles. These programs typically include high-definition video masterclasses covering foundational skills like knife work, heat management, and plating, alongside interactive PDF workbooks that feature technique cheat sheets and standardized recipe cards'

        ]);
    }
}