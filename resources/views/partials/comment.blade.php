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
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-{{ $voteValue == 1 ? 'primary' : 'secondary' }}-outline" data-vote="1">
                <i class="fa fa-thumbs-up"></i>
            </button>
            <button type="button" class="btn btn-{{ $voteValue == -1 ? 'primary' : 'secondary' }}-outline" data-vote="-1">
                <i class="fa fa-thumbs-down"></i>
            </button>
        </div>
        <button class="btn btn-primary">Reply</button>
    @endif
    @if($comment->children()->exists())
        <hr>
        @include('partials.comments', ['comments' => $comment->children])
    @endif
</div>
