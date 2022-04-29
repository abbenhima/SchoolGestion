<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm navbar-dark  bg-primary" >
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                  
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto ">
                       
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Etudiants
                            </a>
                            <div class="dropdown-menu navbar-dark  bg-primary" aria-labelledby="navbarDropdownMenuLink">
                              <a class="dropdown-item bg-primary text-light" href="{{route('etudiants.index')}}">List Etudiants </a>
                              <a class="dropdown-item bg-primary text-light" href="{{route('etudiants.create')}}">Add Etudiant</a>
                              
                            </div>
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             Professeurs
                            </a>
                            <div class="dropdown-menu navbar-dark  bg-primary" aria-labelledby="navbarDropdownMenuLink">
                              <a class="dropdown-item bg-primary text-light" href="{{route('professeurs.index')}}">List Professeurs</a>
                              <a class="dropdown-item bg-primary text-light" href="{{route('professeurs.create')}}">Add Professeur</a>
                              
                            </div>
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             Cours
                            </a>
                            <div class="dropdown-menu navbar-dark  bg-primary" aria-labelledby="navbarDropdownMenuLink">
                              <a class="dropdown-item bg-primary text-light" href="{{route('cours.index')}}">List Cours</a>
                              <a class="dropdown-item bg-primary text-light" href="{{route('cours.create')}}">Add Cours</a>
                              
                            </div>
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             Salles
                            </a>
                            <div class="dropdown-menu navbar-dark  bg-primary" aria-labelledby="navbarDropdownMenuLink">
                              <a class="dropdown-item bg-primary text-light" href="{{route('salles.index')}}">List Salles</a>
                              <a class="dropdown-item bg-primary text-light" href="{{route('salles.create')}}">Add Salle</a>
                              
                            </div>
                          </li>

                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             Notes
                            </a>
                            <div class="dropdown-menu navbar-dark  bg-primary" aria-labelledby="navbarDropdownMenuLink">
                              <a class="dropdown-item bg-primary text-light" href="{{route('notes.index')}}">List note</a>
                              <a class="dropdown-item bg-primary text-light" href="{{route('notes.create')}}">Add note</a>
                              
                            </div>
                          </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto  navbar-expand-md shadow-sm navbar-dark  bg-primary">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item shadow-sm navbar-dark  bg-primary">
                                <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item shadow-sm navbar-dark  bg-primary">
                                    <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown shadow-sm navbar-dark  bg-primary">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-dark bg-primary " aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item shadow-sm navbar-dark  bg-primary text-light" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @if (session()->has('status'))

            <h3 style="color:green">
                {{session()->get('status')}}
            </h3>
                
            @endif
            @yield('content')
        </main>
    </div>
</body>
</html>
