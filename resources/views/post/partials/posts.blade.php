@if($posts->isEmpty())
    @include('partials.nothing')
@else
    @include('partials.sort')
    @foreach($posts as $post)
        @include('post.partials.post', compact('post'))
    @endforeach
    {!! $posts->render() !!}
@endif
