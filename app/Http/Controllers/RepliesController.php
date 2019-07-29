<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReplyRequest;
use App\Models\Reply;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(ReplyRequest $request, Reply $reply)
    {
        $content = clean($request->get('content'), 'user_article_body');
        if (empty($content)) {
            return redirect()->back()->with('danger', '评论内容错误!');
        }

        $reply->content = $content;
        $reply->user_id = \Auth::id();
        $reply->article_id = $request->article_id;
        $reply->save();

        return redirect($reply->article->link())->with('success', '评论成功!');
    }

    public function destroy(Reply $reply)
    {
        $this->authorize('destroy', $reply);
        $reply->delete();

        return redirect()->route('replies.index')->with('success', '评论删除成功!');
    }
}
