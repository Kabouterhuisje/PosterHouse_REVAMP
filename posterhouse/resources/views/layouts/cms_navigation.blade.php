<title>CMS</title>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main.css') }}">
@section('navigation')
    <div class="sidenav">
        <a href="{{ route('home') }}" id="logo"> <img src="{{ URL::asset('images/Logo.png') }}" width="50px"> </a>
        <a href="{{URL::route('cms_home')}}"><b>Home</b></a>
        <br/>

        <br>

        <a href="{{ route('home') }}"><b>Terug</b></a>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
            <b>Uitloggen</b>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST"
              style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
@show