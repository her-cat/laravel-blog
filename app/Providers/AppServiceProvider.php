<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Reply;
use App\Observers\ArticleObserver;
use App\Observers\ReplyObserver;
use App\Validators\UsernameValidator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $validators = [
        'username' => UsernameValidator::class,
    ];

    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        foreach ($this->validators as $rule => $validator) {
            Validator::extend($rule, "{$validator}@validate");
        }

        Article::observe(ArticleObserver::class);
        Reply::observe(ReplyObserver::class);
    }
}
