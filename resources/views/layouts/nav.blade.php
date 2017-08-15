<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08"
        aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <a class="h4 navbar-brand " href="{{ url('/') }}">
                {{ config('app.name', 'Home') }}
            </a>

    <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
        <ul class="navbar-nav">
            <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">
                        Home
                    </a>
                </li>

        <li class="nav-item">
                <a class="nav-link" href="/books">All Books</a>
            </li>
        <li class="nav-item">
                <a class="nav-link" href="/books/create">My Books</a>
            </li>
        <!-- Authentication Links -->
        @if (Auth::guest())
        <a class="nav-link" href="{{ route('login') }}">Login</a>
        <a class="nav-link" href="{{ route('register') }}">Register</a> 
        @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }}</span>
                        </a>

            <ul class="dropdown-menu" role="menu">
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                <li>
                    <a class="dropdown-item" href="/change-password">Change Settings</a>
                </li>
            </ul>
        </li>
        @endif
</ul>
    </div>
</nav>



