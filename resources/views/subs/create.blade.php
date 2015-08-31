@extends('template')

@section('content')
    <h2>New sub</h2>
    @include('partials.errors')
    <form action="{{ route('subs.store') }}">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" maxlength="20" name="name" id="name">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
