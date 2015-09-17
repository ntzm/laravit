@if($posts->isEmpty())
    @include('partials.nothing')
@else
    @include('partials.sort')
    @foreach($posts as $post)
        @include('post.partials.post', compact('post'))
    @endforeach
    {!! $posts->appends('sort', Request::get('sort'))->render() !!}
@endif
