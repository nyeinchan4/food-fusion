<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'title' => 'Summer Cooking Masterclass',
                'description' => 'Join our expert chefs for an immersive cooking experience featuring seasonal summer ingredients. Learn professional techniques, knife skills, and plating presentations. Perfect for home cooks looking to elevate their culinary game. Limited spots available!',
                'event_date' => Carbon::now()->addDays(15)->setTime(14, 0),
                'location' => 'Food Fusion Culinary Center, Downtown',
                'is_active' => true,
                'display_order' => 1,
                'image_path' => 'events/summer-event.jpg',
            ],
            [
                'title' => 'Italian Pasta Making Workshop',
                'description' => 'Discover the art of authentic Italian pasta making from scratch. Learn to create fresh fettuccine, ravioli, and gnocchi using traditional techniques passed down through generations. Includes wine pairing session and recipe booklet.',
                'event_date' => Carbon::now()->addDays(22)->setTime(18, 30),
                'location' => 'Little Italy Community Kitchen',
                'is_active' => true,
                'display_order' => 2,
                'image_path' => 'events/italian-event.avif',
            ],
            [
                'title' => 'Farm-to-Table Dinner Experience',
                'description' => 'Experience a unique 5-course dinner prepared with locally sourced ingredients from partner farms. Meet the farmers, learn about sustainable agriculture, and enjoy an evening of exceptional food and community. Vegetarian and vegan options available.',
                'event_date' => Carbon::now()->addDays(30)->setTime(19, 0),
                'location' => 'Green Valley Farm & Restaurant',
                'is_active' => true,
                'display_order' => 3,
                'image_path' => 'events/farm-to-table-event.jpg',
            ],
            [
                'title' => 'Asian Fusion Street Food Festival',
                'description' => 'Explore the vibrant flavors of Asian street food with live cooking demonstrations, tastings from 20+ vendors, and interactive workshops. From Korean BBQ to Thai noodles, Vietnamese banh mi to Japanese takoyaki - a culinary journey awaits!',
                'event_date' => Carbon::now()->addDays(45)->setTime(11, 0),
                'location' => 'Central Park Pavilion',
                'is_active' => true,
                'display_order' => 4,
                'image_path' => 'events/asian-street-food-event.jpg',
            ],
            [
                'title' => 'Baking & Pastry Fundamentals',
                'description' => 'Master the basics of baking with our comprehensive workshop covering breads, cakes, and pastries. Learn about ingredient science, proper measurements, and troubleshooting common baking problems. Take home your delicious creations!',
                'event_date' => Carbon::now()->addDays(38)->setTime(10, 0),
                'location' => 'Sweet Dreams Bakery School',
                'is_active' => true,
                'display_order' => 5,
                'image_path' => 'events/baking-event.jpeg',
            ],
            [
                'title' => 'Wine & Cheese Pairing Evening',
                'description' => 'An elegant evening exploring the perfect marriage of wine and cheese. Our sommelier will guide you through 6 wine selections paired with artisanal cheeses from around the world. Learn tasting techniques and pairing principles.',
                'event_date' => Carbon::now()->addDays(52)->setTime(19, 30),
                'location' => 'The Wine Cellar, Harbor District',
                'is_active' => true,
                'display_order' => 6,
                'image_path' => 'events/wine-event.jpeg',
            ],
            [
                'title' => 'Healthy Meal Prep Workshop',
                'description' => 'Learn to prepare a week\'s worth of nutritious, delicious meals in just one session. Focus on balanced nutrition, portion control, and time-saving techniques. Includes meal planning templates and storage tips for busy professionals.',
                'event_date' => Carbon::now()->addDays(8)->setTime(13, 0),
                'location' => 'Wellness Kitchen Studio',
                'is_active' => true,
                'display_order' => 7,
                'image_path' => 'events/healthy-event.webp',
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
