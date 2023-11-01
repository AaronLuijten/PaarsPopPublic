<x-layout>
    <div class="flex flex-col items-center m-2">
        <h1 class="font-bold text-green-400 text-base lg:text-xl">Welkom op de officiële pagina voor PaarsPop24!</h1>
        <div class="bg-purple-500 rounded-md p-2 m-2 flex flex-col items-center text-green-400 font-bold">
            @if(isset($news))
            <a href="{{route('showCard')}}" class="hover:underline">Er is nieuws van vandaag!</a>
            @else
            <a href="{{route('showCard')}}" class="hover:underline">Nieuws!</a>
            @endif
            <a href="{{route('lineup')}}" class="hover:underline">PaarsPop Programma</a>
            <a href="{{route('showMap')}}" class="hover:underline">Festival Plattegrond</a>
        </div>

        <div>
            @if($errors->any())
                <div class="flex justify-center ">
                    <div class="bg-purple-400 p-5 mt-5 rounded-md w-fit flex items-center flex-col">
                        @foreach ($errors->all() as $error)
                            <div class="text-red-500 bg-purple-700 p-2 m-1 rounded-lg">{{$error}}</div>
                        @endforeach
                        <button class="p-1 mt-3 bg-green-400 bg-opacity-90 border font-bold border-black border-solid rounded-md hover:bg-white hover:text-green-500 hover:font-bold hover:scale-105 transition duration-300">
                            <a href="{{route('index')}}">Terug</a>
                        </button>
            
                    </div>
                </div>
            @endif
        </div>  
        <div class="bg-purple-500 p-1 border-2 border-green-400 rounded-md w-11/12 lg:w-7/12 flex flex-col items-center">
            <iframe class="rounded-md" id="maps_embed" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d741.1446260828529!2d4.443119069683837!3d51.61457193099683!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c43def250b9f59%3A0x1e5fb644d99e8420!2sBrugstraat%206%2C%204754%20AA%20Stampersgat!5e1!3m2!1snl!2snl!4v1688541664480!5m2!1snl!2snl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <p class="text-green-400 text-base lg:text-lg font-bold">Adres: Brugstraat 6, 4754AA Stampersgat</p>
            <script>
                function adjustMapSize() {
                    var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
                    var mapIframe = document.getElementById('maps_embed');
                    var mapContainer = document.getElementById('map-container');

                    // Adjust the map width based on the screen width
                    if (screenWidth < 800) {
                        mapIframe.style.width = '100%'; // Set the iframe width to 100% for small screens
                    } else {
                        // Set a custom width for larger screens
                        var desiredWidth = screenWidth * 0.5; // Adjust the factor as per your requirements
                        mapIframe.style.width = desiredWidth + 'px';
                    }
                }

                // Call the adjustMapSize function when the page loads and when the window is resized
                window.addEventListener('load', adjustMapSize);
                window.addEventListener('resize', adjustMapSize);
            </script>
        </div>
    </div>
</x-layout>