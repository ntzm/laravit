<div class="panel panel-default">
    <div class="panel-body">
        <a href="{{ route('users.show', $comment->user->username) }}">{{ $comment->user->username }}</a>
        @choice('general.count.points', $score)
        {{ $comment->created_at->diffForHumans() }}
        <p>{!! Helper::markdownToHtml($comment->content) !!}</p>
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
