<x-layout>
    <div class="flex-information">
        <h2>Parkeer informatie</h2>
        <div class="flex-parking">
            <div>
                <img id="parkeren" src="{{asset('assets/images/Parkeer overzicht.jpg')}}" alt="Foto van parkeer overzicht" onclick="switchEnlarge()" onmouseover="showTooltip(event)" onmouseout="hideTooltip()">
                <div id="tooltip" class="tooltip">Klik om te vergoten</div>
            </div>
            <div class="parking-text">
                <p>
                    Ons festivalterrein heeft helaas geen eigen parkeerterrein. De mogelijkheden om in onze straat te parkeren zijn beperkt en we willen ook de overlast met betrekking tot parkeren voor onze buren minimaliseren.  Laden en Lossen bij ons voor; géén probleem, maar we zouden het fijn vinden als je daarna je auto ergens anders parkeert.
                    Er zijn op de volgende plekken openbare parkeerplaatsen
                    -    Het Weike van Bus (achter de flat)
                    -    Bij het Dorpshuis in de havenstraat en aan de haven
                    -    Parkeerplaats bij voetbal en tennis 
                    Nb.. Je hoeft in Stampersgat nergens te betalen om te parkeren 😉
                </p>
            </div>
        </div>
        <h2>Festival locatie</h2>
        <iframe class="maps-iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d859.6955232860154!2d4.443119069696915!3d51.614571098239885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c43def250b9f59%3A0x1e5fb644d99e8420!2sBrugstraat%206%2C%204754%20AA%20Stampersgat!5e1!3m2!1snl!2snl!4v1716309237193!5m2!1snl!2snl"
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        <div>
            <h2>Parkeer locaties</h2>
            <ul>
                <li>Weike van Bus : <a href="https://maps.app.goo.gl/VFjmqEcHZQ2NLZiM9" target="_blank" class="maps-link">51°36'49.7"N 4°26'37.7"E</a></li>
                <li>Havenstraat aan de haven: <a href="https://maps.app.goo.gl/XRCf7XHJG9Ynnj337" target="_blank" class="maps-link">51°36'51.5"N 4°26'46.3"E</a></li>
                <li>Havenstraat bij Dorpshuis: <a href="https://maps.app.goo.gl/w1nEB83CrN99JQGn6" target="_blank" class="maps-link">51°36'49.1"N 4°26'45.1"E</a></li>
                <li>Parkeerplaats voetbal en tennis: <a href="https://maps.app.goo.gl/ryZnGE6CpyUJsccF9" target="_blank" class="maps-link">51°36'51.4"N 4°26'03.8"E</a></li>
            </ul>
        </div>
    </div>
    
</x-layout>

<style>
    .tooltip {
        display: none;
        position: absolute;
        background-color: #333;
        color: #fff;
        padding: 5px;
        border-radius: 5px;
        font-size: 12px;
        z-index: 1000;
    }
</style>

<script>
var b = true;
function switchEnlarge() {
    let img = document.getElementById("parkeren");
    if (b) {
        if (isMobile()) {
            img.style.transform = "scale(1.4)";
        } else {
            img.style.transform = "scale(1.2)";
        }
        img.style.transition = "transform 0.25s ease";
        b = false;
    } else {
        img.style.transform = "scale(1.0)";
        img.style.transition = "transform 0.25s ease";
        b = true;
    }
}

function isMobile() {
    return /Mobi|Android/i.test(navigator.userAgent);
}

let tooltipTimeout;
function showTooltip(event) {
    tooltipTimeout = setTimeout(() => {
        let tooltip = document.getElementById('tooltip');
        tooltip.style.display = 'block';
        tooltip.style.left = event.pageX + 'px';
        tooltip.style.top = event.pageY + 'px';
    }, 500);
}

function hideTooltip() {
    clearTimeout(tooltipTimeout);
    document.getElementById('tooltip').style.display = 'none';
}
</script>
