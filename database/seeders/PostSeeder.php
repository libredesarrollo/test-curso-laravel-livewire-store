<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 700; $i++) {

            $title = Str::random(rand(3, 50));

            Post::create(
                [
                    'title' => $title,
                    'content' => Str::random(rand(2, 500)),
                    'description' => Str::random(rand(2, 150)),
                    'posted' => array("yes", "not")[rand(0, 1)],
                    'type' => ['advert', 'post', 'courses', 'movies'][rand(0, 1)],
                    'slug' => str($title)->slug(),
                    'category_id' => Category::inRandomOrder()->first()->id,
                    'date' => Carbon::today()->subDays(rand(0, 720)),
                ]
            );
        }
    }
}
