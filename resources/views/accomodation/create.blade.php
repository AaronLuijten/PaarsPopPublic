<x-layout>
    <div class="p-2 flex justify-center">
        <div class="shadow-2xl rounded-md bg-purple-500 mt-5 p-3 w-fit flex flex-row justify-center">
            @if (Auth::check() && Auth::user()->accomodation)
                <div class="text-green-400 font-bold  p-2 rounded-md flex flex-col items-center bg-purple-600" role="alert">
                   <p>Hey {{Auth::user()->first_name}}, je hebt je verblijf voor dit weekend al doorgegeven!</p> <br>
                   <p>Bekijk 'm <a href="{{route('showacco')}}" class="hover:underline">hier</a></p>
                </div>
            @else
            <form action="" method="POST" class="pl-2 pr-2 pb-2 text-white flex flex-col border border-transparent rounded-md m-0 items-center ">
                <div class="justify-center">
                    @csrf
                    <div class="text-green-300">
                        <b>Verblijf doorgeven</b>
                    </div>
                    {{-- Ben je aanwezig? --}}
                    <div class=" mb-3 p-5">
                        <p class="text-green-300">Ben je aanwezig?: </p>
                        <label for="presence_yes" class="text-green-300">Ja!</label>
                        <input type="radio" name="presence" id="presence_yes" value=1 @if (old('presence') == 1) checked @endif>

                        <label for="presence_no" class="text-green-300">Nee</label>
                        <input type="radio" name="presence" id="presence_no" value=0 @if (old('presence') != 1 ) checked @endif>
                    </div>
                    <div id="full_form" style="display: none;" class="items-center ps-5-">
                        {{-- Blijf je slapen? --}}
                        <div> 
                            <p class="text-green-300">Blijf je slapen?</p>
                            <input type="radio" name="stay_over" id="sleep_yes" value=1 onclick="showAccomodationSpecs()">
                            <label for="sleep_yes">Ja</label>

                            <input type="radio" name="stay_over" id="sleep_no" value=0 onclick="showAccomodationSpecs()">
                            <label for="sleep_no">Nee</label>
                        </div>
                        {{-- type verblijf? --}}
                        <div class="mb-3 flex flex-col">
                            <div  id="accomodation_specs" style="display: none;">
                                <p class="text-green-300">Waarmee blijf je slapen: </p>
                                <div>
                                    <input type="radio" name="accomodation_type" id="accomodation_tent" value="tent" onchange="changeLabelText(this)">
                                    <label for="accomodation_tent" id="label_text" class="text-green-300">tent</label>
                                </div>
                                <div>
                                    <input type="radio" name="accomodation_type" id="accomodation_anders" value="anders" onchange="changeLabelText(this)">
                                    <label for="accomodation_anders" id="label_text" class="text-green-300">Anders</label>
                                </div>

                                <div id="accomodation_anders_div" style="display: none;">
                                    <label for="accomodation_anders_txt" id="label_text" class="text-green-300">Vul in waarmee je blijft slapen: </label><br>
                                    <input type="text" name="accomodation_type_txt" id="accomodation_anders_txt"  class="text-purple-400 focus:bg-purple-400 focus:text-green-400 font-bold transition duration-300">
                                </div>
                                {{-- 
                                    But now the names are wrong in the form I want to send the value Tent to the controller for validation, or the value in the spcify input if the radiobutton was checked at diffrent
                                    vraag voor chatgpt als wifi terug is...
                                    --}}
                                
                            
                                {{-- verblijf lengte / breedte --}}
                                <div class="flex flex-col">
                                        <label for="accomodation_width" id='accomodation_width' class="text-green-300">Breedte in meter:</label>
                                        <input type="number" name="accomodation_width" placeholder="Rond af naar boven als nodig"  id="accomodation_width" value="{{old('accomodation_width')}}" class="text-purple-400 focus:bg-purple-400 focus:text-green-400 font-bold transition duration-300 ">
                                        <label for="accomodation_lenght" id='accomodation_length' class="text-green-300">Lengte in meter: </label>
                                        <input type="number" name="accomodation_length" placeholder="Rond af naar boven als nodig" id="accomodation_length" value="{{old('accomodation_width')}}" class="text-purple-400 focus:bg-purple-400 focus:text-green-400 font-bold transition duration-300">
                                </div>
                            </div>
                            {{-- Wanneer ben je er? --}}
                            <div id="presence_when" class="flex flex-col">
                                <p class="text-green-300">Wanneer ben je er?: </p>
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
                            {{-- Met hoeveel personen?  --}}
                            <label for="guests"  class="text-green-300">Met hoeveel personen kom je?: </label>
                            <input type="number" name="" id="guests" class="text-purple-400 focus:bg-purple-400 focus:text-green-400 font-bold transition duration-300">
                            {{-- Blijf je eten? --}}
                            <div>
                                <p class="text-green-300">(Wanneer) blijf je eten?: </p>
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
                    </div>
                    <div id="submit_div" style='display: block;'>
                        <input type="submit" value="Opslaan" id="submit" class="text-green-400 p-1 border border-solid border-black bg-purple-600 rounded-md  hover:bg-white hover:text-green-500 hover:font-bold hover:scale-105 transition duration-300">
                    </div>
                    @foreach ($errors->all() as $error)
                        <div class="text-red-500">{{$error}}</div>
                    @endforeach
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