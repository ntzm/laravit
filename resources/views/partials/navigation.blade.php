<nav class="navbar navbar-dark bg-primary">
    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#navbar">
        &#9776;
    </button>
    <div class="collapse navbar-toggleable-xs" id="navbar">
        <a class="navbar-brand" href="{{ route('index') }}">Laravit</a>
        <ul class="nav navbar-nav pull-right">
            @if(Auth::check())
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                        New <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('sub.create') }}">Sub</a>
                        <a class="dropdown-item" href="#">Post</a>
                    </div>
                </li>
            @endif
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                    User <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    @if(Auth::check())
                        <a class="dropdown-item" href="{{ route('user.show', Auth::user()->username) }}">@lang('general.profile')</a>
                        <a class="dropdown-item" href="{{ route('auth.logout') }}">@lang('general.logout')</a>
                    @else
                        <a class="dropdown-item" href="{{ route('auth.login') }}">@lang('general.login')</a>
                        <a class="dropdown-item" href="{{ route('auth.register') }}">@lang('general.register')</a>
                    @endif
                </div>
            </li>
        </ul>
    </div>
</nav>
