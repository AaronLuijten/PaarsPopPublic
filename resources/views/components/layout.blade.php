<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('graphics/Icon.png')}}" rel="icon" type="image/x-icon">
    <title>PaarsPop</title>

</head>
<body class="flex flex-col min-h-screen">
    <nav>
        <div name="menubar" class="bg-purple-700 w-full text-xs lg:text-xl h-14 shadow-sm pl-1 border-b-4 border-b-green-400">
            <ul class='pt-2 pb-1 flex items-center'>
                {{-- Welcome --}}
                @if(Auth::check())
                <li class="text-white float-left mr-3 pr-3 border border-solid border-transparent flex flex-row">Welkom&NonBreakingSpace;<div class="text-green-400 font-bold"><a href="{{route('profileView')}}" class="hover:underline hover:text-green-300">{{Auth::user()->first_name}}</a></div></li>
                @endif 
                {{-- home --}}
                <li class="text-white float-left block mr-3 pr-3 border border-solid border-transparent hover:bg-purple-500 hover:border hover:border-solid rounded-md transition duration-150"><a href="{{route('index')}}">home</a></li>
                {{-- login / signup --}}
                @if(!Auth::check())
                    <li class="text-white float-left block mr-3 pr-3 border border-solid border-transparent hover:bg-purple-500 hover:border hover:border-solid rounded-md transition duration-150"><a href="{{route('login')}}">login</a></li>
                    <li class="text-white float-left block mr-3 pr-3 border border-solid border-transparent hover:bg-purple-500 hover:border hover:border-solid rounded-md transition duration-150"><a href="{{route('signup')}}">registreren</a></li>
                @endif
                {{-- accomodation --}}
                <li class="text-white float-left block mr-3 pr-3 border border-solid border-transparent hover:bg-purple-500 hover:border hover:border-solid rounded-md transition duration-150"><a href="{{route('showacco')}}">mijn Paarspop weekend</a></li>
                @if(Auth::check())
                <li class="text-white float-right block mr-3 pr-3 border border-solid border-transparent hover:bg-purple-500 hover:border hover:border-solid rounded-md transition duration-150"><a href="{{route('logout')}}">log uit</a></li>
                @endif
                @if(Auth::check() && Auth::user()->admin==1)
                <li class="text-white float-right block mr-3 pr-3 border border-solid border-transparent hover:bg-purple-500 hover:border hover:border-solid rounded-md transition duration-150"><a href="{{route('adminIndex')}}">Admin</a></li>
                @endif
            </ul>
        </div>
    </nav>
    <article class="flex-grow">
        <div>
            {{$slot}}
        </div>
    </article>

    <footer class="bg-purple-700 w-full text-sm lg:text-xl border-t-4 border-t-green-400 h-fit">
        <div class=" h-12 flex items-center justify-center text-green-400">
            <p>Made by <a href="mailto: aluijten1011@gmail.com" class="hover:underline">Aaron Luijten</a></p>
        </div>
        <div class="ml-3">
            <h2 class="text-green-400 font-bold">Contact</h2>
            <div class="flex justify-start flex-row w-2/6">
                
                <div class="text-white">
                    <p>email:</p>
                    <p>Telefoon: </p>
                </div>
                
                <div class="flex items-baseline flex-col ml-5 text-green-400 ">
                    <p><a href="mailto: paarspop23@gmail.com" class="hover:underline">paarspop23@gmail.com</a></p>
                    <p><a href="tel:+310654221833p000" class="hover:underline">06-54221833</a></p>
                </div>
            </div>
        </div>
        
    </footer>
</body>
</html>