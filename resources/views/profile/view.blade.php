<x-layout>
@php
    $user = Auth::user()
@endphp
<div class="flex justify-center w-full">
    <div class=" bg-purple-400 flex justify-center mt-4 p-2 text-sm lg:text-xl rounded-2xl">
        <div class="flex-col">
            <div class="items-center">
                <h1 class="p-2 text-green-400 rounded-2xl w-fit bg-purple-600"><b>jouw profiel</b></h1>
            </div>
            <div class="items-start">
                <h2 class="text-green-400 font-bold mb-2">Gegevens:</h2>
                <div class="bg-purple-600 p-2 rounded-md font-semibold text-green-400 text-lg w-full flex justify-center">
                    
                    <div class="p-2 rounded-md font-semibold text-green-400 text-lg w-full mb-4">
                        <p>Naam: </p>
                        <p>Email: </p>
                        <p>Telefoon: </p>
                        <p>Geboortedatum: </p>
                    </div>
                    <div class="bg-purple-600 p-2 rounded-md font-semibold text-green-400 text-lg w-full mb-4">
                        <p>{{$user->first_name}} {{$user->last_name}}</p>
                        <p>{{$user->email}}</p>
                        <p>{{$user->phonenumber}}</p>
                        <p>{{$user->date_of_birth}}</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center">
                <a class="bg-purple-600 rounded-md p-1 text-white font-bold mt-2 hover:bg-purple-400 hover:underline transition duration-150" href="{{route('showacco')}}">mijn Paarspop weekend</a> 
                <button class="mt-2 text-green-400 border border-solid border-black bg-purple-500 rounded-md  hover:bg-white hover:text-green-500 hover:font-bold hover:scale-105 transition duration-300"><a href="{{route('changePassword')}}">Wachtwoord aanppassen</a></button>
                <button class="mt-2 text-green-400 border border-solid border-black bg-purple-500 rounded-md  hover:bg-white hover:text-green-500 hover:font-bold hover:scale-105 transition duration-300"><a href="{{route('editView')}}">gegevens aanpassen</a></button>
                <button class="mt-2 text-green-400 border border-solid border-black bg-purple-500 rounded-md  hover:bg-white hover:text-red-500 hover:font-bold hover:scale-105 transition duration-300"><a href="{{route('deleteProfile')}}">verwijderen</a></button>
                @if (Session::has('success'))
                <div class="alert alert-succes">
                    <div class="text-green-400 font-bold">{{session('success')}}</div>
                </div>
                    
                @endif
                @foreach ($errors->all() as $error)
                    <div class="text-red-500">{{$error}}</div>
                @endforeach
            </div>
                     
        </div>
        
    </div>
</div>
</x-layout>