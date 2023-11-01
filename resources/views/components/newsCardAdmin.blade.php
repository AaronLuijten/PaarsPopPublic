@props(['news'])
<div class="bg-purple-700 rounded-md p-2 m-4">
<article >
    <div class="bg-purple-600 p-2 rounded-md">
    <header class="flex items-start font-bold text-lg text-green-400">
        <h2 class=""><b>Title:</b> {{$news->Title}}</h2>
    </header>
        <main>
            <p class="text-green-400"><b>Content:</b> {{$string = Str::of($news->content)->words(10, '...');}}</p>
        </main>
    </div>
    <footer class="text-base">
        <p class="text-green-400">Datum: {{$news->uploadDate}}</p>
        <a href="{{route('showNews', [$news->id])}}" class="text-green-400 hover:font-bold hover:underline">Read more...</a>
    </footer>
    <div>
        <button class="mt-2 text-green-400 border border-solid border-black bg-purple-500 rounded-md  hover:bg-white hover:text-red-500 hover:font-bold hover:scale-105 transition duration-300 m-2"><a href="{{route('deleteNews', [$news->id])}}">Delete</a></button>
        <button class="mt-2 text-green-400 border border-solid border-black bg-purple-500 rounded-md  hover:bg-white hover:text-yellow-500 hover:font-bold hover:scale-105 transition duration-300 m-2"><a href="{{route('updateShow', [$news->id])}}">Edit</a></button>
    </div>
</article>
</div>