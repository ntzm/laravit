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
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="#">
                    <h4 id="title-preview"></h4>
                </a>
            </div>
            <div class="panel-body">
                <p id="content-preview"></p>
                <hr>
                <p>
                    submitted just now
                    by <a href="{{ route('users.show', Auth::user()->username) }}">{{ Auth::user()->username }}</a>
                    to <a href="{{ route('subs.show', $sub->name) }}">/sub/{{ $sub->name }}</a>
                </p>
                <a href="#">
                    0 comments
                </a>
            </div>
        </div>
    </div>
@endsection
