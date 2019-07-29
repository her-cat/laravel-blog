<?php

use App\Models\Article;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
{
    public function run()
    {
        $user_ids = User::all()->pluck('id')->toArray();
        $article_ids = Article::all()->pluck('id')->toArray();

        $faker = app(Faker\Generator::class);

        $each_callback = function ($reply, $index) use ($user_ids, $article_ids, $faker) {
            $reply->user_id = $faker->randomElement($user_ids);
            $reply->article_id = $faker->randomElement($article_ids);
        };

        $replies = factory(Reply::class)
            ->times(1000)
            ->make()
            ->each($each_callback)
            ->toArray();

        Reply::insert($replies);
    }
}
