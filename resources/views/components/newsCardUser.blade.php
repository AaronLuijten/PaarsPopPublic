@props(['news'])
<div class="bg-purple-700 rounded-md p-2 m-4">
<article >
    <div class="bg-purple-600 p-2 rounded-md">
    <header class="flex items-start font-bold text-lg text-green-400">
        <h2>{{$news->Title}}</h2>
    </header>
        <main>
            <p class="text-green-400">{{$string = Str::of($news->content)->words(10, '...');}}</p>
            @if ($news->attachment)
                <div class=" w-2/6">
                    <img src="{{asset($news->attachment->filepath . $news->attachment->filename)}}" alt="" class="rounded-md border-green-400 border">
                </div>
                
            @endif
        </main>
    </div>
    <footer class="text-base">
        <p class="text-green-400">Datum: {{$news->uploadDate}}</p>
        <a href="{{route('showArticle', [$news->id])}}" class="text-green-400 hover:font-bold hover:underline">Read more...</a>
    </footer>
</article>
</div>