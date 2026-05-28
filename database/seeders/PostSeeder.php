<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        $user = User::firstOrCreate(['email' => 'admin@portal.com'], [
            'name' => 'Admin',
            'password' => bcrypt('password'),
        ]);

        $categories = ['Edukasi', 'Teknologi', 'Olahraga', 'Kuliner'];
        foreach ($categories as $name) {
            Category::firstOrCreate(['name' => $name], ['slug' => Str::slug($name)]);
        }

        $allCategories = Category::all();
        for ($i = 1; $i <= 20; $i++) {
            $title = $faker->sentence(5);
            Post::create([
                'user_id' => $user->id,
                'category_id' => $allCategories->random()->id,
                'title' => $title,
                'slug' => Str::slug($title) . '-' . $i,
                'body' => $faker->paragraphs(3, true),
                'image' => 'https://picsum.photos/seed/'.$i.'/600/400',
            ]);
        }
    }
}