<div class="panel panel-default">
    <div class="panel-heading"><a href="{{ $post->content }}">{{ $post->title }}</a></div>
    <div class="panel-body">
        <p>submitted {{ $post->created_at->diffForHumans() }} by <a href="{{ route('users.show', $post->user->username) }}">{{ $post->user->username }}</a> to <a href="#">/sub/{{-- $post->sub->name --}}</a></p>
        <a href="#">{{ $post->comments()->count() }} comment{{ $post->comments()->count() ? '' : 's' }}</a>
    </div>
</div>