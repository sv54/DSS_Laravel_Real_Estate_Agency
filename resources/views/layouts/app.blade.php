<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link rel="stylesheet" href="{{asset('css/all.css')}}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap  -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'InmoDSS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>

        .flex-wrapper {
          display: flex;
          min-height: 100vh;
          flex-direction: column;
          justify-content: space-between;
        }

    </style>
</head>

<body>
<div class="flex-wrapper">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light header shadow-sm">
        
            <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                        <img class="" src="{{URL::asset('/Logo3.png')}}" alt="" width=27% height="100%">

                        <!-- {{ config('app.name', 'InmoDSS') }} -->
                    </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                    <a class="nav-link" href="http://localhost:8000/agencies_public/">{{ __('Agencias') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="http://localhost:8000/proyecto/">{{ __('Sobre Nosotros') }}</a>
                                </li>
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
                                <!-- Example split danger button -->
                                <div class="btn-group">
                                    @if(Auth::User()->tipoUsuario == 'admin')
                                        <form action="{{route('admin.show')}}" method="GET" >
                                            @csrf
                                            <button type="submit" class="btn">{{ Auth::user()->nombre }}</button>
                                        </form>
                                    @else
                                        <form action="{{route('user.showBueno',['id' => Auth::user()->id])}}" method="GET" >
                                            @csrf
                                            <button type="submit" class="btn">{{ Auth::user()->nombre }}</button>
                                        </form>
                                    @endif
                                    <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                                        
                                    </button>

                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{route ('logout')}}">logout</a></li>
                                        @if(Auth::User()->tipoUsuario == 'agente')
                                            <li><a class="dropdown-item" href="{{route('agency.show',['id' => Auth::user()->agency_id])}}">agencia</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </li>
                            @if(Auth::User()->tipoUsuario == 'agente')
                                <form action="{{ route('addpropertyAgente.show')}}" method="GET">
                                    @csrf
                                    <button type="submit" class='button-10'>Publicar</button>
                                </form>
                            @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
    crossorigin="anonymous"></script>
</body>

<footer class="footer-distributed">

    <div class="footer-right">
    <a href="https://github.com/IzanAyllonUA/DSS_Practica"><i class="fa fa-github"></i></a>

    </div>

    <div class="footer-left">

    <p class="footer-links">
        <a class="link-1" href="#">Home</a>

        <a href="https://github.com/IzanAyllonUA/DSS_Practica">Github</a>

        <a href="http://localhost:8000/proyecto/#">Sobre Nosotros</a>

    </p>

    <p>InmoDSS &copy; 2022</p>
    </div>

</footer>
</div>
</html>
