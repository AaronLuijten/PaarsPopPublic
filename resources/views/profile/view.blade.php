<x-layout>
@php
    $user = Auth::user()
@endphp
<div class="flex-container-profile">
    <div class="box-profile">
        <div>
            <h1 class=""><b>jouw profiel</b></h1>
        </div>
        <div>
            <h2 class="">Gegevens:</h2>
            <div class="container-info">
                <div class="box-placeholder">
                    <p>Naam: </p>
                    <p>Email: </p>
                    <p>Telefoon: </p>
                    <p>Geboortedatum: </p>
                </div>
                <div class="box-data">
                    <p>{{$user->first_name}} {{$user->last_name}}</p>
                    <p>{{$user->email}}</p>
                    <p>{{$user->phonenumber}}</p>
                    <p>{{$user->date_of_birth}}</p>
                </div>
            </div>
        </div>
        <div class="container-buttons">
            <div class="box-buttons-profile">
                <button class="btn_filled" style="margin-top:4%;"><a class="" href="{{route('showacco')}}">mijn Paarspop weekend</a></button>
                <button class="btn_filled" style="margin-top:4%;"><a href="{{route('changePassword')}}">Wachtwoord aanppassen</a></button>
                <button class="btn_filled" style="margin-top:4%;"><a href="{{route('editView')}}">gegevens aanpassen</a></button>
                <button class="btn_filled" style="margin-top:4%;"><a href="{{route('deleteProfile')}}">verwijderen</a></button>
                @if (Session::has('success'))
                <div class="alert alert-succes">
                    <div class="">{{session('success')}}</div>
                </div>
                    
                @endif
                @foreach ($errors->all() as $error)
                    <div class="">{{$error}}</div>
                @endforeach
            </div>
        </div>
                    
    </div>
</div>
</x-layout>