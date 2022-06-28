<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
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
        User::create([
            'name' => 'dindan romadhoni',
            'username' => 'dindan.dattebayo',
            'email' => 'adrkun@gmail.com',
            'password' => bcrypt('password')

        ]);
        User::factory(3)->create();

        Category::create([
            'nama' => 'Web Programming',
            'slug' => 'web-programming'
        ]);
        Category::create([
            'nama' => 'Web Design',
            'slug' => 'web-design'
        ]);
        Category::create([
            'nama' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();
    }
}
