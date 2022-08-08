<nav class="navbar fixed-top navbar-light bg-light">
    <div class="container">
<a class="navbar-brand" href="{{ url('/') }}">
        <img src="/public/kweekvery.png" width="130" height="75" alt="kweekvery_logo" loading="lazy">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                 <li class="nav-item"><a class="nav-link" href="/feedback">Feedback</a></li>
                <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                
                @if (Auth::guest())

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name}} <span class="caret"></span>
                        </a>
                        @if (Auth::user()->is_admin == '1')
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                             <a href="/dashboard" class="dropdown-item">Dashboard</a>
                            <a href="/all-products" class="dropdown-item">Products</a>
                            
                            <a href="/category" class="dropdown-item">Category</a>
                            <a href="/order-list" class="dropdown-item">Orders</a>
                            <a href="/users" class="dropdown-item">Users</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                        @elseif(Auth::user()->is_admin == '2')
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a href="/myaccount" class="dropdown-item">My Profile</a>
                            
                             <a href="/all-products" class="dropdown-item">Products</a>
                            
                            <a href="/category" class="dropdown-item">Category</a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                        @else
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a href="/myaccount" class="dropdown-item">My Profile</a>
                            
                            <a href="/myorders" class="dropdown-item">My Orders</a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                        @endif
                    </li>
                @endif
            </ul>
        </div>
        </div>
      </nav>
