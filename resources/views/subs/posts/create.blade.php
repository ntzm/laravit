@extends('template')

@section('title', 'New post')

@section('content')
    <div class="container">
        <h2>New post</h2>
        @include('partials.errors')
        <form method="post" action="{{ route('subs.posts.store', $sub->name) }}">
            {!! csrf_field() !!}
            <fieldset class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control" maxlength="100" placeholder="Title" name="title" id="title" data-preview="#title-preview" value="{{ old('title') }}">
            </fieldset>
            <fieldset class="form-group">
                <label for="content">Content</label>
                <textarea rows="10" class="form-control" placeholder="Content" name="content" id="content" data-preview="#content-preview" data-markdown>{{ old('content') }}</textarea>
            </fieldset>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <h2>Preview</h2>
        <div class="card card-block">
            <h4 class="card-title">
                <a href="#" id="title-preview"></a>
            </h4>
            <h6 class="card-subtitle">
                1 point <span class="text-muted">just now</span>
            </h6>
            <div class="card-text" id="content-preview"></div>
            <a class="card-link" href="#">
                <i class="fa fa-comments"></i>
                0 comments
            </a>
            <a class="card-link" href="{{ route('subs.show', $sub->name) }}">
                <i class="fa fa-tag"></i>
                {{ $sub->name }}
            </a>
            <a class="card-link" href="{{ route('users.show', Auth::user()->username) }}">
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
        </div>
    </div>
@endsection
