@extends('template')

@section('title', 'Login')

@section('content')
    <div class="container">
        <h2>Login</h2>
        @include('partials.errors')
        <form method="post" action="{{ route('auth.postLogin') }}">
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
                <label class="c-input c-checkbox">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="c-indicator"></span>
                    Remember me
                </label>
            </fieldset>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <p>Don't have an account? You should <a href="{{ route('auth.register') }}">register</a>!</p>
    </div>
@endsection
