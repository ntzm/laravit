@extends('template')

@section('content')
    <h2>Login</h2>
    @include('partials.errors', compact('errors'))
    <form method="post" action="{{ route('auth.postLogin') }}">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" maxlength="20" name="username" id="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <p>Don't have an account? You should <a href="{{ route('auth.register') }}">register</a>!</p>
@endsection
