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
            'title' => 'Knife Master Skills Tutorial',
            'category_id' => '1',
            'file_type' => 'mp4',
            'file_path' => 'resources/knife-mater-skill.mp4',
            'description' => 'Advanced knife techniques and cutting skills for home cooks. Learn professional cutting methods, knife safety, and essential culinary skills.'
        ]);

        Resource::create([
            'title' => 'Food Safety Checklist',
            'category_id' => '1',
            'file_type' => 'pdf',
            'file_path' => 'resources/food-safety-checklist.pdf',
            'description' => 'Essential food safety guidelines and kitchen hygiene practices. Comprehensive checklist for maintaining food safety standards in home cooking.'
        ]);

        Resource::create([
            'title' => 'Essential Spices Guide',
            'category_id' => '1',
            'file_type' => 'jpg',
            'file_path' => 'resources/essential-spices.jpg',
            'description' => 'Complete guide to essential cooking spices and their uses. Visual reference for common spices and their applications in various cuisines.'
        ]);

        // --- TASK 3.7: RENEWABLE ENERGY RESOURCES ---

        Resource::create([
            'title' => 'Solar Installation Guide',
            'category_id' => '2',
            'file_type' => 'pdf',
            'file_path' => 'resources/solar-installation-guide.pdf',
            'description' => 'Complete guide for residential solar panel installation. Step-by-step instructions, safety guidelines, and cost analysis for home solar systems.'
        ]);

        Resource::create([
            'title' => 'How Wind Generate Power Tutorial',
            'category_id' => '2',
            'file_type' => 'mp4',
            'file_path' => 'resources/how-wind-generate-power.mp4',
            'description' => 'Educational video on wind turbine technology and power generation. Learn how wind energy works and its environmental benefits.'
        ]);

        Resource::create([
            'title' => 'Green Energy Infographic',
            'category_id' => '2',
            'file_type' => 'png',
            'file_path' => 'resources/green-energy-infographic.png',
            'description' => 'Visual guide to renewable energy sources and sustainability. Comprehensive overview of green energy options and their impact.'
        ]);
    }
}