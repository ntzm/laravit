<div class="panel panel-default" data-slug="{{ $post->slug }}">
    <div class="panel-heading">
        <a href="{{ Helper::isValidUrl($post->content) ? $post->content : route('subs.posts.show', [$post->sub->name, $post->slug]) }}">
            <h4>{{ $post->title }}</h4>
        </a>
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
        <a href="{{ route('subs.posts.show', [$post->sub->name, $post->slug]) }}">
            {{ $post->comments()->count() }} comment{{ $post->comments()->count() ? '' : 's' }}
        </a>
        <hr>
        <button type="button" class="btn btn-default" data-vote="1">
            <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
        </button>
        SCORE
        <button type="button" class="btn btn-default" data-vote="-1">
            <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>
        </button>
    </div>
</div>
