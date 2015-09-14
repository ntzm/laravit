@if($posts->isEmpty())
    @include('partials.nothing')
@else
    <div class="card-columns">
        @foreach($posts as $post)
            @include('post.partials.post', compact('post'))
        @endforeach
    </div>
    {!! $posts->render() !!}
@endif
