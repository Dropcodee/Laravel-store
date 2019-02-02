<nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>
        <div class="uk-navbar-left">
            <div class="uk-container">
                <ul class="uk-navbar-nav">
                    <li class="uk-active"><a href="/">CompuDavid Store Application</a></li>
                </ul>
            </div>
        </div>
        <div class="uk-navbar-right">
            <ul class="uk-navbar-nav">
                @if (Route::has('login'))
                    @auth
                        <li><a href="{{ url('/home') }}">Home</a></li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>

                        @if (Route::has('register'))
                           <li><a href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth
                @endif
            </ul>
            </div>
    </nav>
