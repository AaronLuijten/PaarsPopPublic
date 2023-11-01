<x-layout>
    <div class="flex flex-col items-center">
        <div class="items-center">
            <h2 class="text-green-400 font-bold mb-2">Gegevens:</h2>
            <div class="bg-purple-600 p-2 rounded-md font-semibold text-green-400 text-lg w-fit flex justify-center">
                
                <div class="p-2 rounded-md font-semibold text-green-400 text-lg w-full mb-4">
                    <p>User ID: </p>
                    <p>Naam: </p>
                    <p>Email: </p>
                    <p>Telefoon: </p>
                    <p>Geboortedatum: </p>
                    <p>Admin: </p>
                </div>
                <div class="bg-purple-600 p-2 rounded-md font-semibold text-green-400 text-lg w-full mb-4">
                    <p>{{$user->id}}</p>
                    <p>{{$user->first_name ?? "None"}} {{$user->last_name ?? ''}}</p>
                    <p>{{$user->email ?? "None"}}</p>
                    <p>{{$user->phonenumber ?? "None"}}</p>
                    <p>{{$user->date_of_birth ?? "None"}}</p>
                    <p>@if ($user->admin) 
                        Ja
                        @else
                        Nee
                    @endif</p>
                </div>
            </div>
            <h2 class="text-green-400 font-bold mb-2">gebruikers reservering: </h2>
            <div class="bg-purple-600 p-2 rounded-md font-semibold text-green-400 text-lg w-fit flex justify-center">
                @if (!$user->accomodation)
                        <div class="bg-purple-400 flex items-center flex-col text-xs lg:text-base mt-5 rounded-md w-fit p-3">
                            <h5>gebruiker "{{$user->first_name}} {{$user->last_name}}" heeft nog geen reservering gemaakt</h5>
                        </div>
                    @else
                    @php
                        $accomodation = $user->accomodation
                    @endphp
                    <div class="bg-purple-600 p-2 rounded-md font-semibold text-green-400 text-lg w-full flex justify-center">
                        <div>
                            <p>reservering ID: </p> 
                            <p>Aanwezig: </p>
                            @if($accomodation->presence != 0)
                            <p>Blijf je slapen: </p>
                            @if($accomodation->stay_over == 1)
                            <p>Waarmee blijf je slapen: </p>
                            <p>breedte {{$accomodation->accomodation_type ?? 'verblijf'}}: </p>
                            <p>lengte {{$accomodation->accomodation_type ?? 'verblijf'}}: </p>
                            @endif
                            <p>Wanneer ben je er: </p>
                            <p>Met hoeveel ben je:</p>
                            <p>Blijf je zaterdag avond eten: </p>
                            <p>Blijf je zondag ochtend eten: </p>
                            <p>Blijf je zondag avond eten: </p>
                            @endif
                        </div>
                        <div class="ml-5">
                            <p>{{$accomodation->id}}</p>
                            @if($accomodation->presence == 1)<p>{{"Ja"}}@else<p>{{"Nee"}}@endif </p>
                            @if ($accomodation->presence != 0)
                                @if($accomodation->stay_over == 1)<p>{{"Ja"}}@else<p>{{"Nee"}}@endif</p>
                                @if($accomodation->stay_over == 1)
                                <p>{{$accomodation->accomodation_type}}</p>
                                <p>{{$accomodation->accomodation_width}}</p>
                                <p>{{$accomodation->accomodation_length}}</p>
                                @endif
                                <p>@if ($accomodation->number_of_guests_weekend >= 1) {{"Het hele weekend"}}
                                                        @else @if($accomodation->number_of_guest_sat >= 1) {{"Alleen zaterdag"}}
                                                        @else @if($accomodation->number_of_guest_sun >= 1) {{"Alleen zondag"}}
                                                        @endif @endif @endif</p>
                                <p>@if ($accomodation->number_of_guests_weekend >= 1) {{$accomodation->number_of_guests_weekend}} 
                                                        @else @if($accomodation->number_of_guest_sat >= 1) {{$accomodation->number_of_guest_sat}} 
                                                        @else @if($accomodation->number_of_guest_sun >= 1) {{$accomodation->number_of_guest_sun}}
                                                        @endif @endif @endif mensen</p>
                                <p>@if($accomodation->dinner_sat == 1){{"Ja"}}@else{{"Nee"}}@endif</p>
                                <p>@if($accomodation->brunch_sun == 1){{"Ja"}}@else{{"Nee"}}@endif</p>
                                <p>@if($accomodation->dinner_sun == 1){{"Ja"}}@else{{"Nee"}}@endif</p>
                            @endif
                        </div>
                            
                    @endif
                    </div>
            </div>
            <div class="flex flex-col items-center">
                <button class="mt-2 p-1 text-green-400 border border-solid border-black bg-purple-500 rounded-md  hover:bg-white hover:text-green-500 hover:font-bold hover:scale-105 transition duration-300"><a href="{{route('accomodationShow')}}">Terug naar reservering pagina</a></button>    
                <button class="mt-2 p-1 text-green-400 border border-solid border-black bg-purple-500 rounded-md  hover:bg-white hover:text-green-500 hover:font-bold hover:scale-105 transition duration-300"><a href="{{route('adminIndex')}}">Terug naar admin pagina</a></button>
                <button class="mt-2 p-1 text-green-400 border border-solid border-black bg-purple-500 rounded-md  hover:bg-white hover:text-green-500 hover:font-bold hover:scale-105 transition duration-300"><a href="{{route('userShow')}}">Terug naar users</a></button>
                </div>
            </div>
    </div>
    
</x-layout>