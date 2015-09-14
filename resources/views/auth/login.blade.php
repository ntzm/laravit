@extends('template')

@section('title', trans('general.login'))

@section('content')
    <div class="container">
        <h2>@lang('general.login')</h2>
        @include('partials.validation-messages')
        <form method="post" action="{{ route('auth.postLogin') }}">
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
                <label class="c-input c-checkbox">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="c-indicator"></span>
                    @lang('general.remember-me')
                </label>
            </fieldset>
            <button type="submit" class="btn btn-primary">@lang('general.login')</button>
        </form>
        <p>Don't have an account? You should <a href="{{ route('auth.register') }}">register</a>!</p>
    </div>
@endsection
