@if (count($articles))
    <ul class="list-unstyled">
        @foreach($articles as $article)
            <li class="media">
                <div class="media-body">

                    <h4 class="media-heading mt-0 mb-1 title">
                        <a href="{{ route('articles.show', $article->id) }}" title="{{ $article->title }}" target="_blank">
                            {{ $article->title }}
                        </a>
                    </h4>

                    <p class="excerpt">
                        <a href="{{ route('articles.show', $article->id) }}" target="_blank">
                            {{ $article->excerpt }}
                        </a>
                    </p>

                    <small class="media-body meta text-secondary">
                        <span class="timeago" title="最后活跃于：{{ $article->updated_at }}">
                            <i class="far fa-clock"></i>
                            {{ $article->updated_at->diffForHumans() }}
                        </span>
                        <span> • </span>

                        <span class="text-secondary" href="#" title="{{ $article->category->name }}">
                            阅读数
                            {{ $article->view_count }}
                        </span>
                        <span> • </span>

                        <span class="text-secondary" href="#" title="{{ $article->category->name }}">
                            评论数
                            {{ $article->reply_count }}
                        </span>
                    </small>

                </div>
            </li>

            @if (!$loop->last)
                <hr>
            @endif
        @endforeach
    </ul>
@else
    <div class="empty-block">暂无数据 ~_~ </div>
@endif