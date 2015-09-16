@if($posts->isEmpty())
    @include('partials.nothing')
@else
    @include('partials.sort')
    <div class="card-columns">
        @foreach($posts as $post)
            @include('post.partials.post', compact('post'))
        @endforeach
    </div>
    {!! $posts->render() !!}
@endif
