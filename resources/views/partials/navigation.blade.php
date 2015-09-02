<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('index') }}">Reddit Laravel</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li class="{{ Helper::active('index') }}"><a href="{{ route('index') }}">Frontpage</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            New <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('subs.create') }}">Sub</a></li>
                            <li><a href="#">Post</a></li>
                        </ul>
                    </li>
                @endif
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        User <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        @if(Auth::check())
                            <li><a href="{{ route('users.show', Auth::user()->username) }}">Profile</a></li>
                            <li><a href="{{ route('auth.logout') }}">Logout</a></li>
                        @else
                            <li><a href="{{ route('auth.login') }}">Login</a></li>
                            <li><a href="{{ route('auth.register') }}">Register</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
