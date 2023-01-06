<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('rahasiabgt'),
            'firstname' => 'admin',
            'is_admin' => 1
        ]);

        \App\Models\User::factory()->create([
            'username' => 'catur',
            'email' => 'catur@gmail.com',
            'password' => bcrypt('rahasiabgt'),
            'firstname' => 'catur',
        ]);

        \App\Models\Post::factory()->create([
            'title' => 'Post number 1',
            'news' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse unde maxime modi minus, nihil deserunt. Laborum aspernatur praesentium pariatur dolorum.',
            'author' => 1,
        ]);

        \App\Models\Post::factory()->create([
            'title' => 'Post number 2',
            'news' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse unde maxime modi minus, nihil deserunt. Laborum aspernatur praesentium pariatur dolorum.',
            'author' => 1,
        ]);

        \App\Models\Comment::factory()->create([
            'post_id' => '1',
            'user_id' => '2',
            'comment_content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat, laborum.',
        ]);

        \App\Models\Comment::factory()->create([
            'post_id' => '1',
            'user_id' => '2',
            'comment_content' => 'Comment 2',
        ]);
    }
}
