<x-layout>  
    <link href="{{asset('css/lineup.css')}}" rel="stylesheet">

    <h1>Line up</h1>

    <div class="container_lineup">
        @foreach ($lineup as $artist)
        <div class="artist_lineup">
            <img class="img_lineup" src="{{$artist->path}}">
            <div class="content_lineup">
                <div>
                    <div class="name_lineup">{{$artist->name}}</div>
                    <div class="desc_lineup">{{$artist->description}}</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-layout>