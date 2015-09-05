<div class="card card-block" data-sub="{{ $post->sub->name }}" data-slug="{{ $post->slug }}">
    <h4 class="card-title">
        <a href="{{ Helper::isValidUrl($post->content) ? $post->content : route('subs.posts.show', [$post->sub->name, $post->slug]) }}">
            {{ $post->title }}
        </a>
    </h4>
    <h6 class="card-subtitle">
        @choice('general.count.points', $score)
        <span class="text-muted">{{ $post->created_at->diffForHumans() }}</span>
    </h6>
    @unless(Helper::isValidUrl($post->content))
        <div class="card-text">
            {!! Helper::markdownToHtml($post->content) !!}
        </div>
    @endunless
    <a class="card-link" href="{{ route('subs.posts.show', [$post->sub->name, $post->slug]) }}">
        <i class="fa fa-comments"></i>
        @choice('general.count.comments', $post->comments()->count())
    </a>
    <a class="card-link" href="{{ route('subs.show', $post->sub->name) }}">
        <i class="fa fa-tag"></i>
        {{ $post->sub->name }}
    </a>
    <a class="card-link" href="{{ route('users.show', $post->user->username) }}">
        <i class="fa fa-user"></i>
        {{ $post->user->username }}
    </a>
    @if(Auth::check())
        <hr>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-{{ $voteValue == 1 ? 'primary' : 'secondary' }}-outline" data-vote="1">
                <i class="fa fa-thumbs-up"></i>
            </button>
            <button type="button" class="btn btn-{{ $voteValue == -1 ? 'primary' : 'secondary' }}-outline" data-vote="-1">
                <i class="fa fa-thumbs-down"></i>
            </button>
        </div>
    @endif
</div>
