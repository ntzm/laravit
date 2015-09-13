<div class="card" data-sub="{{ $post->sub->name }}" data-slug="{{ $post->slug }}">
    <div class="card-block">

        <h4 class="card-title">
            <a href="{{ Helper::isValidUrl($post->content) ? $post->content : route('sub.post.show', [$post->sub->name, $post->slug]) }}">
                {{ $post->title }}
            </a>
        </h4>
        <h6 class="card-subtitle">
            @choice('general.count.points', $score)
            <span class="text-muted">{{ $post->created_at->diffForHumans() }}</span>
        </h6>
        @if(!empty($embedHtml))
            </div>
                {!! $embedHtml !!}
            <div class="card-block">
        @endif
        @unless(Helper::isValidUrl($post->content))
            <div class="card-text">
                {!! Helper::markdownToHtml($post->content) !!}
            </div>
        @endunless
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
</div>
