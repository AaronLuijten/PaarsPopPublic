<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('graphics/Icon.png')}}" rel="icon" type="image/x-icon">
    
    <title>PaarsPop</title>

</head>
<nav class="menu">
    <div class="container-menu">
        <div class="row1">
            <div class="title-menu">PaarsPop</div>
            @if(!Auth::check())
            Welkom user
            @endif
        </div>
        <div class="row2">
            <a href="{{route('index')}}">home</a>
            <a href="{{route('index')}}">Over ons</a>
            <a href="{{route('index')}}">Contact</a>
        </div>
        <div class="row3">
            <button class="btn_outline">Inloggen</button>
            <button class="btn_filled">Registreren</button>
        </div>
    </div>
</nav>
<body>
    <nav>
        <div name="menubar" class="">
            <ul class=''>
                {{-- Welcome --}}
                @if(Auth::check())
                <li class="">Welkom&NonBreakingSpace;<div class=""><a href="{{route('profileView')}}" class="">{{Auth::user()->first_name}}</a></div></li>
                @endif 
                {{-- home --}}
                <li class=""><a href="{{route('index')}}">home</a></li>
                {{-- login / signup --}}
                @if(!Auth::check())
                    <li class=""><a href="{{route('login')}}">login</a></li>
                    <li class=""><a href="{{route('signup')}}">registreren</a></li>
                @endif
                {{-- accomodation --}}
                 <li class=""><a href="{{route('showacco')}}">mijn Paarspop weekend</a></li>
                @if(Auth::check())
                <li class=""><a href="{{route('logout')}}">log uit</a></li>
                @endif
                @if(Auth::check() && Auth::user()->admin==1)
                <li class=""><a href="{{route('adminIndex')}}">Admin</a></li>
                @endif
             </ul>
        </div>
    </nav>
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
</body>
</html>