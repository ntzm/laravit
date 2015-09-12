<div class="card card-block">
    <p class="card-subtitle">
        @choice('general.count.points', $score)
        <span class="text-muted">{{ $comment->created_at->diffForHumans() }}</span>
    </p>
    <div class="card-text">
        {!! Helper::markdownToHtml($comment->content) !!}
    </div>
    <a class="card-link" href="{{ route('user.show', $comment->user->username) }}">
        <i class="fa fa-user"></i>
        {{ $comment->user->username }}
    </a>
    @if(Auth::check())
        <hr>
        @include('partials.vote-buttons')
        <button class="btn btn-primary">Reply</button>
    @endif
    @if($comment->children()->exists())
        <hr>
        @include('partials.comments', ['comments' => $comment->children])
    @endif
</div>
