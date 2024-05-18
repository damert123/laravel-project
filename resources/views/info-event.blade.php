@extends('layouts.app')

@include('inc.header')

@section('title-block')Информация о мероприятии@endsection


@section('info-event')



@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<div class="info-event container">

        <div class="info-event-block">
            <div class="event-item-logo">
                <div class="event-logo-text">
                    @if($event->picture)
                <img src="{{ asset ('storage/' . $event->picture) }}" alt=""> <br>
            @else
            <img src="{{ asset('img/logo_info2.png') }}" alt=""> <br>
            @endif
            @if(auth()->check())
    @if($event->users()->where('users.id', auth()->id())->exists())
        <p>Вы записаны на мероприятие</p>
        <form action="" method="POST" style="width:100%;">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-event-btn" >Отменить запись</button>
        </form>
    @else
        <form action="{{ route('info-event', ['id' => $event->id]) }}" method="POST" style="width:100%;">
            @csrf
            <button type="submit" class="accept-event-btn">Подать заявку</button>
        </form>
    @endif
@else
    <p>Для записи нужно <a href="{{ route('user.login') }}">войти</a></p>
@endif


                </div>

        <div class="event-info-members">
            <p><img src="" alt="">Участников: {{ $participants->count() }} - <a href="#" class="btn-plus open-popup-members">Посмотреть</a> </p>

        </div>
            </div>

            <div class="event-item-text">
            <h1>{{ $event->header }}</h1>

                <div class="event-item-info">
                    <h3>Описание:</h3>
                    <div class="event-text">
                        <img src="{{ asset('img/text.svg') }}" alt="">
                        <p style="text-align: start; line-height: 25px;">{{ $event->descrip }}</p>
                    </div>
                </div>

                <div class="event-item-date">

                    <div class="event-block-info">
                        <h3>Информация:</h3>
                        <div class="event-text">
                            <img src="{{ asset('img/organization.svg') }}" alt="">
                            <p>Организатор: {{ $event->organizer }}</p>
                        </div>
                        <div class="event-text">
                            <img src="{{ asset('img/date.svg') }}" alt="">
                            <p>Начало {{ $event->date_start }} </p>
                        </div>
                        <div class="event-text">
                            <img src="{{ asset('img/location.svg') }}" alt="">
                            <p>{{ $event->location }}</p>
                        </div>
                    </div>

                    <div class="event-item-function">

                        <h3>Период отбора:</h3>
                        <div class="event-text">
                            <img src="{{ asset('img/time.svg') }}" alt="">
                            <p>18 марта – 11 июня 2023</p>
                        </div>
                        <h3>Требования:</h3>
                        <div class="event-text">
                            <img src="{{ asset('img/requir.svg') }}" alt="">
                            <p>{{ $event->require }}</p>
                        </div>


                    </div>
                </div>







            </div>
        </div>

        <div class="popup-bg">

            <div class="block-members-event popup">

            <img class="close-popup-members" src="{{asset ('img/close.svg')}}" alt="icon">


            <div class="members-event-popup">
            <h2 style="margin:50px 0 20px 0; text-align: center;">Участники мероприятия</h2>
            @if(isset($participants) && count($participants) > 0)
                <ul>

                    @foreach($participants as $participant)
                        <li><img src="{{asset ('storage/' . $participant->avatar )}}" alt="">{{ $participant->name }} {{ $participant->second_name }}</li>
                    @endforeach
                @else
                <p style="text-align:center; margin: auto;">Участников нет</p>
                @endif
                </ul>
            </div>

            </div>
        </div>



    </div>




    @include('inc.footer')
