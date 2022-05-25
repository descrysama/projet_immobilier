<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand " href="{{ url('/') }}"><img src="{{ asset('img/logo-plantis.png')}}" alt="plantis" width="10%"></a>
            <div class="d-flex">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        @if (Route::has('login'))
                        @auth
                        <a class="nav-link active" href="{{ route('logout') }}">Se déconnecter</a>
                        <a class="nav-link active" href="{{ route('cart') }}"><i class="fa-solid fa-cart-shopping"></i></a>
                        @else
                        <a class="nav-link active" href="{{ route('login') }}">Se connecter</a>
                        @endauth
                        @endif
                        @if (Auth::user() && Auth::user()->role == 1)
                        <a class="nav-link active" href="{{ route('admin') }}">admin</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div>
        <hr>
    </div>