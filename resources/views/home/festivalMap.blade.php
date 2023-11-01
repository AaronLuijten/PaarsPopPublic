<x-layout>
    <div class="flex flex-col items-center">
        <h2 class="text-green-400 font-bold mt-3">Festival plattegrond</h2>
        <div class="bg-purple-500 p-2 rounded-md flex flex-col items-center w-11/12 lg:w-7/12 m-2">
            <button class="hover:underline text-green-400 font-bold mb-2"><a href="{{url()->previous()}}">Terug</a></button>
            <div class="mb-3 bg-purple-400 p-1 rounded-md">
                <img src="{{asset('assets/images/Festival terein 3D vanaf achterzijde huis.jpg')}}" width="" alt="Foto Festival 3D achterzijde huis" class="border-2 border-green-400 rounded-md">
                <p class="text-green-400 font-bold">Festival terein 3D</p>
            </div>
            <div class="mb-3 bg-purple-400 p-1 rounded-md">
                <img src="{{asset('assets/images/Festival terein 3D vanaf achterzijd tuin.jpg')}}" width="" alt="Foto Festival 3D achterzijde huis" class="border-2 border-green-400 rounded-md">
                <p class="text-green-400 font-bold">Festival terein 3D</p>
            </div>

            
        </div>
    </div>
</x-layout>