@extends('template')

@section('title', 'New sub')

@section('content')
    <h2>New sub</h2>
    @include('partials.errors')
    <form action="{{ route('subs.store') }}">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" maxlength="20" name="name" id="name" value="{{ old('name') }}">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
