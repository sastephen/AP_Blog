<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Post::factory(20)->create();
        \App\Models\Category::factory(5)->create();

        $this->call([
            UserSeeder::class,
            // PostSeeder::class,
        ]);
    }
}
