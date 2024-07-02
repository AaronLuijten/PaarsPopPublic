<x-layout>  
    <link href="{{asset('css/lineup.css')}}" rel="stylesheet">

    <form action="{{ route('line_up.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="container_create">
            <div class="create">
                <div class="row1">
                    <label for="artist_name">Artist name:</label>
                    <input type="text" name="artist_name" id="artist_name">
                </div>
                
                <div class="row2">
                    <label for="artist_desc">Artist description:</label>
                    <input type="text" name="artist_desc" id="artist_desc">
                </div>
            </div>
        </div>
    </form>
</x-layout>