@extends('template')

@section('title', trans('general.register'))

@section('content')
    <div class="container">
        <h2>@lang('general.register')</h2>
        @include('partials.errors')
        <form method="post" action="{{ route('auth.postRegister') }}">
            {!! csrf_field() !!}
            <fieldset class="form-group">
                <label for="username">@lang('general.username')</label>
                <input type="text" class="form-control" maxlength="20" placeholder="@lang('general.username')" name="username" id="username" value="{{ old('username') }}">
            </fieldset>
            <fieldset class="form-group">
                <label for="password">@lang('general.password')</label>
                <input type="password" class="form-control" placeholder="@lang('general.password')" name="password" id="password">
            </fieldset>
            <fieldset class="form-group">
                <label for="password_confirmation">@lang('general.confirm-password')</label>
                <input type="password" class="form-control" placeholder="@lang('general.confirm-password')" name="password_confirmation" id="password_confirmation">
            </fieldset>
            <button type="submit" class="btn btn-primary">@lang('general.register')</button>
        </form>
        <p>Already have an account? You should <a href="{{ route('auth.login') }}">login</a>!</p>
    </div>
@endsection
