<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>



    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">


                        @if(auth()->user())
                        @if (auth()->user()->role=='admin')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('users.list') ? 'active text-primary fw-bold' : '' }} " href="{{ route('users.list') }}">Users</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.books') ? 'active text-primary fw-bold' : '' }}" href="{{ route('admin.books') }}">Books</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('book-issue.requests') ? 'active text-primary fw-bold' : '' }}" href="{{ route('book-issue.requests') }}">Book-Issue-Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('book-return.requests') ? 'active text-primary fw-bold' : '' }}" href="{{ route('book-return.requests') }}">Book-Return-Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin-book.create') ? 'active text-primary fw-bold' : '' }}" href="{{ route('admin-book.create') }}">Book-create</a>
                        </li>



                        @endif

                        @if (auth()->user()->role=='user')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('user.books') ? 'active text-primary fw-bold' : '' }}" href="{{ route('user.books') }}">Books</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('books.issued') ? 'active text-primary fw-bold' : '' }}" href="{{ route('books.issued') }}">Issued Books</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('books.issue') ? 'active text-primary fw-bold' : '' }}" href="{{ route('books.issue') }}">Issue-Book-Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('books.return') ? 'active text-primary fw-bold' : '' }}" href="{{ route('books.return') }}">Return-Book-Request</a>
                        </li>

                        @endif
                        @endif

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                    </ul>
                </div>
            </div>
        </nav>

        <main class="p-4">
            @yield('content')
        </main>
    </div>


    
    <script>
        document.addEventListener("visibilitychange", function() {
            if (document.hidden) {
                document.title = "Hey! Come back! 😢";
            } else {
                document.title = "Welcome Back! 😊";
            }
        });
    </script>
    
</body>
@yield('scripts')

</html>