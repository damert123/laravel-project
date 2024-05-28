@extends('layouts.app')

@include('inc.header')

@section('title-block')Управление мероприятиями@endsection

@section('settings-event')


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<div class="edit-event-main container_tb">
    <div class="table-flex edit-event-block ">
    <table class="tb_events ">
        <thead>
            <tr>

                <th>Дата </th>
                <th>Обложка</th>
                <th>Мероприятие</th>
                <th>Участники</th>
                <th>Настройки</th>
            </tr>
        </thead>
        <tbody>

        @if($events->count() > 0 )

        @foreach($events as $event)

        <tr>

            <td>
                {{$event->created_at->format('d.m.Y')}}
            </td>
            <td><img src="{{asset ('storage/' . $event->picture)}}" alt="" style="width: 100px;"></td>
            <td>{{$event->header}}</td>
            <td><a href="#" class="event-members open-popup" data-event-id="{{ $event->id }}" style="font-weight:600">{{ $participants[$event->id]->count() }}</a></td>
            <td>
                <div class="settings-event-btn">
                    <a href="{{route ('admin.event.edit-event' , ['id' => $event->id])}}"><img src="{{ asset('img/settings.svg') }}" alt=""></a>
                    <a href="#" data-event-id="{{ $event->id }}" class="soft-delete-event" style="background-color:#fb4242;"><img src="{{ asset('img/event/off.svg') }}" alt=""></a>
                    <a href="#" class="delete-event" data-event-id="{{ $event->id }}" style="background-color:#3F3E46;"><img src="{{ asset('img/event/delete.svg') }}"  alt=""></a>
                </div>


            </td>
        </tr>
        @endforeach


        <!-- Здесь можно добавить другие строки с данными о пользователях -->
        </tbody>
    </table>

    </div>
</div>
<input type="hidden" id="avatarPath" value="{{ asset('storage/') }}">


<div class="popup-bg">
    <div class="block-members-event popup">
        <img class="close-popup" src="{{ asset('img/close.svg') }}" alt="icon">
        <div class="members-event-popup">
            <h2 style="margin:50px 0 20px 0; text-align: center;">Участники мероприятия</h2>
            <ul class="event-participants-list">
                <!-- Данные будут добавлены динамически с помощью JavaScript -->
            </ul>
            <p class="no-participants" style="text-align:center; margin: auto; display: none;">Участников нет</p>
        </div>
    </div>
</div>

    <div class="popup-bg-soft-delete">
        <div class="block-members-event popup">
            <img class="close-popup-soft-delete" src="{{ asset('img/close.svg') }}" alt="icon">
            <div class="members-event-popup">
                <h2 style="margin:50px 0 20px 0; text-align: center;">Завершить мероприятие?</h2>

                <div class="delete-confirm">
                    <a href="#" class="cancel-soft-delete">Нет</a>
                    <form id="softDeleteEventForm" action="{{ route('admin.event.soft-delete', ['id' => $event->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background-color:#ff6a6a;">Да</button>
                    </form>
                </div>

            </div>
        </div>
    </div>


<div class="popup-bg-delete">
    <div class="block-members-event popup">
        <img class="close-popup-delete" src="{{ asset('img/close.svg') }}" alt="icon">
        <div class="members-event-popup">
            <h2 style="margin:50px 0 20px 0; text-align: center;">Удалить мероприятие?</h2>

            <div class="delete-confirm">
                <a href="#" class="cancel-delete">Нет</a>
                <form id="deleteEventForm" action="{{ route('admin.event.delete', ['id' => $event->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" style="background-color:#ff6a6a;">Да</button>
</form>
            </div>

        </div>
    </div>
</div>

    <div class="my-nav container">{{$events->withQueryString()->links('pagination::bootstrap-4')}}</div>

@else


    <div style="text-align: center; padding: 10px; font-weight: 600; background-color: #f4f14e; color: #3F3E46">Нет действующих мероприятий</div>


@endif

<script>
    var participants = {!! json_encode($participants) !!};
</script>


@endsection
<!--
<div class="popup-bg-delete">
    <div class="block-members-event popup">
        <img class="close-popup-delete" src="{{ asset('img/close.svg') }}" alt="icon">
        <div class="members-event-popup">
            <h2 style="margin:50px 0 20px 0; text-align: center;">Удалить мероприятие?</h2>

            <div class="delete-confirm">

                <a href="" class="">Нет</a>

                <form id="deleteEventForm" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </div>

        </div>
    </div>
</div> -->






