<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

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
             'name' => 'Nabila',
             'username' => 'nabilahawa',
             'email' => 'nabila@gmail.com',
             'password' => bcrypt('12345')
         ]);

         User::factory(3)->create();

        Category::create([
            'name' => 'Web Development',
            'slug' => 'web-development'
        ]);

        Category::create([
            'name' => 'UI/UX Design',
            'slug' => 'ui-ux-design'
        ]);
    
        Category::create([
            'name' => 'Software Development',
            'slug' => 'software-development'
        ]);

        Post::factory(20)->create();
    }
}
