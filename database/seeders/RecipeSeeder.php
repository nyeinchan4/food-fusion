<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    public function run(): void
    {
        $recipes = [
            [
                'user_id' => 1,
                'title' => 'Mote Hin Khar',
                'description' => <<<TEXT
To make mote hin khar, Myanmar's national dish, you will prepare a rich, savory fish broth and serve it over rice vermicelli noodles with various garnishes. The key is the slow-simmered broth, thickened with rice or chickpea flour and infused with lemongrass, ginger, garlic, and fish. Below is a general recipe; specific measurements can be adjusted to personal taste.

Ingredients For the Broth Base:
- Fish: About 600g to 1kg of white fish, such as catfish or mrigal carp, cleaned.
- Aromatics: Onions, garlic, ginger, lemongrass stalks, and dried chilies.
- Seasoning: Turmeric powder, fish sauce, black pepper, and salt.
- Thickener: 1 cup chickpea flour or toasted rice flour, mixed with water.
- Optional: Sliced banana stem (soaked in salt water), whole shallots, and boiled duck or chicken eggs.

To Serve:
- Thin rice vermicelli noodles, cooked.
- Garnishes: Fresh cilantro, mint leaves, lime wedges, chili flakes, crispy fried split peas or fried garlic oil, and extra fish sauce.

Instructions:
1. Prepare the Fish and Broth: Boil the fish with lemongrass, ginger, turmeric, and fish sauce. Simmer until cooked. Debone and flake.
2. Create the Aromatic Paste and Fish Mixture: Sauté onions, garlic, ginger, lemongrass. Add fish and cook a few minutes.
3. Assemble and Simmer the Soup: Combine fish mixture with stock, thicken with chickpea/rice flour slurry, season to taste.
4. Serve: Place noodles in bowls, pour soup over, garnish, and enjoy.
TEXT,
                'image_path' => 'recipes/e4K8hAF7oRY3UYnNCvHdygpUEIyedEpiPKzinwW7.jpg',
                'cuisine_type_id' => 6,
                'dietary_type_id' => 1,
                'difficulty_id' => 2,
            ],
            [
                'user_id' => 1,
                'title' => 'Ohn Noe Noodle',
                'description' => <<<TEXT
Ohn No Khao Swe is a popular Burmese comfort dish featuring wheat noodles in a rich, creamy chicken and coconut milk broth thickened with chickpea flour.

Ingredients For the Broth:
- Chicken: 1 lb boneless chicken thighs or breast, cubed.
- Aromatics: Onion, garlic, ginger.
- Spices: Turmeric powder, paprika, optional chili powder.
- Liquids: Chicken stock, coconut milk, fish sauce.
- Thickener: Chickpea flour slurry.

For Serving & Garnishing:
- Noodles, hard-boiled eggs, lime, cilantro, shallots, fried onions.

Instructions:
1. Marinate chicken with fish sauce, turmeric, and salt.
2. Sauté onions, garlic, ginger until fragrant. Brown chicken with spices.
3. Simmer broth, thicken with chickpea slurry.
4. Stir in coconut milk, adjust seasoning.
5. Serve over cooked noodles with garnishes.
TEXT,
                'image_path' => 'recipes/2AAjehL9sfPSYu1Jt4ejipGc5Yzu4yXJyiwjllSn.jpg',
                'cuisine_type_id' => 6,
                'dietary_type_id' => 4,
                'difficulty_id' => 3,
            ],
            [
                'user_id' => 1,
                'title' => 'Pork Sticky Rice',
                'description' => <<<TEXT
"Pork kauk nyin" refers to Burmese sticky rice served with pork, a popular breakfast or street food dish.

Common preparations:
- Pork Curry: Served with sticky rice.
- Pork Skewers: Marinated, grilled, served with sticky rice.
- Pork Offal: Assorted skewers with sticky rice.

The sticky rice itself is steamed and sometimes mixed with boiled peas. Garnish with crispy fried onions or boiled eggs.
TEXT,
                'image_path' => 'recipes/bzVbm48A6ryzkQCHZXYMWhAesI9dVz8R3kV1oJWV.jpg',
                'cuisine_type_id' => 6,
                'dietary_type_id' => null,
                'difficulty_id' => 3,
            ],
            [
                'user_id' => 1,
                'title' => 'Shan Noodle',
                'description' => <<<TEXT
Making Shan Noodle (Shan Khao Swe), a staple of Burmese cuisine from Shan State, involves preparing a savory tomato-based meat sauce served over rice noodles with garnishes.

Ingredients:
- Noodles: Soak and boil rice noodles.
- Meat Sauce: Ground chicken or pork, tomatoes, onion, garlic, ginger, tomato paste, chili powder.
- Seasoning: Soy sauce, fish sauce, sugar, turmeric.
- Garnishes: Crushed peanuts, pickled mustard greens, fried garlic, spring onions, coriander.

Instructions:
1. Prepare noodles.
2. Cook meat sauce with aromatics and seasonings.
3. Assemble noodles and sauce, add garnishes.
TEXT,
                'image_path' => 'recipes/WI01Gecb7ylh2INtb2hFODrEUPJNjlDZNUtdA9bi.webp',
                'cuisine_type_id' => 6,
                'dietary_type_id' => null,
                'difficulty_id' => 2,
            ],
            [
                'user_id' => 1,
                'title' => 'Nan Gyi Thoke',
                'description' => <<<TEXT
Nan Gyi Thoke is a Burmese noodle salad made by combining thick rice noodles with rich chicken curry, chili oil, and garnishes, tossed with toasted chickpea flour.

Ingredients:
- Chicken curry: chicken, onion, garlic, ginger, fish sauce, turmeric, paprika.
- Salad base: thick noodles, chickpea flour, eggs, onions, cilantro, lime, optional cabbage or roasted peanuts.

Instructions:
1. Cook noodles.
2. Make chili oil.
3. Toast chickpea flour.
4. Prepare garnishes.
5. Cook chicken curry, mix with noodles and garnishes.
6. Serve immediately with optional broth on the side.
TEXT,
                'image_path' => 'recipes/cbbYJhdIk4mFplssA5Y8kUBjchTSwwzdoqbmYNQT.webp',
                'cuisine_type_id' => 6,
                'dietary_type_id' => null,
                'difficulty_id' => 2,
            ],
            [
                'user_id' => 1,
                'title' => 'Mala Xiang Guo (麻辣香锅)',
                'description' => <<<TEXT
🌶️ Mala Xiang Guo (麻辣香锅) — Spicy, Numbing, Stir-Fry Hot Pot. A Sichuan classic with meat, seafood, and vegetables stir-fried with chili, aromatics, and Sichuan peppercorns.

Ingredients:
- Proteins: pork belly or beef, shrimp.
- Vegetables: potatoes, broccoli, mushrooms, lotus root, bean curd sticks.
- Aromatics & Seasoning: garlic, ginger, dried chilies, doubanjiang, Sichuan peppercorns, soy sauce, sugar, Shaoxing wine.
- Garnish: cilantro, roasted peanuts, sesame seeds.

Instructions:
1. Cut and blanch ingredients.
2. Build Mala base in wok with aromatics and seasoning.
3. Stir-fry ingredients together.
4. Garnish and serve immediately with steamed rice.
TEXT,
                'image_path' => 'recipes/9MRXTJnKxzVGTP2h6wW9eeLzuQdwhKGhfPPGdhUq.jpg',
                'cuisine_type_id' => 2,
                'dietary_type_id' => null,
                'difficulty_id' => 3,
            ],
        ];

        foreach ($recipes as $data) {
            Recipe::updateOrCreate(
                ['title' => $data['title']],
                $data
            );
        }
    }
}
