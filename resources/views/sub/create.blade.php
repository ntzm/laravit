@extends('template')

@section('title', 'New sub')

@section('content')
    <div class="container">
        <h2>New sub</h2>
        @include('partials.errors')
        <form method="post" action="{{ route('sub.store') }}">
            {!! csrf_field() !!}
            <fieldset class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" maxlength="20" placeholder="Name" name="name" id="name" value="{{ old('name') }}">
            </fieldset>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
