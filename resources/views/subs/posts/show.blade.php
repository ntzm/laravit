@extends('template')

@section('title', $post->title)

@section('content')
    @include('partials.post', compact('post'))
    <h2>Comments</h2>
    <div class="row">
        <div class="col-lg-6">
            <form method="post" action="{{ route('subs.posts.comments.store', [$post->sub->name, $post->slug]) }}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="content">New comment</label>
                    <textarea rows="10" class="form-control" name="content" id="content">{{ old('content') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    @include('partials.comments', ['comments' => $post->comments])
@endsection
