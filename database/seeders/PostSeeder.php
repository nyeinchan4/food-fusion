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
        //
        Post::firstOrCreate([
            'user_id' => 1,
            'title' => 'Test Post Title',
            'content' => 'This is a test post. lorem ipsum dolor sit amet.',
        ]);
    }
}
