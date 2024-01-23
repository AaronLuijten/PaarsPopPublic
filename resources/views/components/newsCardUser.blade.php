@props(['news'])
<div class="flex-container-news-article">
<article >
    <div class="box-news-article">
    <header class="">
        <h2>{{$news->Title}}</h2>
        <div class="flex">
            <p class="date-news">Datum:&nbsp; <p class="date-news-data">{{$news->uploadDate}}</p></p>
        </div>
    </header>
        <main class="mt-3">
            <p class="">{{$string = Str::of($news->content)->words(20, '...');}}</p>
        </main>
        <footer class="mt-3">
            <button class="btn_filled"><a href="{{route('showArticle', [$news->id])}}" class="">Lees meer</a></button>
        </footer>
    </div>
</article>
</div>