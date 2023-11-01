<x-layout>
    <div class="p-2 flex justify-center">
        <div class="shadow-2xl rounded-md bg-purple-500 mt-5 text-sm lg:text-xl p-3 w-fit flex flex-row justify-center">
            <form action="" method="POST" class="pl-2 pr-2 pb-2 text-white flex flex-col border border-transparent rounded-md m-0 items-center ">
                @csrf
                <div class="text-green-300">
                    <b>Verblijf wijzigen</b>
                </div>
                {{-- Ben je aanwezig? --}}
                <div class=" mb-3">
                    <p class="text-green-300">Ben je aanwezig?: </p>
                    <label for="presence_yes" class="text-green-300">Ja</label>
                    <input type="radio" name="presence" id="presence_yes" @if($accomodation->presence == 1)checked @endif value=1>

                    <label for="presence_no" class="text-green-300">Nee</label>
                    <input type="radio" name="presence" id="presence_no" @if($accomodation->presence == 0)checked @endif value=0>
                </div>
                <div id="full_form" style="display: none;" class="items-center p-5">
                    {{-- Blijf je slapen? --}}
                    <div> 
                        <p class="text-green-300">Blijf je slapen?</p>
                        <input type="radio" name="stay_over" id="sleep_yes" value=1 @if($accomodation->stay_over == 1)checked @endif  onclick="showAccomodationSpecs()">
                        <label for="sleep_yes">Ja</label>

                        <input type="radio" name="stay_over" id="sleep_no" value=0 @if($accomodation->stay_over == 0)checked @endif onclick="showAccomodationSpecs()">
                        <label for="sleep_no">Nee</label>
                    </div>
                    {{-- type verblijf? --}}
                    <div class="mb-3 flex flex-col">
                        <div  id="accomodation_specs" style="display: none;">
                            <p class="text-green-300">Waarmee blijf je slapen: </p>
                            <div>
                                <input type="radio" name="accomodation_type_rad" id="accomodation_tent" value="tent" @if($accomodation->accomodation_type == 'tent')checked @endif onchange="changeLabelText(this)">
                                <label for="accomodation_tent" id="label_text" class="text-green-300">tent</label>
                            </div>
                            <div>
                                <input type="radio" name="accomodation_type_rad" id="accomodation_anders" value="anders" @if($accomodation->accomodation_type != 'tent' && $accomodation->accomodation_type != null)checked @endif onchange="changeLabelText(this)">
                                <label for="accomodation_anders" id="label_text" class="text-green-300">Anders</label>
                            </div>

                            <div id="accomodation_anders_div" style="display: none;">
                                <label for="accomodation_anders_txt" id="label_text" class="text-green-300">Vul in waarmee je blijft slapen: </label><br>
                                <input type="text" name="accomodation_type_txt" id="accomodation_anders_txt"  @if($accomodation->accomodation_type) value={{$accomodation->accomodation_type}} @endif class="text-purple-400 focus:bg-purple-400 focus:text-green-400 font-bold transition duration-300">
                            </div>
                            
                        
                            {{-- verblijf lengte / breedte --}}
                            <div class="flex flex-col">
                                    <label for="accomodation_width" id='accomodation_width' class="text-green-300">Breedte in meter:</label>
                                    <input type="number" name="accomodation_width" @if($accomodation->accomodation_length) value={{$accomodation->accomodation_length}}@endif placeholder="Rond af naar boven als nodig"  id="accomodation_width" value="{{old('accomodation_width')}}" class="text-purple-400 focus:bg-purple-400 focus:text-green-400 font-bold transition duration-300 ">
                                    <label for="accomodation_lenght" id='accomodation_length' class="text-green-300">Lengte in meter: </label>
                                    <input type="number" name="accomodation_length" @if($accomodation->accomodation_width) value={{$accomodation->accomodation_width}}@endif placeholder="Rond af naar boven als nodig" id="accomodation_length" value="{{old('accomodation_width')}}" class="text-purple-400 focus:bg-purple-400 focus:text-green-400 font-bold transition duration-300">
                            </div>
                        </div>
                        {{-- Wanneer ben je er? --}}
                        <div id="presence_when" class="flex flex-col">
                            <p class="text-green-300">Wanneer ben je er?: </p>
                            <div>
                                <input type="radio" name="presence_day" id="all_weekend" @if($accomodation->number_of_guests_weekend) checked @endif value="weekend" onclick="changeInputName()">
                                <label for="all_weekend">Zaterdag en zondag (22 en 23 juni)</label>
                            </div>
                            
                            
                            <div>
                                <input type="radio" name="presence_day" id="saturday"  @if($accomodation->number_of_guest_sat) checked @endif  value="saturday" onclick="changeInputName()">
                                <label for="saturday">Alleen zaterdag (22 juni)</label>
                            </div>

                            <div>
                                <input type="radio" name="presence_day" id="sunday"  @if($accomodation->number_of_guest_sun) checked @endif  value="sunday" onclick="changeInputName()">
                                <label for="sunday">Alleen zondag (23 juni)</label>
                            </div>
                        </div>
                        {{-- Met hoeveel personen?  --}}
                        <label for="guests"  class="text-green-300">Met hoeveel personen kom je?: </label>
                        <input type="number" name="" id="guests"    @if($accomodation->number_of_guests_weekend) value={{$accomodation->number_of_guests_weekend}}
                                                                    @else @if($accomodation->number_of_guest_sat) value={{$accomodation->number_of_guest_sat}}
                                                                    @else @if($accomodation->number_of_guest_sun) value={{$accomodation->number_of_guest_sun}}
                                                                    @endif @endif @endif class="text-purple-400 focus:bg-purple-400 focus:text-green-400 font-bold transition duration-300">
                        {{-- Blijf je eten? --}}
                        <div>
                            <p class="text-green-300">(Wanneer) blijf je eten?: </p>
                            <div id="saturday">
                                <input type="checkbox" name="dinner_sat" id="dinner_sat" @if($accomodation->dinner_sat) checked @endif value=1 onchange="changeCheckboxName()">
                                <input type="hidden" name="dinner_sat" id="hidden_dinner_sat" value=0>
                                <label for="dinner_sat">Diner zaterdag avond 18:00</label>
                            </div>
                            
                            <div id="sunday">
                                <input type="checkbox" name="brunch_sun" id="brunch_sun" @if($accomodation->brunch_sun) checked @endif value=1 onchange="changeCheckboxName()">
                                <input type="hidden" name="brunch_sun" id="hidden_brunch_sun" value=0>
                                <label for="brunch_sun">Brunch zondag ochtend 09:30 tot 12:30</label>
                                <br>
                                <input type="checkbox" name="dinner_sun" id="dinner_sun" @if($accomodation->dinner_sun) checked @endif value=1 onchange="changeCheckboxName()">
                                <input type="hidden" name="dinner_sun" id="hidden_dinner_sun" value=0>
                                <label for="dinner_sun">Diner zondag avond 18:00</label>
                            </div>
                        </div>
                        <script>
                            function changeCheckboxName()
                            {
                                var dinner_sat = document.getElementById('dinner_sat');
                                var brunch_sun = document.getElementById('brunch_sun');
                                var dinner_sun = document.getElementById('dinner_sun');

                                var hidden_dinner_sat = document.getElementById('hidden_dinner_sat');
                                var hidden_brunch_sun = document.getElementById('hidden_brunch_sun');
                                var hidden_dinner_sun = document.getElementById('hidden_dinner_sun');

                                if(!dinner_sat.checked)
                                    {
                                        hidden_dinner_sat.name = 'dinner_sat';
                                        dinner_sat.name = 'unchecked_dinner_sat';
                                    }
                                    else
                                    {
                                        hidden_dinner_sat.name = "hidden_dinner_sat";
                                        dinner_sat.name = "dinner_sat";
                                    }
                                if(!brunch_sun.checked)
                                {
                                    hidden_brunch_sun.name = 'brunch_sun';
                                    brunch_sun.name = 'unchecked_brunch_sun';
                                }
                                else
                                    {
                                        hidden_brunch_sun.name = "hidden_brunch_sun";
                                        brunch_sun.name = "brunch_sun";
                                    }
                                if(!dinner_sun.checked)
                                    {
                                        hidden_dinner_sun.name = 'dinner_sun';
                                        dinner_sun.name = 'unchecked_dinner_sun';
                                    }
                                    else
                                    {
                                        hidden_dinner_sun.name = "hidden_dinner_sun";
                                        dinner_sun.name = "dinner_sun";
                                    }
                                }
                                window.addEventListener("load", changeCheckboxName())
                        </script>
                    </div>
                </div>
                        
                    
                    
                
                <div id="submit_div" style='display: none;'>
                    <input type="submit" value="Aanpassingen Opslaan" id="submit" class="text-green-400 p-1 border border-solid border-black bg-purple-600 rounded-md  hover:bg-white hover:text-green-500 hover:font-bold hover:scale-105 transition duration-300">
                </div>
                @foreach ($errors->all() as $error)
                    <div class="text-red-500">{{$error}}</div>
                @endforeach
            </form>
            
        </div>    
    </div>

    <script>
        function changeLabelText(radioButton) {
            var radioTent = document.getElementById('accomodation_tent');
            var andersOption = document.getElementById('accomodation_anders_div');
            var andersText = document.getElementById('accomodation_anders_txt')
            var originalName = 'accomodation_type_rad'
            var widthLabel = document.getElementById('accomodation_width');
            var lengthLabel = document.getElementById('accomodation_length');

            if (radioButton.value === 'anders') {
                andersOption.style.display = 'block';
                andersText.name = 'accomodation_type';
                radioTent.name = originalName;
                andersText.addEventListener('input', function() {
                var text = andersText.value
                widthLabel.innerText = 'Breedte ' + text + ' in meter: ';
                lengthLabel.innerText = 'Lengte '+ text +' in meter: ' ;
                });
            } else if (radioButton.value === 'tent'){
                andersOption.style.display = 'none';
                andersText.name = originalName;
                radioTent.name = 'accomodation_type';
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

            toggleHiddenDiv();
            toggleSubmit();
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
        document.addEventListener("DOMContentLoaded", function() {
            setupCheckboxListener();
            changeLabelText(document.querySelector('input[name="accomodation_type_rad"]:checked'));
            showAccomodationSpecs();
        });
        window.addEventListener('load', changeInputName())
      </script>
</x-layout>