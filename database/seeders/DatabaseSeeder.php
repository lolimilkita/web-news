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

        // \App\Models\User::factory()->create([
        //     'username' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('rahasiabgt'),
        //     'firstname' => 'admin',
        // ]);

        \App\Models\User::factory()->create([
            'username' => 'catur',
            'email' => 'catur@gmail.com',
            'password' => bcrypt('rahasiabgt'),
            'firstname' => 'catur',
        ]);
    }
}
