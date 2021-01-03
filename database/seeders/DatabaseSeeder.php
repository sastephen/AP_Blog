<?php

namespace Database\Seeders;

use App\Models\User;
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
        // \App\Models\User::factory(10)->create();
        \App\Models\Post::factory(25)->create();
        \App\Models\Category::factory(5)->create();

        // $this->call([
        //     UserSeeder::class,
        //     PostSeeder::class,
        // ]);

        User::factory()->create([
            "name" => "Super Admin",
            "email" => "admin@mail.com"
        ]);

        User::factory()->create([
            "name" => "Stephen",
            "email" => "steve@mail.com"
        ]);

        User::factory()->create([
            "name" => "Samuel",
            "email" => "sam@mail.com"
        ]);
    }
}
