@extends('template')

@section('title', 'New post')

@section('content')
    <div class="container">
        <h2>New post</h2>
        @include('partials.validation-messages')
        <form method="post" action="{{ route('sub.post.store', $sub->name) }}">
            {!! csrf_field() !!}
            <fieldset class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control" maxlength="100" placeholder="Title" name="title" id="title" value="{{ old('title') }}">
            </fieldset>
            <fieldset class="form-group">
                <label for="content">Content</label>
                <textarea rows="10" class="form-control" placeholder="Content" name="content" id="content">{{ old('content') }}</textarea>
            </fieldset>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
