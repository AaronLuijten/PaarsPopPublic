<x-layout>
    <div class="flex flex-col items-center">
        <h2 class="text-green-400 mt-2">Delete</h2>
        <div class="bg-purple-500 rounded-md p-2  text-green-400 font-bold flex flex-col items-center">
                <h2>Weet je zeker dat je post "{{$news->Title}}" wilt verwijderen?</h2>
                <div>
                    <button class="mt-2 p-1 text-green-400 border border-solid border-black bg-purple-600 rounded-md  hover:bg-white hover:text-red-500 hover:font-bold hover:scale-105 transition duration-300 m-2"><a href="{{route('deleteConfirm', [$news->id])}}">Ja</a></button>
                    <button class="mt-2 p-1 text-green-400 border border-solid border-black bg-purple-600 rounded-md  hover:bg-white hover:text-green-500 hover:font-bold hover:scale-105 transition duration-300 m-2"><a href="{{route('newsIndex')}}">Nee</a></button>
                </div>
                
        </div>
    </div>
</x-layout>