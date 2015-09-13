<div class="card card-block" data-sub="{{ $post->sub->name }}" data-slug="{{ $post->slug }}">
    @if(!empty($post->thumbnail_url))
        <img class="img-thumbnail pull-left" width="100" src="{{ asset($post->thumbnail_url) }}">
    @endif
    <h4 class="card-title">
        <a href="{{ Helper::isValidUrl($post->content) ? $post->content : route('sub.post.show', [$post->sub->name, $post->slug]) }}">
            {{ $post->title }}
        </a>
    </h4>
    <h6 class="card-subtitle">
        @choice('general.count.points', $score)
        <span class="text-muted">{{ $post->created_at->diffForHumans() }}</span>
    </h6>
    <div class="card-text">
        @if(Helper::isValidUrl($post->content))
            {!! $embedHtml !!}
        @else
            {!! Helper::markdownToHtml($post->content) !!}
        @endif
    </div>
    <a class="card-link" href="{{ route('sub.post.show', [$post->sub->name, $post->slug]) }}">
        <i class="fa fa-comments"></i>
        @choice('general.count.comments', $post->comments()->count())
    </a>
    <a class="card-link" href="{{ route('sub.show', $post->sub->name) }}">
        <i class="fa fa-tag"></i>
        {{ $post->sub->name }}
    </a>
    <a class="card-link" href="{{ route('user.show', $post->user->username) }}">
        <i class="fa fa-user"></i>
        {{ $post->user->username }}
    </a>
    @if(Auth::check())
        <hr>
        @include('partials.vote-buttons', compact('voteValue'))
    @endif
</div>
