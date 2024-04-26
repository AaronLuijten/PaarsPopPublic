<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('graphics/Icon.png')}}" rel="icon" type="image/x-icon">

    {{-- family: Lobster,Open Sans,Bebas Neue - headers 1 - 3 --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Lobster&family=Open+Sans&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Jersey+15&display=swap');
    </style>
    
    <title>PaarsPop</title>

</head>
<nav class="menu">
    <div class="container-menu">
        <div class="row1">
            <a href="{{route('index')}}" class="title-menu">PaarsPop</a>
            @if(Auth::check())
                <div class="flex">
                    <p class="text1-menu">Welkom</p>
                    <p class="text2-menu"><a href="{{route('profileView')}}">{{Auth::user()->first_name}}</a></p>
                </div>
            @endif
        </div>
        <div class="row2">
            <a href="{{route('index')}}" class="{{ Request::is('/') ? 'active' : '' }} menu-link">Home</a>
            <a href="{{route('contact')}}" class="{{ Request::is('contact') ? 'active' : '' }} menu-link">Contact</a>
            @if (Auth::check())
                @if (Auth::user()->admin == 1)
                    <a href="{{route('adminIndex')}}" class="{{ Request::is('admin') ? 'active' : '' }} menu-link">Admin</a>
                @endif
            @endif
        </div>
        <div class="row3">
            @if (!Auth::check())
                <button class="btn_outline"><a href="{{route('login')}}">Inloggen</a></button>
                <button class="btn_filled ml-5"><a href="{{route('signup')}}">Registreren</a></button>
            @else
                <button class="btn_outline"><a href="{{route('logout')}}">uitloggen</a></button>
            @endif
            
        </div>
    </div>
    <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Top Navigation Menu -->
    {{-- <div class="topnav">
        <a href="#home" class="active">Logo</a>
        <!-- Navigation links (hidden by default) -->
        <div id="myLinks">
            <a href="news">News</a>
            <a href="contact">Contact</a>
        </div>
        <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
        <div class="row3">
            @if (!Auth::check())
                <button class="btn_outline"><a href="{{route('login')}}">Inloggen</a></button>
                <button class="btn_filled ml-5"><a href="{{route('signup')}}">Registreren</a></button>
            @else
                <button class="btn_outline"><a href="{{route('logout')}}">uitloggen</a></button>
            @endif
            
        </div>
    </div> --}}

    <script>
        /* Toggle between showing and hiding the navigation menu links when the user clicks on the hamburger menu / bar icon */
        function myFunction() {
        var x = document.getElementById("myLinks");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
        }
    </script>
</nav>
<body class="mainBody">
    <div id="bodyContainer">
        {{$slot}}
    </div>

    <footer class="footer">
        <div class="container-footer">
            <div class="row1-footer">
                <div class="line1-footer"></div>
            </div>
            <div class="row2-footer">
                <p class="text-footer">Made by</p>
                <div class="line2-footer"></div>
                <div class="link_container-footer">
                    <a href="https://www.linkedin.com/in/aaron-luijten-a89012234/ " target="_blank" class="flex mb-2"><p class="link-footer">Aaron Luijten</p> <img src="{{asset('assets/images/Vector.png') }}"> </a>
                    <a href="https://www.linkedin.com/in/martin-linders-752188234/" target="_blank" class="flex"><p class="link-footer">Martin Linders</p> <img src="{{asset('assets/images/Vector.png') }}"></a>
                </div>
            </div>
        </div>
    <footer>
</body>
</html>