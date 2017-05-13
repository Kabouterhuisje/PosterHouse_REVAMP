<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('welcome') }}">PosterHouse</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('welcome') }}">Home</a></li>
                <li><a href="{{ route('producten') }}">Producten</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('winkelmandje') }}"><span class="glyphicon glyphicon-shopping-cart"></span> Winkelwagen</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        @if (Auth::check())
                            {{ Auth::user()->name }}
                            @else
                            Inloggen
                        @endif

                        <span class="caret"></span></a>
                    <!-- Het dropdown menu van een gebruiker/gast -->
                    <ul class="dropdown-menu">
                        @if (Auth::guest())
                            <li class="auth_links"><a href="{{ route('register') }}">Registreren</a></li>
                            <li class="auth_links"><a href="{{ route('login') }}">Inloggen</a></li>
                        @else
                            @if (Auth::user()->role == "admin")
                                <a href="#">
                                    <li class="auth_links"><a href="{{ route('cms_home') }}">Beheer</a></li>
                                </a><br>
                            @endif
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Uitloggen
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @endif

                    </ul>
                </li>
            </ul>
            <div class="nav navbar-nav form-inline navbar-right" style="padding: 10px;">
                <div class="input-group">
                    <!-- Zoekbalk -->
                    <form action="{{ route('producten') }}" method="get">
                        <input type="text" name="searchbar" class="form-control"/>
                        <div class="input-group-btn">
                            <button class="btn btn-default" name="btnsearch"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!--/.nav-collapse -->
    </div>
</nav>