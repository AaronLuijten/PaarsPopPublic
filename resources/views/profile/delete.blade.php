<x-layout>
    <div class="flex items-center flex-col">
        <h1 class="font-bold text-green-400">account verwijderen</h1>
        <div class="bg-purple-500 rounded-md flex items-center flex-col p-2 text-sm lg:text-xl">
            <div>
                <p class="text-green-400 font-bold">Weet je zeker dat je je account permanent wilt verwijderen?</p>
            </div>
            <div class="bg-purple-500 rounded-md align-middle">
                <button class="mt-2 p-1 text-green-400 border border-solid border-black bg-purple-500 rounded-md  hover:bg-white hover:text-red-500 hover:font-bold hover:scale-105 transition duration-300"><a href="{{route('deleteConfirmed')}}">Ja</a></button>
                <button class="mt-2 p-1 text-green-400 border border-solid border-black bg-purple-500 rounded-md  hover:bg-white hover:text-green-500 hover:font-bold hover:scale-105 transition duration-300"><a href="{{route('profileView')}}">Nee</a></button>
            </div>    
        </div>
       
    </div>
</x-layout>