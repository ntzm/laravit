<div class="panel panel-default">
    <div class="panel-body">
        <a href="{{ route('users.show', $comment->user->username) }}">{{ $comment->user->username }}</a>
        <p>{{ $comment->content }}</p>
    </div>
</div>
