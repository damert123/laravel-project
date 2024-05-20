@extends('layouts.app')

@include('inc.header')

@section('title-block')Управление Новостями@endsection

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
                    <th>Настройки</th>
                </tr>
                </thead>
                <tbody>

                @if($news->count() > 0 )

                    @foreach($news as $new)

                        <tr>

                            <td>
                                {{$new->created_at->format('d.m.Y')}}
                            </td>
                            <td><img src="{{asset ('storage/' . $new->picture)}}" alt="" style="width: 100px;"></td>
                            <td>{{$new->header}}</td>
                            <td>
                                <div class="settings-event-btn">
                                    <a href="{{route ('admin.news.edit-news' , ['id' => $new->id])}}"><img src="{{ asset('img/settings.svg') }}" alt=""></a>
                                    <a href="#" class="delete-event" data-news-id="{{ $new->id }}" style="background-color:#3F3E46;"><img src="{{ asset('img/event/delete.svg') }}"  alt=""></a>
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





    <div class="popup-bg-delete ">
        <div class="block-members-event popup">
            <img class="close-popup-delete" src="{{ asset('img/close.svg') }}" alt="icon">
            <div class="members-event-popup">
                <h2 style="margin:50px 0 20px 0; text-align: center;">Удалить мероприятие?</h2>

                <div class="delete-confirm">
                    <a href="#" class="cancel-delete">Нет</a>
                    <form id="deleteNewsForm" action="{{ route('admin.news.delete', ['id' => $new->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background-color:#ff6a6a;">Да</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    @else


        <div style="text-align: center; padding: 10px; font-weight: 600; background-color: #f4f14e; color: #3F3E46">Нет новостей</div>


    @endif


@endsection
