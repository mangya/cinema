<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cinema') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" rel="preload" href="{{url(elixir('css/style.css'))}}">
    <meta name="theme-color" content="#7952b3">
    @stack('styles')
</head>
<body>
    <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm" id="main-nav">
        <p class="h5 my-0 me-md-auto fw-normal"><a href="{{ route('home') }}" style="text-decoration: none;">Cinema</a></p>
        <nav class="my-2 my-md-0 me-md-3">
        <a class="p-2 text-dark" href="{{route('track.page')}}">Track Booking</a>
        </nav>
        <!-- Authentication Links -->
        @guest
        <a class="btn btn-outline-primary" href="{{ route('login') }}">Login</a>
        <a class="btn btn-outline-primary" href="{{ route('register') }}">Sign up</a>
        @else
        <a class="p-2 text-dark" href="{{ route('my.bookings') }}">My Bookings</a>
        Logged in as {{ Auth::user()->name }}
        <a class="btn btn-outline-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
        </form>
        @endguest
    </header>
    <main class="container">
        @yield('content')
        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-12 col-md">
                    <small class="d-block mb-3 text-muted">&copy; 2017-2020</small>
                </div>
            </div>
        </footer>
    </main>
    <!-- Scripts -->
    <script src="{{url(elixir('js/scripts.js'))}}"></script>
    @stack('scripts')
</body>
</html>