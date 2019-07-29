<ul class="list-unstyled">
    @foreach($replies as $index => $reply)
        <li class="media" name="reply{{ $reply->id }}" id="reply{{ $reply->id }}">
            <div class="media-left">
                <a href="{{ $reply->user->link() }}">
                    <img class="media-object img-thumbnail mr-3" src="{{ $reply->user->avatar }}" alt="{{ $reply->user->name }}" style="height: 48px; width: 48px;">
                </a>
            </div>

            <div class="media-body">
                <div class="media-heading mt-0 mb-1 text-secondary">
                    <a href="{{ $reply->user->link() }}" title="{{ $reply->user->name }}">
                        {{ $reply->user->name }}
                    </a>
                    <span class="text-secondary"> • </span>
                    <span class="meta text-secondary">{{ $reply->created_at->diffForHumans() }}</span>
                    {{-- 删除回复按钮 --}}
                    <span class="meta float-right">
                        <a title="删除回复">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </span>
                </div>
                <div class="reply-content text-secondary">
                    {!! $reply->content !!}
                </div>
            </div>
        </li>

        @if (!$loop->last)
            <hr>
        @endif
    @endforeach
</ul>