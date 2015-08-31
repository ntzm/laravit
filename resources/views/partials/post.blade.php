<div class="panel panel-default">
    <div class="panel-heading"><a href="{{ $post->content }}">{{ $post->title }}</a></div>
    <div class="panel-body">
        <p>submitted {{ $post->created_at->diffForHumans() }} by <a href="{{ route('users.show', $post->user->username) }}">{{ $post->user->username }}</a> to <a href="{{ route('subs.show', $post->sub->name) }}">/sub/{{ $post->sub->name }}</a></p>
        <a href="{{ route('subs.posts.show', [$post->sub->name, $post->slug]) }}">{{ $post->comments()->count() }} comment{{ $post->comments()->count() ? '' : 's' }}</a>
    </div>
</div>
