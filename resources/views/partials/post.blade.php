<div class="panel panel-default" data-sub="{{ $post->sub->name }}" data-slug="{{ $post->slug }}">
    <div class="panel-heading">
        <h4>
            <a href="{{ Helper::isValidUrl($post->content) ? $post->content : route('subs.posts.show', [$post->sub->name, $post->slug]) }}">
                {{ $post->title }}
            </a>
        </h4>
    </div>
    <div class="panel-body">
        @unless(Helper::isValidUrl($post->content))
            <p>{!! Helper::markdownToHtml($post->content) !!}</p>
            <hr>
        @endunless
        <p>
            submitted {{ $post->created_at->diffForHumans() }}
            by <a href="{{ route('users.show', $post->user->username) }}">{{ $post->user->username }}</a>
            to <a href="{{ route('subs.show', $post->sub->name) }}">/sub/{{ $post->sub->name }}</a>
        </p>
        @choice('general.count.points', $score)
        <a href="{{ route('subs.posts.show', [$post->sub->name, $post->slug]) }}">
            @choice('general.count.comments', $post->comments()->count())
        </a>
        @if(Auth::check())
            <hr>
            <div class="btn-group" role="group">
                <button type="button" class="btn {{ $voteValue == 1 ? 'btn-info' : 'btn-default' }}" data-vote="1">
                    <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn {{ $voteValue == -1 ? 'btn-info' : 'btn-default' }}" data-vote="-1">
                    <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>
                </button>
            </div>
        @endif
    </div>
</div>
