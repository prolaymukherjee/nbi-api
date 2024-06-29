<?php

namespace Database\Seeders;

use App\Models\Idea;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IdeaSeeder extends Seeder
{

    public function run(): void
    {
        Idea::create([
            'user_id' => 1,
            'title' => 'First Idea',
            'description' => 'This is the short description of the first idea.',
            'is_published' => true,
            'published_at' => now(),
            'schedule_at' => now()->addDays(3),
        ]);

        Idea::create([
            'user_id' => 2,
            'title' => 'Second Idea',
            'description' => 'This is the short description of the second idea.',
            'is_published' => false,
            'published_at' => null,
            'schedule_at' => now()->addDays(3),
        ]);
    }
}
