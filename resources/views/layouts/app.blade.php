<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script>
       
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ 'IFC' }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a href="#"  id="navbarDropdown" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;" v-pre>
   
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/home"
                                        onclick="event.preventDefault();
                                                  document.getElementById('home').submit();">
                                        {{ __('Inicio') }}
                                    </a>
                                  
                                    @can('admin-only', auth()->user())
                                        <a class="dropdown-item" href="/courses"
                                        onclick="event.preventDefault();
                                                document.getElementById('edit-admin-form').submit();">
                                        {{ __('Cursos') }}
                                        </a>
                                    @endcan

                                      @cannot('admin-only', auth()->user())
                                        <a class="dropdown-item" href="http://localhost:8000/courses/user/mycourses?_token=3M7QYMdRrFHmuuju5hzWQLuiEDjcBnVJSWzsg2gr"
                                        onclick="event.preventDefault();
                                                document.getElementById('my-form').submit();">
                                        {{ __('Meus Cursos') }}
                                        </a>
                                    @endcan

                                    @can('admin-only', auth()->user())
                                    <a class="dropdown-item" href="/courses/registration/adminregisterlist"
                                    onclick="event.preventDefault();
                                            document.getElementById('create-admin-form').submit();">
                                    {{ __('Fazer Matricula') }}
                                    </a>
                                    @endcan
                                    @can('admin-only', auth()->user())
                                    <a class="dropdown-item" href="/user/admin/deleteregistration"
                                    onclick="event.preventDefault();
                                            document.getElementById('delete-admin-form').submit();">
                                    {{ __('Todas as Matricula') }}
                                    </a>
                                    @endcan
                                    @cannot('admin-only', auth()->user())
                                        <a class="dropdown-item" href="/courses/registration/list"
                                        onclick="event.preventDefault();
                                                document.getElementById('edit-form').submit();">
                                        {{ __('Cursos') }}
                                        </a>
                                    @endcan
                                    @can('admin-only', auth()->user())
                                    <a class="dropdown-item" href="/users"
                                        onclick="event.preventDefault();
                                                  document.getElementById('create-form').submit();">
                                        {{ __('Usuarios') }}
                                    </a>
                                    @endcan
                                    @can('admin-only', auth()->user())
                                    <a class="dropdown-item" href="http://localhost:8000/courses/registration/allcourses"
                                        onclick="event.preventDefault();
                                                  document.getElementById('authorize-form').submit();">
                                        {{ __('Autorizar Matriculas') }}
                                    </a>
                                    @endcan
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                     </a>

                                     <form id="home" action="/home"  style="display: none;">
                                        @csrf
                                    </form>
                                    @cannot('admin-only', auth()->user())
                                        <form id="my-form" action="http://localhost:8000/courses/user/mycourses"  style="display: none;">
                                            @csrf
                                        </form>
                                    @endcan

                                    @can('admin-only', auth()->user())
                                        <form id="edit-admin-form" action="/courses"  style="display: none;">
                                            @csrf
                                        </form>
                                    @endcan

                                    @can('admin-only', auth()->user())
                                        <form id="create-admin-form" action="/courses/registration/adminregisterlist"  style="display: none;">
                                            @csrf
                                        </form>
                                    @endcan

                                    @can('admin-only', auth()->user())
                                        <form id="delete-admin-form" action="/user/admin/deleteregistration"  style="display: none;">
                                            @csrf
                                        </form>
                                    @endcan
                                    @cannot('admin-only', auth()->user())
                                        <form id="edit-form" action="/courses/user/list"  style="display: none;">
                                            @csrf
                                        </form>
                                    @endcan


                                    @can('admin-only', auth()->user())
                                        <form id="create-form" action="/users"  style="display: none;">
                                            @csrf
                                        </form>
                                    @endcan

                                    @can('admin-only', auth()->user())
                                        <form id="authorize-form" action="http://localhost:8000/courses/registration/allcourses?_token=PuIy0JPSLdMKoEZDLfEmoZ9MhgVH6oDfYJhPUeVj"  style="display: none;">
                                            @csrf
                                        </form>
                                    @endcan

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
            @yield('content')
        </main>
    </div>
</body>
</html>
