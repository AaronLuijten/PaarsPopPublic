<x-layout>
    <button class="mt-2 p-1 text-green-400 border border-solid border-black bg-purple-500 rounded-md  hover:bg-white hover:text-green-500 hover:font-bold hover:scale-105 transition duration-300 m-2"><a href="{{route('adminIndex')}}">Terug naar admin pagina</a></button>
    <div class="flex flex-col items-center  m-3">
        <h2 class="text-green-400 font-bold">Alle reserveringen: </h2>
        <div class="bg-purple-500 p-2 rounded-md">
            <table>
                <tr class="border border-black p-1 text-green-400 text-lg bg-purple-600">
                    <th class="border border-black p-1">Reservatie naam</th>
                    <th class="border border-black p-1">Gebruiker ID</th>
                    <th class="border border-black p-1">Reservering ID</th>
                    <th class="border border-black p-1">Aanwezig</th>
                    <th class="border border-black p-1">Blijft slapen</th>
                    <th class="border border-black p-1">Verblijf type</th>
                    <th class="border border-black p-1">Verblijf uitmeting</th>
                    <th class="border border-black p-1">Dag(en) Aanwezig</th>
                    <th class="border border-black p-1">Groepgrootte</th>
                    <th class="border border-black p-1">Dinner zaterdag</th>
                    <th class="border border-black p-1">Brunch zondag</th>
                    <th class="border border-black p-1">Dinner zondag</th>
                </tr>
                @php
                    $accomodationCount = 0;
                    $totalSpace = 0;
                    $guestSat = 0;
                    $guestSun = 0;
                    $amountDinSat = 0;
                    $amountBrunchSun = 0;
                    $amountDinSun = 0;
                    $stay_overCount = 0;
                @endphp
                @foreach ($users as $user)
                    {{-- @if($user->accomodation) --}}
                        <tr class="border border-black p-1 text-green-400 text-base">
                            <th class="hover:bg-purple-400 border border-black p-1"><a href="{{route('userDetailed', [$user->user_id])}}">{{$user->first_name}}</a></th>
                            <th class="hover:bg-purple-400 border border-black p-1"><a href="{{route('userDetailed', [$user->user_id])}}">{{$user->user_id}}</a></th>
                            <th class="hover:bg-purple-400 border border-black p-1"><a href="{{route('userDetailed', [$user->user_id])}}">{{$user->id}}</a></th>
                            <th class="border border-black p-1">@if($user->presence == 1) Ja @php $stay_overCount += 1; @endphp @else Nee @endif</th>
                            <th class="border border-black p-1">@if($user->stay_over == 1) Ja  @else Nee @endif</th>
                            <th class="border border-black p-1">@if($user->accomodation_type){{$user->accomodation_type}}@else Geen @endif</th>
                            <th class="border border-black p-1">@if($user->accomodation_type){{$user->accomodation_width * $user->accomodation_length}} M<sup>2</sup> @else Geen @endif</th>
                            <th class="border border-black p-1">@if ($user->number_of_guests_weekend >= 1) {{"Het hele weekend"}}
                                @else @if($user->number_of_guest_sat >= 1) {{"Alleen zaterdag"}}
                                @else @if($user->number_of_guest_sun >= 1) {{"Alleen zondag"}}
                                @else @if(!$user->presence) Geen
                                @endif @endif @endif @endif</th>
                            <th class="border border-black p-1">@if ($user->number_of_guests_weekend >= 1) {{$user->number_of_guests_weekend}} 
                                 @php
                                  $guestSat += $user->number_of_guests_weekend; 
                                  $guestSun += $user->number_of_guests_weekend; 
                                @endphp
                                @else @if($user->number_of_guest_sat >= 1) {{$user->number_of_guest_sat}} @php $guestSat += $user->number_of_guest_sat; @endphp
                                @else @if($user->number_of_guest_sun >= 1) {{$user->number_of_guest_sun}}  @php $guestSun += $user->number_of_guest_sun; @endphp
                                @else @if($user->presence == 0)Geen
                                @endif @endif @endif @endif mensen</th>
                            <th class="border border-black p-1">@if($user->dinner_sat == 1)
                                    Ja 
                                    @php
                                        if($user->number_of_guests_weekend)
                                        {
                                            $amountDinSat += $user->number_of_guests_weekend;
                                        }
                                        elseif($user->number_of_guest_sat)
                                        {
                                            $amountDinSat += $user->number_of_guest_sat;
                                        }
                                    @endphp
                                @else
                                    Nee 
                                 @endif</th>
                            <th class="border border-black p-1">@if($user->brunch_sun == 1)
                                    Ja
                                    @php
                                        if($user->number_of_guests_weekend)
                                        {
                                            $amountBrunchSun += $user->number_of_guests_weekend;
                                        }
                                        elseif($user->number_of_guest_sun)
                                        {
                                            $amountBrunchSun += $user->number_of_guest_sun;
                                        }
                                    @endphp 
                                @else 
                                    Nee 
                                @endif</th>
                            <th class="border border-black p-1">@if($user->dinner_sun == 1)
                                    Ja
                                    @php
                                        if($user->number_of_guests_weekend)
                                        {
                                            $amountDinSun += $user->number_of_guests_weekend;
                                        }
                                        elseif($user->number_of_guest_sun)
                                        {
                                            $amountDinSun += $user->number_of_guest_sun;
                                        }
                                    @endphp 
                                @else 
                                    Nee 
                                @endif</th>
                        </tr>
                        @php
                            $accomodationCount+= 1;
                            $totalSpace += ($user->accomodation_width * $user->accomodation_length)
                        @endphp
                    {{-- @endif --}}
                @endforeach
            </table>
            <div class="flex flex-col font-bold text-green-400 items-center">
                <div>
                    <h3>Totaal reservering: {{$accomodationCount}}</h3>
                    <h3>Totaal aanwezig: {{$stay_overCount}}</h3>
                    <h3>Totaal M<sup>2</sup> in gebruik: {{$totalSpace}}</h3>
                    <h3>Aantal mensen zaterdag: {{$guestSat}}</h3>
                    <h3>Aantal mensen zondag: {{$guestSun}}</h3>
                    <h3>Aantal eten dinner zat: {{$amountDinSat}}</h3>
                    <h3>Aantal eten brunch zon: {{$amountBrunchSun}}</h3>
                    <h3>Aantal eten dinner zon: {{$amountDinSun}}</h3>
                </div>
                
            </div>
        </div>
    </div>
</x-layout>