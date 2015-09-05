<nav class="navbar navbar-light bg-faded">
    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#navbar">
        &#9776;
    </button>
    <div class="collapse navbar-toggleable-xs" id="navbar">
        <a class="navbar-brand" href="{{ route('index') }}">Laravit</a>
        <ul class="nav navbar-nav">
            <li class="nav-item {{ Helper::active('index') }}">
                <a class="nav-link" href="{{ route('index') }}">Frontpage</a>
            </li>
            @if(Auth::check())
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                        New <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('subs.create') }}">Sub</a>
                        <a class="dropdown-item" href="#">Post</a>
                    </div>
                </li>
            @endif
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                    User <span class="caret"></span>
                </a>
                <div class="dropdown-menu">
                    @if(Auth::check())
                        <a class="dropdown-item" href="{{ route('users.show', Auth::user()->username) }}">Profile</a>
                        <a class="dropdown-item" href="{{ route('auth.logout') }}">Logout</a>
                    @else
                        <a class="dropdown-item" href="{{ route('auth.login') }}">Login</a>
                        <a class="dropdown-item" href="{{ route('auth.register') }}">Register</a>
                    @endif
                </div>
            </li>
        </ul>
    </div>
</nav>
