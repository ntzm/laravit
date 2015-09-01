@extends('template')

@section('title', 'New post')

@section('content')
    <div class="container">
        <h2>New post</h2>
        @include('partials.errors')
        <form method="post" action="{{ route('subs.posts.store', $sub->name) }}">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control" maxlength="100" name="title" id="title" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" id="content">{{ old('content') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
