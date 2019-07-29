@include('shared._error')

<div class="reply-box mb-4">
    <form action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8">
        {{ csrf_field() }}
        <input type="hidden" name="article_id" value="{{ $article->id }}">
        <div class="form-group">
            <textarea class="form-control" name="content" rows="3" placeholder="分享你的见解~"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-share mr-1"></i> 回复</button>
    </form>
</div>
