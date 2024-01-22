<x-layout>
    <div class="flex-container-create">
        <div class="form-box-create">
            @if (Auth::check() && Auth::user()->accomodation)
                <div class="" role="alert">
                   <p>Hey {{Auth::user()->first_name}}, je hebt je verblijf voor dit weekend al doorgegeven!</p> <br>
                   <p>Bekijk 'm <a href="{{route('showacco')}}" class="">hier</a></p>
                </div>
            @else
            <form action="" method="POST" class="">
                <div class="">
                    @csrf
                    <div class="">
                        <h2>Verblijf doorgeven</h2>
                    </div>
                    {{-- Ben je aanwezig? --}}
                    <div class="box-margin">
                        <div class="flex"><p class="star">*&nbsp;</p>Ben je aanwezig?: </div>
                        <div class="flex">
                            <input type="radio" name="presence" id="presence_yes" class="radio-button" value=1 @if (old('presence') == 1) checked @endif>
                            <label for="presence_yes" class="">&nbsp;Ja</label>
                        </div>
                        
                        <div class="flex">
                            <input type="radio" name="presence" id="presence_no" class="radio-button" value=0 @if (old('presence') != 1 ) checked @endif>
                            <label for="presence_no" class="">&nbsp;Nee</label>
                        </div>
                        
                    </div>
                    <div id="full_form" style="display: none;" >
                        {{-- Blijf je slapen? --}}
                        <div class="box-margin"> 
                            <div class="flex"><p class="star">*&nbsp;</p>Blijf je slapen?</div>
                            <div class="flex">
                                <input type="radio" name="stay_over" id="sleep_yes" value=1 onclick="showAccomodationSpecs()">
                                <label for="sleep_yes">&nbsp;Ja</label>
                            </div>
                            
                            <div class="flex">
                                <input type="radio" name="stay_over" id="sleep_no" value=0 onclick="showAccomodationSpecs()">
                                <label for="sleep_no">&nbsp;Nee</label>
                            </div>

                        </div>
                        {{-- type verblijf? --}}
                        <div class="box-margin">
                            <div  id="accomodation_specs" style="display: none;">
                                <div class="flex"><p class="star">*&nbsp;</p>Hoe blijf je slapen: </div>
                                <div>
                                    <input type="radio" name="accomodation_type" id="accomodation_tent" value="tent" onchange="changeLabelText(this)">
                                    <label for="accomodation_tent" id="label_text" class="">tent</label>
                                </div>
                                <div>
                                    <input type="radio" name="accomodation_type" id="accomodation_anders" value="anders" onchange="changeLabelText(this)">
                                    <label for="accomodation_anders" id="label_text" class="">Anders</label>
                                </div>

                                <div id="accomodation_anders_div" style="display: none;" class="box-margin">
                                    <label for="accomodation_anders_txt" id="label_text" class="flex"><p class="star">*&nbsp;</p>Vul in waarmee je blijft slapen: </label>
                                    <input type="text" name="accomodation_type_txt" id="accomodation_anders_txt"  class="input-text">
                            
                                {{-- verblijf lengte / breedte --}}
                                <div class="box-regular">
                                        <label for="accomodation_width" id='accomodation_width' class="">Breedte in meter:</label>
                                        <input type="number" name="accomodation_width" placeholder="Rond af naar boven als nodig"  id="accomodation_width" value="{{old('accomodation_width')}}" class="input-text">

                                        <label for="accomodation_lenght" id='accomodation_length' class="">Lengte in meter: </label>
                                        <input type="number" name="accomodation_length" placeholder="Rond af naar boven als nodig" id="accomodation_length" value="{{old('accomodation_width')}}" class="input-text">
                                </div>
                            </div>
                            {{-- Wanneer ben je er? --}}
                            <div id="presence_when" class="box-margin">
                                <div class="flex"><p class="star">*&nbsp;</p>Wanneer ben je er?: </div>
                                <div>
                                    <input type="radio" name="presence_day" id="all_weekend" value="weekend" onchange="changeInputName()">
                                    <label for="all_weekend">Zaterdag en zondag (22 en 23 juni)</label>
                                </div>
                                
                                
                                <div>
                                    <input type="radio" name="presence_day" id="saturday" value="saturday" onchange="changeInputName()">
                                    <label for="saturday">Alleen zaterdag (22 juni)</label>
                                </div>

                                <div>
                                    <input type="radio" name="presence_day" id="sunday" value="sunday" onchange="changeInputName()">
                                    <label for="sunday">Alleen zondag (23 juni)</label>
                                </div>
                            </div>
                            <div class="box-margin">
                                {{-- Met hoeveel personen?  --}}
                                <label for="guests"  class="">Met hoeveel personen kom je?: </label>
                                <input type="number" name="" id="guests" class="">
                            </div>
                            
                        </div>

                        {{-- Blijf je eten? --}}
                        <div class="box-margin">
                            <div class="flex"><p class="star">*&nbsp;</p>(Wanneer) blijf je eten?: </div>
                            <div id="saturday">
                                <input type="checkbox" name="dinner_sat" id="dinner_sat" value=1>
                                <label for="dinner_sat">Diner zaterdag avond 18:00</label>
                            </div>
                            
                            <div id="sunday">
                                <input type="checkbox" name="brunch_sun" id="brunch_sun" value=1>
                                <label for="brunch_sun">Brunch zondag ochtend 09:30 tot 12:30</label>
                                <br>
                                <input type="checkbox" name="dinner_sun" id="dinner_sun" value=1>
                                <label for="dinner_sun">Diner zondag avond 18:00</label>
                            </div>
                        </div>
                    </div>
                    <div id="submit_div" style='display: block;'>
                        <input type="submit" value="Opslaan" id="submit" class="button-green">
                    </div>

                    @if (!$errors->isEmpty())
                        <div class="error-box">
                            @foreach ($errors->all() as $error)
                                <div class="">{{$error}}</div>
                            @endforeach
                        </div>
                    @endif
                    
                </div>
            </form>
            @endif
            
        </div>    
    </div>

    <script>
        function changeLabelText(radioButton) {
            var radioTent = document.getElementById('accomodation_tent');
            var andersOption = document.getElementById('accomodation_anders_div');
            var andersText = document.getElementById('accomodation_anders_txt')
            var originalName = 'accomodation_type'
            var widthLabel = document.getElementById('accomodation_width');
            var lengthLabel = document.getElementById('accomodation_length');

            if (radioButton.value === 'anders') {
                andersOption.style.display = 'block';
                andersText.name = 'accomodation_type';
                radioTent.name = '';
                andersText.addEventListener('input', function() {
                var text = andersText.value
                widthLabel.innerText = 'Breedte ' + text + ' in meter: ';
                lengthLabel.innerText = 'Lengte '+ text +' in meter: ' ;
                });
            } else if (radioButton.value === 'tent'){
                andersOption.style.display = 'none';
                andersText.name = '';
                radioTent.name = originalName;
                widthLabel.innerText = 'Breedte tent in meter:';
                lengthLabel.innerText = 'Lengte tent in meter:';
            }
            }

    
        function setupCheckboxListener() {
            const presenceYes = document.getElementById('presence_yes');
            const presenceNo = document.getElementById('presence_no');
            const hiddenDiv = document.getElementById('full_form');
            const submit = document.getElementById('submit_div');

            function toggleHiddenDiv() {
                if (presenceNo.checked || (!presenceYes.checked && !presenceNo.checked)) {
                hiddenDiv.style.display = 'none';
                }else if(presenceYes.checked){
                hiddenDiv.style.display = 'block';
                } 
            }

            function toggleSubmit()
            {
                if(presenceNo.checked || presenceYes.checked)
                {
                submit.style.display = 'block';
                }
                else
                {
                submit.style.display = 'none';
                }  
            }

            presenceYes.addEventListener('change', toggleHiddenDiv);
            presenceYes.addEventListener('change', toggleSubmit)
            presenceNo.addEventListener('change', toggleHiddenDiv);
            presenceNo.addEventListener('change', toggleSubmit);
        }

        function changeInputName() {
        var radioButtons = document.getElementsByName("presence_day");
        var input = document.getElementById("guests");
        if (radioButtons[0].checked) {
          input.name = "number_of_guests_weekend";
        } else if (radioButtons[1].checked) {
          input.name = "number_of_guest_sat";
        } else if (radioButtons[2].checked) {
          input.name = "number_of_guest_sun";
        }
      }

        setupCheckboxListener();

        function showAccomodationSpecs()
        {
            var radioButtons = document.getElementsByName("stay_over");
            var div = document.getElementById("accomodation_specs");
            if (radioButtons[0].checked) 
            {
                div.style.display = "block";
            }
            else 
            {
                div.style.display = "none";
            }
        }

        window.addEventListener('load', hiddenDiv())
      </script>
</x-layout>