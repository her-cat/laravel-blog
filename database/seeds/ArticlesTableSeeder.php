<?php

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_ids = User::all()->pluck('id')->toArray();

        $category_ids = Category::all()->pluck('id')->toArray();

        $faker = app(\Faker\Generator::class);

        $each_callback = function ($article, $index) use ($user_ids, $category_ids, $faker) {
            $article->user_id = $faker->randomElement($user_ids);
            $article->category_id = $faker->randomElement($category_ids);
        };

        $articles = factory(Article::class)
            ->times(100)
            ->make()
            ->each($each_callback);

        Article::insert($articles->toArray());
    }
}
