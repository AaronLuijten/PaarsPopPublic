<x-layout>
    <div class="flex-container-news">
        <div class="box-news-full">
            <h1 class="">{{$news->Title}}</h1>
            <div class="box-news-grid">
                @if ($news->attachment)
                    <img src="{{asset($news->attachment->filepath . $news->attachment->filename)}}" alt="" class="news-picture">
                @endif
                <p class="news-content">{{$news->content}}</p>
            </div>
            <button class="btn_filled"><a href="{{url()->previous()}}">Terug</a></button>
        </div>
        
    </div>
</x-layout>