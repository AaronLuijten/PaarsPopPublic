<x-layout>
    <div class="flex flex-col items-center m-2 ">
        <h2 class="text-green-400 font-bold">Nieuws</h2>
        <div class="bg-purple-500 rounded-md p-2 w-full lg:w-1/3">
            @foreach ($newsPosts as $news)
                <div class="mb-10">
                    <x-newsCardUser :news="$news"></x-newsCardUser>
                </div> 
            @endforeach
        </div>
    </div>
</x-layout>