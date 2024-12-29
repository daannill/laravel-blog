<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();

        Post::factory(20)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        User::create([
            'name' => 'Daniel Adi',
            'username' => 'daannilll',
            'email' => 'danieladi.danieladi@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        // User::create([
        //     'name' => 'Doddy',
        //     'email' => 'doddy@gmail.com',
        //     'password' => bcrypt('12345'),
        // ]);

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet in ut officiis sed',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p><p>Amet in ut officiis sed, nobis dolorum suscipit hic illum eos odio ad soluta voluptatibus a incidunt. Eveniet inventore nobis rem omnis.</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet in ut officiis sed',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p><p>Amet in ut officiis sed, nobis dolorum suscipit hic illum eos odio ad soluta voluptatibus a incidunt. Eveniet inventore nobis rem omnis.</p>',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}
