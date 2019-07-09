<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    public function update(User $user, Article $article)
    {
        return $user->isAuthorOf($article);
    }

    public function destroy(User $user, Article $article)
    {
        return $user->isAuthorOf($article);
    }
}
