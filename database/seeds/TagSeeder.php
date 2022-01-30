<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Community', 'Front-End-Devs', 'Back-End-Devs'];

        foreach ($tags as $tag) {
            $_tag = new Tag();
            $_tag->name = $tag;
            $_tag->save();
        }
    }
}