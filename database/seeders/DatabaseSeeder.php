<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $user = User::firstOrCreate(['email' => 'admin@admin.com'], [
            'name' => 'Sallie Marsha',
            'email' => 'salliemarsha49@gmail.com',
            'password' => bcrypt('#slayolay!'),
            'role' => 'admin',
        ]);

        $categories = ['Gaya Hidup', 'Teknologi', 'Olahraga', 'Politik'];

        foreach ($categories as $cat) {
            Category::firstOrCreate(['name' => $cat], ['slug' => Str::slug($cat)]);
        }

        $allCategories = Category::all();

        for ($i = 0; $i < 20; $i++) {
            $title = $faker->sentence(5);
            Post::create([
                'user_id' => $user->id,
                'category_id' => $allCategories->random()->id,
                'title' => $title,
                'slug' => Str::slug($title).'-'.Str::random(5),
                'body' => $faker->paragraphs(5, true),
                'image' => 'https://picsum.photos/seed/'.$i.'/800/600',
            ]);
        }
    }
}
