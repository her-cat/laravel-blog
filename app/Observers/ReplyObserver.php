<?php

namespace App\Observers;

use App\Models\Reply;

class ReplyObserver
{
    public function created(Reply $reply)
    {
        $reply->article->reply_count = $reply->article->replies->count();
        $reply->article->save();
    }
}
