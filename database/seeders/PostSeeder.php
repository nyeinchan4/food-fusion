<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'user_id' => 1,
                'title' => 'My Grandmother\'s Traditional Mote Hin Gar Recipe',
                'content' => 'Today I want to share my grandmother\'s authentic mote hin gar recipe that has been passed down through generations. The secret is in the rice preparation - you need to soak it overnight and use freshly grated coconut. The fish should be steamed just right so it flakes perfectly when mixed with the rice. Don\'t forget the traditional spices: turmeric, ginger, and garlic paste. This dish brings back so many childhood memories of family gatherings in Yangon. What are your traditional family recipes?',
            ],
            [
                'user_id' => 2,
                'title' => 'Perfect Thai Green Curry - Restaurant Quality at Home!',
                'content' => 'After months of experimenting, I finally nailed the perfect Thai green curry! The key is using fresh Thai basil and making your own curry paste. I use green chilies, lemongrass, galangal, kaffir lime leaves, and shallots. The coconut milk quality makes a huge difference - use full-fat for the best results. I add chicken, eggplant, and bamboo shoots. Serve with jasmine rice and you\'ll feel like you\'re dining in Bangkok! Anyone else struggle with getting the right spice balance?',
            ],
            [
                'user_id' => 3,
                'title' => 'Quick 15-Minute Pasta That Changed My Weeknight Dinners',
                'content' => 'As a busy parent, I discovered this amazing pasta recipe that saves me every evening. While the pasta boils, I sauté garlic in olive oil, add cherry tomatoes, spinach, and a splash of white wine. Toss with the pasta, add parmesan cheese and fresh basil. The whole thing takes 15 minutes from start to finish! My kids actually eat their vegetables this way. What are your go-to quick dinner solutions?',
            ],
            [
                'user_id' => 1,
                'title' => 'The Science Behind Perfect Sourdough Bread',
                'content' => 'I\'ve been baking sourdough for 2 years now and wanted to share some scientific insights. The key is maintaining your starter at 75°F and feeding it consistently. I use a 1:1:1 ratio of starter:flour:water. For the dough, 75% hydration gives the best texture. Bulk fermentation for 4-6 hours, then shape and cold proof overnight. The steam in the oven creates that perfect crust. My starter is named "Bubbles" and is 3 years old! Share your sourdough stories below.',
            ],
            [
                'user_id' => 4,
                'title' => 'Vegan Tacos That Even Meat Lovers Will Enjoy',
                'content' => 'I created these amazing vegan tacos that converted my carnivore friends! I use seasoned lentils as the base, roasted sweet potatoes, and avocado crema. The magic is in the seasoning: cumin, smoked paprika, chili powder, and a touch of cinnamon. Top with pickled red onions, cilantro, and lime wedges. Serve in corn tortillas for the authentic experience. Even my dad who swore by beef tacos now requests these! What are your favorite plant-based protein alternatives?',
            ],
            [
                'user_id' => 2,
                'title' => 'Japanese Home Cooking: My Oyakodon Journey',
                'content' => 'Learning to make authentic oyakodon (chicken and egg rice bowl) has been my latest obsession. The technique seems simple but requires precision. The key is using dashi stock, mirin, and soy sauce in the right proportions. Cook the chicken first, then add sliced onions, and finally pour beaten eggs over everything. Don\'t overcook the eggs - they should be slightly runny. Garnish with scallions and shichimi togarashi. It\'s comfort food at its finest! What Japanese dishes should I try next?',
            ],
            [
                'user_id' => 3,
                'title' => 'Meal Prep Sunday: 5 Days of Healthy Lunches',
                'content' => 'I started meal prepping and it\'s been life-changing! Here\'s my weekly routine: Sunday I make quinoa bowls with roasted vegetables, chickpea curry, grilled chicken salads, lentil soup, and breakfast burritos. Everything gets portioned into glass containers. The secret is varying the flavors so you don\'t get bored - Mediterranean, Mexican, Asian, and Indian inspired dishes. This saves me $200/month on lunch and I\'m eating healthier! What are your meal prep strategies?',
            ],
            [
                'user_id' => 5,
                'title' => 'From Garden to Table: Fresh Herb Gardening Tips',
                'content' => 'I started a small herb garden on my balcony and the difference in my cooking is incredible! Basil, mint, rosemary, thyme, and parsley grow easily in pots. The key is good drainage and morning sun. I harvest in the morning when oils are strongest. Fresh basil in pasta, mint in tea, rosemary on roasted potatoes - the flavors are so much better than store-bought. Plus, it\'s cheaper and sustainable! What herbs do you grow at home?',
            ],
            [
                'user_id' => 4,
                'title' => 'The Perfect Chocolate Chip Cookie - Science and Soul',
                'content' => 'After 47 batches, I\'ve perfected my chocolate chip cookie recipe! The science: browned butter adds nutty flavor, bread flour gives chewy texture, and resting the dough 24 hours develops flavor. The soul: using high-quality chocolate chunks and a sprinkle of sea salt on top. Bake at 375°F for exactly 11 minutes for edges that are crisp but centers that stay soft. My family says these are better than bakery cookies! What\'s your secret ingredient for perfect cookies?',
            ],
            [
                'user_id' => 1,
                'title' => 'Cooking with Kids: Making Memories in the Kitchen',
                'content' => 'I started cooking with my 6-year-old daughter and it\'s been amazing for our bond! We make simple things like pizza, decorated cookies, and fruit salads. She loves measuring ingredients and mixing. Yes, it\'s messy and takes twice as long, but the confidence she\'s gained is priceless. She\'s now trying vegetables she refused before because she helped prepare them. We\'re making a recipe book with her drawings. How do you get kids involved in cooking?',
            ],
        ];

        foreach ($posts as $post) {
            Post::firstOrCreate($post);
        }
    }
}
