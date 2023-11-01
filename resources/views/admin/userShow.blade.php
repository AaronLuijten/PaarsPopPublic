<x-layout>
    <button class="mt-2 p-1 text-green-400 border border-solid border-black bg-purple-500 rounded-md  hover:bg-white hover:text-green-500 hover:font-bold hover:scale-105 transition duration-300 m-2"><a href="{{route('adminIndex')}}">Terug naar admin pagina</a></button>
    <div class="flex flex-col items-center mt-3">
        <div class="bg-purple-400 p-3 rounded-md text-sm lg:text-xl">
            <h2 class="font-bold text-green-400">Users</h2>
            <table class="border border-black p-2 text-green-400 bg-purple-600">
                <tr class="border border-black p-2 bg-purple-700">
                    <th class="border border-black p-2">ID</th>
                    <th class="border border-black p-2">Naam</th>
                    <th class="border border-black p-2">email</th>
                    <th class="border border-black p-2">telefoon</th>
                </tr>
                @foreach ($users as $user)
                    <tr class="border border-black p-2">
                        <th class="border border-black p-2 hover:bg-purple-400"><a href="{{route('userDetailed', [$user->id])}}">{{$user->id}}</a></th>
                        <th class="border border-black p-2 hover:bg-purple-400"><a href="{{route('userDetailed', [$user->id])}}">{{$user->first_name}} {{$user->last_name}}</a></th>
                        <th class="border border-black p-2">{{$user->email}}</th>
                        <th class="border border-black p-2">{{$user->phonenumber}}</th>
                    </tr>
                @endforeach
            </table>
            
        </div>
    </div>

</x-layout>
