<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {
            $post = new Post();
            $post->name = $faker->sentence();
            $post->image = $faker->imageUrl(300, 300, 'Posts');
            $post->slug = Str::slug($post->name);
            $post->save();
        }
    }
}