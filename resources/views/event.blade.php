@extends('layouts.app')

@include('inc.header')

@section('title-block')Мероприятия@endsection


@section('event')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="wrapper">


    <div class="content">
        <div class="event-block container ">

            <div class="logo-event">
                <div class="create-event-btn">
                    <h1 class="anim_items activee">Мероприятия</h1>
                    <h2 class="anim_items ">Актуальные мероприятия</h2>
                </div>
                @if(auth()->check() && auth()->user()->role == \App\Models\User::ROLE_ADMIN)
                <a href="{{ route('admin.event.event-create') }}"><img src="{{asset ('img/plus.svg')}}" alt=""
                                                                       style="margin-right: 5px;">Создать
                    Мероприятие</a>
                @endif
            </div>

            @if($event->count()==0)
                <div style="height: 200px; display: flex; align-items: center; justify-content: center"><p
                        style="text-align: center; font-size: 30px; color: #3F3E46; opacity: 0.5">НЕТ
                        МЕРОПРИЯТИЙ</p></div>
            @else

            <div class="event-items">
                @foreach($event as $item)
                    <article>
                        @if($item->picture)
                            <div class="logo-event-block">
                                <img class="logo-event-img" src="{{ asset ('storage/' . $item->picture) }}" alt=""> <br>
                            </div>
                        @else
                            <div class="logo-event-block">
                                <img class="logo-event-img" src="img/logo_info2.png" alt=""> <br>
                            </div>
                        @endif

                        <h3>{{$item->header}}</h3>

                        <div class="icon-event">
                            <div><img src="img/location.svg" alt=""> {{$item->location}} </div>

                            <div><img src="img/date.svg" alt="">
                                <time>Создано: {{$item->created_at->format('d.m.y')}}</time>
                            </div>
                        </div>


                        <a href="{{ route ('info-event' , $item->id) }}">Хочу помочь</a> <br>

                    </article>
                @endforeach

                    <div class="my-nav container">{{$event->withQueryString()->links('pagination::bootstrap-4')}}</div>
            </div>
        </div>
        @endif
    </div>

</div>


    @include('inc.footer')


    @endsection
