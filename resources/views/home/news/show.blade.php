<x-layout>
    
    <div class="flex-container-news">
        <div class="box-news">
            <h1 class="">Nieuws</h1>
            <div>
                @php
                    $b = true;
                @endphp
                @foreach ($newsPosts as $news)
                    <div class="
                        @php 
                            if($b)
                            {
                                echo "news-left";
                                $b = false;
                            }
                            else
                            {
                                echo "news-right";
                                $b = true;
                            }
                        @endphp">
                        <x-newsCardUser :news="$news"></x-newsCardUser>
                    </div> 
                @endforeach
            </div>
           
        </div>
    </div>
</x-layout>