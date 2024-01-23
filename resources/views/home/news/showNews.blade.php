<x-layout>
    <div class="flex-container-news">
        <div class="box-news-full">
            <h2 class="">{{$news->Title}}</h2>
            <div class="box-news-grid">
                @if ($news->attachment)
                    <img src="{{asset($news->attachment->filepath . $news->attachment->filename)}}" alt="" class="news-picture">
                @endif
                <p class="">{{$news->content}}</p>
            </div>
            <button class="btn_filled"><a href="{{url()->previous()}}">Terug</a></button>
        </div>
        
    </div>
</x-layout>