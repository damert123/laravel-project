


@extends('layouts.app')

@include('inc.header')

@section('title-block')Новости@endsection


@section('news')
@csrf
    <div class="container news news_main">
        <div class="big-logo">
            <div class="text-logo-main">
            <h1 class='anim_items'><span class="color">Все</span> новости</h1> 
            
        </div>
            <div class="news-added">
                <a href="{{ route('admin.news.news-create') }}"><img src="{{asset ('img/plus.svg')}}" alt="" style="margin-right: 5px;">Добавить новость</a>
            </div>
        </div>
        
        
        <div class="news_blocks">
           
        @foreach($news as $item)
        <article class="new_block">
                
                <a href="{{route ('new', $item->id)}}">
                <img src="{{ asset ('storage/' . $item->picture) }}" class="logo-news" alt="тут фотка новостей";">
                </a>
                <h3>{{ $item->header }}</h3>

                <div class="news-feature">
                    <div >
                    <img src="img/date.svg" alt=""> <time>{{ $item->created_at->format('d.m.y') }}</time>
                    </div>
                    <div>
                        @if($item->members != null)
                    <img src="img/people.svg" alt=""> <time> Участвовали: {{ $item->members }}</time>
                    @else 
                    <img src="img/people.svg" alt=""> <time> Нет участников</time>
                    @endif
                    </div>

                    
                </div>
            </article>
        @endforeach
          
            
        </div>
        <ul class="list_news">
            <li class="li_news"><a href="" class="not">&#8592</a></li>
            <li class="li_news"><a href="">1</a></li>
            <li class="li_news"><a href="">2</a></li>
            <li class="li_news"><a href="">3</a></li>
            <li class="li_news"><a href="" class="not">&#8594</a></li>
        </ul>
    </div>

    @include('inc.footer')
   

@endsection

