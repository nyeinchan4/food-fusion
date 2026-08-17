<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Contact::firstOrCreate([
            'email' => 'contact@example.com',
            'name' => 'John Doe',
            'subject' => 'Test Subject',
            'message' => 'This is a test message.',
        ]);
    }
}
