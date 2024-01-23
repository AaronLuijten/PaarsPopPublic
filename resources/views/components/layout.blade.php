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
                    <p class="text2-menu">{{Auth::user()->first_name}}</p>
                </div>
            @endif
        </div>
        <div class="row2">
            <a href="{{route('index')}}" class="{{ Request::is('/') ? 'active' : '' }} menu-link">Home</a>
            <a href="{{route('index')}}" class="menu-link">Over ons</a>
            <a href="{{route('index')}}" class="menu-link">Contact</a>
            @if (Auth::check())
            @if (Auth::user()->admin == 1)
                <a href="{{route('adminIndex')}}" class="menu-link">Admin</a>
            @endif
            @endif
        </div>
        <div class="row3">
            <button class="btn_outline"><a href="{{route('login')}}">Inloggen</a></button>
            <button class="btn_filled ml-5"><a href="{{route('signup')}}">Registreren</a></button>
        </div>
    </div>
</nav>
<body>
    <div id="bodyContainer">

    </div>
    <article class="">
        <div>
            {{$slot}}
        </div>
    </article>

    <footer class="">
        <div class=" ">
            <p>Made by <a href="mailto: aluijten1011@gmail.com" class="">Aaron Luijten</a></p>
        </div>
        <div class="">
            <h2 class="">Contact</h2>
            <div class="">
                
                <div class="">
                    <p>email:</p>
                    <p>Telefoon: </p>
                </div>
                
                <div class="">
                    <p><a href="mailto: paarspop23@gmail.com" class="">paarspop23@gmail.com</a></p>
                    <p><a href="tel:+310654221833p000" class="">06-54221833</a></p>
                </div>
            </div>
        </div>
        
    </footer>

    <footer class="footer">
        test
    <footer>
</body>
</html>