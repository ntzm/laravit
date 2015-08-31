@extends('template')

@section('content')
    <h2>Register</h2>
    @include('partials.errors')
    <form method="post" action="{{ route('auth.postRegister') }}">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" maxlength="20" name="username" id="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm password</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <p>Already have an account? You should <a href="{{ route('auth.login') }}">login</a>!</p>
@endsection
