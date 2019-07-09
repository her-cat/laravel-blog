<?php

namespace App\Observers;

use App\Models\Article;

class ArticleObserver
{
    public function saving(Article $article)
    {
        $article->excerpt = make_excerpt($article->content);
    }
}
