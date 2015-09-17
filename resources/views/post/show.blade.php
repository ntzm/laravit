@extends('template')

@section('title', $post->title)

@section('head')
    @include('partials.meta', [
        'title'       => $post->title,
        'description' => $post->comments->count() . ' comments so far on Laravit',
    ])
@endsection

@section('content')
    @include('post.partials.post', compact('post'))
    <h2>Comments</h2>
    @if (Auth::check())
        <div class="row">
            <div class="col-lg-6">
                <form method="post" action="{{ route('sub.post.comment.store', [$post->sub->name, $post->slug]) }}">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="content">New comment</label>
                        <textarea rows="10" class="form-control" name="content" id="content" data-preview="#content-preview" data-markdown>{{ old('content') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <hr>
    @endif
    @include('comment.partials.comments', ['comments' => $post->comments()->noParent()->get()])
@endsection
