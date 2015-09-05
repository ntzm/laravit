@extends('template')

@section('title', 'Register')

@section('content')
    <div class="container">
        <h2>Register</h2>
        @include('partials.errors')
        <form method="post" action="{{ route('auth.postRegister') }}">
            {!! csrf_field() !!}
            <fieldset class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" maxlength="20" placeholder="Username" name="username" id="username" value="{{ old('username') }}">
            </fieldset>
            <fieldset class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password" id="password">
            </fieldset>
            <fieldset class="form-group">
                <label for="password_confirmation">Confirm password</label>
                <input type="password" class="form-control" placeholder="Confirm password" name="password_confirmation" id="password_confirmation">
            </fieldset>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <p>Already have an account? You should <a href="{{ route('auth.login') }}">login</a>!</p>
    </div>
@endsection
