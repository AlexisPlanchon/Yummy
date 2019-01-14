<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
</head>
<body>
    
                        <!-- Authentication Links -->               @guest
        <header class="header" id="main-header">
            <div class="pre-header">
                    <div class="container pre-header__content">
                        <nav class="pre-header__account">
                            <a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>  Login</a>
                            <a href="{{ route('register') }}"><i class="fa fa-user" aria-hidden="true"></i>  Register</a>
                        </nav>
                    </div>
            </div>
                        <a class="header-logo" href="{{ url('/') }}">
            <img  src="{{ asset('images/yummy_logo.png') }}" width="250" alt="Yummi Logo" class="logo">
        </a>
        <div class="header-toogle">
            <a href="#main-header" class="header-toogle-open">
                <img src="{{ asset('images/menu.png') }}" width="30" alt="Ouvrir Menu">
            </a>
            <a href="#" class="header-toogle-close">
                <img src="{{ asset('images/menu-close.png') }}" width="30" alt="Fermer Menu">
            </a>
        </div>
            <nav class="header-menu">
                <a href="{{route('articles.index')}}" title="Articles" target="">Articles</a>
                <a href="{{route('recettes.index')}}" title="Recettes" target="">Recettes</a>
                <input type="search" class="search" name="Recherche" placeholder="Rechercher...">
            </nav>
                
        </header>

        @else

        <header class="header" id="main-header">
            <div class="pre-header">
                    <div class="container pre-header__content">
                    <nav class="pre-header__coord">
                    <a href="">Bonjour  {{ Auth::user()->name }}</a>
                    </nav>
                        <nav class="pre-header__account">
                            @if (Auth::user()->admin == 1)
                                <a class="ctrl_admin" href="{{ route('admin') }}">Contrôle admin</a>
                            @endif
                            <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i>
                                            Logout
                                        </a>
                        </nav>
                    </div>
            </div>
                        <a class="header-logo" href="{{ url('/') }}">
            <img  src="{{ asset('images/yummy_logo.png') }}" width="250" alt="Yummi Logo" class="logo">
        </a>
        <div class="header-toogle">
            <a href="#main-header" class="header-toogle-open">
                <img src="{{ asset('images/menu.png') }}" width="30" alt="Ouvrir Menu">
            </a>
            <a href="#" class="header-toogle-close">
                <img src="{{ asset('images/menu-close.png') }}" width="30" alt="Fermer Menu">
            </a>
        </div>
            <nav class="header-menu">
                <a href="/~dutGroupe8/articles" title="Articles" target="">Articles</a>
                <a href="/~dutGroupe8/recettes" title="Recettes" target="">Recettes</a>
                <input type="search" class="search" name="Recherche" placeholder="Rechercher...">
            </nav>
        </header>
                        
                                  <!-- Bonjour  {{ Auth::user()->name }}

                                    @if (Auth::user()->admin == 1)
                                        Vous êtes admin, vous pouvez créer des articles et des recettes.... il faut mettre des liens.
                                        comme <a href="{{ route('admin') }}">celui la par exemple</a>.<br />
                                    @endif

                                    <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>-->

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                        @endguest

<div>
    <div id="main">
        @yield('content')
    </div>
</div>    

    
    
    
    <footer>
        <div>
        
        <div class="social_media">
            
            <ul>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
            </ul>
            <p>&copy; 2017 Yummy</p>
            <p>Réalisé par le Groupe 8</p>
        </div>
    </div>
    </footer>
    
    <!-- Scripts -->
    
    

    
    
    
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
