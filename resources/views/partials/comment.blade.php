<div class="panel panel-default">
    <div class="panel-body">
        <a href="{{ route('users.show', $comment->user->username) }}">{{ $comment->user->username }}</a>
        {{ $comment->created_at->diffForHumans() }}
        <p>{!! Helper::markdownToHtml($comment->content) !!}</p>
    </div>
</div>
