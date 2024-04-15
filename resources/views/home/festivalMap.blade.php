<x-layout>
    <div class="flex-information">
        <h2>Parkeer informatie</h2>
        <div class=flex-parking>
            <div>
                <img id="parkeren" src="{{asset('assets/images/Parkeer overzicht.jpg')}}" alt="Foto van parkeer overzicht" onclick="switchEnlarge()">
            </div>
            <div class="parking-text">
                <p>
                    Ons festivalterrein heeft helaas geen eigen parkeerterrein. De mogelijkheden om in onze straat te parkeren zijn beperkt en we willen ook de overlast met betrekking tot parkeren voor onze buren minimaliseren.  Laden en Lossen bij ons voor; géén probleem, maar we zouden het fijn vinden als je daarna je auto ergens anders parkeert.
                    Er zijn op de volgende plekken openbare parkeerplaatsen
                    -    Het Weike van Bus (achter de flat)
                    -    Bij het Dorpshuis in de havenstraat en aan de haven
                    -    Parkeerplaats bij voetbal en tennis 
                    Nb.. Je hoeft in Stampersgat nergens te betalen om te parkeren 😉</p>
            </div>
        </div>
        <h2>Festival plattegrond</h2>
        <div class="flex-map">
            <div class="">
                <img src="{{asset('assets/images/Festival terein 3D vanaf achterzijde huis.jpg')}}" width="" alt="Foto Festival 3D achterzijde huis" class="">
                <p>Festival terein 3D</p>
            </div>
            <div class="">
                <img src="{{asset('assets/images/Festival terein 3D vanaf achterzijd tuin.jpg')}}" width="" alt="Foto Festival 3D achterzijde huis" class="">
                <p>Festival terein 3D</p>
            </div>
        </div>
    </div>
</x-layout>
<script>
var b = true;
function switchEnlarge()
    {
        let img = document.getElementById("parkeren");

        if(b == true)
        {
            img.style.transform = "scale(1.4)";
            img.style.transition = "transition 0.25s ease";
            b = false;
        }
        else
        {
            img.style.transform = "scale(1.0)";
            img.style.transition = "transition 0.25s ease";
            b = true;
        }
        
    }
    
</script>