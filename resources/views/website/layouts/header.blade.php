<!-- Header -->
<header id="header">
    <div class="container">

        <div class="navbar-header">
            <!-- Logo -->
            <div class="navbar-brand">
                <a class="logo" href="index.html">
                    <img src="./img/logo.png" alt="logo">
                </a>
            </div>
            <!-- /Logo -->

            <!-- Mobile toggle -->
            <button class="navbar-toggle">
                <span></span>
            </button>
            <!-- /Mobile toggle -->
        </div>

         <!-- Navigation -->
     <nav id="nav">
        <ul class="main-menu nav navbar-nav navbar-right">
            <li><a href="{{ route('home_home') }}">{{ __('website.home') }}</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
               <x-nav-bar></x-nav-bar>

            </li>
            <li><a href="contact.html">@lang('website.contact')</a></li>
            @if (App::getlocale() =="en")

            <li><a href=" {{ route('lang',['lang'=>'ar']) }} ">Arabic</a></li>

            @else
            <li><a href="{{ route('lang',['lang'=>'en']) }}">English</a></li>
            @endif
            {{-- <li><a href="login.html">Sign In</a></li>
            <li><a href="register.html">Sign Up</a></li> --}}
            @guest
            @if (Route::has('login'))
                <li class="nav-item" wire:navigate>
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item" wire:navigate>
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div  aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
        @auth
            @if (auth()->user()->role_id>1)
            <li wire:navigate><a href="{{ route('dashboard') }}">Dashboard</a></li>

            @endif
        @endauth
        </ul>
    </nav>
    <!-- /Navigation -->


    </div>
</header>
<!-- /Header -->
