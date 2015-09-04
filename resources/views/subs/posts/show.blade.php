@extends('template')

@section('title', $post->title)

@section('content')
    @include('partials.post', compact('post'))
    <h2>Comments</h2>
    @if (Auth::check())
        <div class="row">
            <div class="col-lg-6">
                <form method="post" action="{{ route('subs.posts.comments.store', [$post->sub->name, $post->slug]) }}">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="content">New comment</label>
                        <textarea rows="10" class="form-control" name="content" id="content" data-preview="#content-preview" data-markdown>{{ old('content') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-lg-6">
                <label>Preview</label>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a href="{{ route('users.show', Auth::user()->username) }}">{{ Auth::user()->username }}</a>
                        just now
                        <p id="content-preview"></p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    @endif
    @include('partials.comments', ['comments' => $post->comments()->noParent()->get()])
@endsection
