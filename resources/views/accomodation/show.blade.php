<x-layout>
    
        @php
        $accomodation = Auth::user()->accomodation  
        @endphp
        <div class="flex-container-show">
            <div class="data-box-show">
                <h2>Jouw weekend bij Paarspop</h2>
                <div class="box-info">
                    <h3>Gegevens:</h3>
                    <div class="name_mail_number-box">
                        <div class="placeholder-user-info">
                            <p>Naam: </p>
                            <p>Email: </p>
                            <p>Telefoon nummer: </p>
                        </div>
                        <div class="data-user-info">
                            <p>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</p>
                            <p>{{Auth::user()->email}}</p>
                            <p>{{Auth::user()->phonenumber ?? 'Geen nummer gevonden'}}</p>
                        </div>
                    </div>
                    <div>
                        
                        @if (!Auth::user()->accomodation)
                            <div class="">
                                <div class="" role="alert">
                                    <h2>Je hebt je verblijf voor dit weekend nog niet doorgegeven</h2>
                                    <p>We willen je vragen dat even <a href="{{route('create')}}" class="">hier</a> te doen.</p>
                                    
                                </div>
                                @if($errors->any())
                                    @foreach ($errors as $error)
                                        <div class="">{{$error}}</div>
                                    @endforeach
                                @endif
                                <div class="alert alert-succes">
                                    <div class="succes-alert">{{session('success')}}</div>
                                </div>
                                
                            </div>
                        </div>
                        @else
                    <h2>Reservering: </h2>
                    <div class="info-data-showing">
                        <div class="data-types-text">
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
                        <div class="data-info-text">
                            @if($accomodation->presence == 1)<p>{{"Ja"}}@else<p>{{"Nee"}}@endif </p>
                            @if ($accomodation->presence != 0)
                                @if($accomodation->stay_over == 1)<p>{{"Ja"}}@else<p>{{"Nee"}}@endif</p>
                                @if($accomodation->stay_over == 1)
                                <p>{{$accomodation->accomodation_type}}</p>
                                <p>{{$accomodation->accomodation_width}}M</p>
                                <p>{{$accomodation->accomodation_length}}M</p>
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
                            
                        
                    </div>
                    <div class="mt-3">
                        <button class="btn_filled"><a href="{{route('edit', [$accomodation->id])}}">aanpassen</a></button>
                        <button class="btn_filled"><a href="{{route('deleteAc', [$accomodation->id])}}">verwijder reservering</a></button>
                    </div>
                  </div>
                        @endif
            </div>
        </div>
</x-layout>