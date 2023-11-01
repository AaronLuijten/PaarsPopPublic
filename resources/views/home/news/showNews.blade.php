<x-layout>
    <div class="flex flex-col items-center mt-2">
        <div class="bg-purple-400 rounded-md p-2 w-11/12 lg:w-1/3">
            <h2 class="text-green-400 font-bold">{{$news->Title}}</h2>
            <div class="bg-purple-500 p-1 rounded-md">
                @if ($news->attachment)
                    <img src="{{asset($news->attachment->filepath . $news->attachment->filename)}}" alt="" class="rounded-md border-green-400 border">
                @endif
                <p class="text-green-400 text-base">{{$news->content}}</p>
            </div>
        </div>
        <button class="mt-2 p-1 text-green-400 border border-solid border-black bg-purple-600 rounded-md  hover:bg-white hover:text-green-500 hover:font-bold hover:scale-105 transition duration-300 m-2"><a href="{{url()->previous()}}">Terug</a></button>
    </div>
</x-layout>