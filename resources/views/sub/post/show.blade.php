@extends('template')

@section('title', $post->title)

@section('head')
    @include('partials.meta', [
        'title'       => $post->title,
        'description' => $post->comments->count() . ' comments so far on Laravit',
    ])
@endsection

@section('content')
    @include('partials.post', compact('post'))
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
            <div class="col-lg-6">
                <label>Preview</label>
                <div class="card card-block">
                    <p class="card-subtitle">
                        1 point <span class="text-muted">just now</span>
                    </p>
                    <div class="card-text" id="content-preview"></div>
                    <a class="card-link" href="{{ route('user.show', Auth::user()->username) }}">
                        <i class="fa fa-user"></i>
                        {{ Auth::user()->username }}
                    </a>
                    <hr>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-primary-outline">
                            <i class="fa fa-thumbs-up"></i>
                        </button>
                        <button type="button" class="btn btn-secondary-outline">
                            <i class="fa fa-thumbs-down"></i>
                        </button>
                    </div>
                    <button class="btn btn-primary">Reply</button>
                </div>
            </div>
        </div>
        <hr>
    @endif
    @include('partials.comments', ['comments' => $post->comments()->noParent()->get()])
@endsection
