@extends('layouts.app')

@include('inc.header')

@section('title-block')
    Новости
@endsection


@section('news')
    @csrf

    <div class="wrapper">
        <div class="content">
            <div class="container news news_main">
                    <div class="big-logo">
                        <div class="text-logo-main">
                            <h1 class='anim_items'><span class="color">Все</span> новости</h1>

                        </div>

                        @if(auth()->check() && auth()->user()->role == \App\Models\User::ROLE_ADMIN)
                            <div class="news-added">
                                <a href="{{ route('admin.news.news-create') }}"><img src="{{asset ('img/plus.svg')}}" alt="" style="margin-right: 5px;">Добавить новость</a>
                            </div>
                        @endif
                    </div>

                <div class="news_blocks">
                    @if($news->count() == 0)
                        <div style="height: 500px; display: flex; align-items: center; justify-content: center"><p style="text-align: center; font-size: 30px; color: #3F3E46; opacity: 0.5">НЕТ НОВОСТЕЙ</p></div>
                    @else



                        @foreach($news as $item)
                            <article class="new_block">

                                <a href="{{route ('new', $item->id)}}">
                                    <img src="{{ asset ('storage/' . $item->picture) }}" class="logo-news" alt="тут фотка новостей">
                                </a>
                                <h3>{{ $item->header }}</h3>

                                <div class="news-feature">
                                    <div>
                                        <img src="img/date.svg" alt="">
                                        <time>{{ $item->created_at->format('d.m.y') }}</time>
                                    </div>
                                    <div>
                                        @if($item->members != null)
                                            <img src="img/people.svg" alt="">
                                            <time> Участвовали: {{ $item->members }}</time>
                                        @else
                                            <img src="img/people.svg" alt="">
                                            <time> Нет участников</time>
                                        @endif
                                    </div>


                                </div>
                            </article>

                        @endforeach


                        <div
                            class="my-nav container">{{$news->withQueryString()->links('pagination::bootstrap-4')}}</div>
                </div>




            </div>

        </div>

        @endif
    </div>

@endsection

@include('inc.footer')




