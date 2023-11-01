<x-layout>
    <div class="flex flex-col items-center m-3">
        <div class="bg-purple-500 p-2 rounded-md w-4/5 lg:w-2/5">
            <button class="mt-2 text-green-400 border border-solid border-black bg-purple-600 rounded-md  hover:bg-white hover:text-red-500 hover:font-bold hover:scale-105 transition duration-300 m-2"><a href="{{route('deleteNews', [$news->id])}}">Delete</a></button>
            <button class="mt-2 text-green-400 border border-solid border-black bg-purple-600 rounded-md  hover:bg-white hover:text-yellow-500 hover:font-bold hover:scale-105 transition duration-300 m-2"><a href="{{route('updateShow', [$news->id])}}">Edit</a></button>
    
            <div class="items-start">
                <h2 class="text-green-400 font-bold">{{$news->Title}}</h2> <h2 class="text-green-400 font-bold">ID: {{$news->id}}</h2>
            </div>
            <div class="bg-purple-400 rounded-md p-2">
                @if(isset($news->attachment))
                    <div>
                        <img src="{{asset($news->attachment->filepath . $news->attachment->filename)}}" alt="" class="rounded-md border-green-400 border-2 ">
                    </div>
                    <div class="text-green-400 bg-purple-400 rounded-md p-2">
                        {{$news->content}}
                    </div>
                @else
                    <div class="text-green-400">
                        {{$news->content}}
                    </div>
                @endif
            </div>
            
            <div>
                <p class="text-green-400 text-base ">Posted by: {{$news->user->first_name}} {{$news->user->last_name}}</p>
            </div>
        </div>
    </div>
    
</x-layout>