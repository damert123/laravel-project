
@extends('layouts.app')

@include('inc.header')

@section('title-block')Ваш профиль@endsection



@section('private')



    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


        <div class="container">
    <div class="member-block">


        <div class="member-firts">


            @if($user->avatar)
            <div class="member-avatars">
                <img src="{{ asset('storage/' . $user->avatar) }}" alt="">
            </div>
        @else
            <img src="{{ asset('img/profile_logo.png') }}" alt="">
        @endif

        <div class="member-btn-admin-block">

                <div class="member-btn">
                    <p>Управление</p>
                <a href="/edit"><img src="img/uil_pen.png" alt="">Редактировать</a>
                        <form id="logout-form" action="{{ route('user.logout') }}" method="POST" >
                            @csrf
                            <button class="btn-logout" type="submit">
                                <img src="img/logout.svg" alt="" style="vertical-align: middle;"> Выход
                            </button>
                        </form>
                </div>


                @if($user->role == \App\Models\User::ROLE_ADMIN)
                <div class="member-admin">
                    <p><img src="" alt="">Админ</p>
                    <a href="{{route ('admin.event.settings-event')}}"><img src="" alt="">Мероприятия</a>
                    <a href="{{route('admin.news.settings-news')}}"><img src="" alt="">Новости</a>
                </div>
               @endif
        </div>



            <div class="member-stat-social-block">
                <div class="member-stat">
                    <h2>Добрых дел</h2>
                    <h2><img src="{{ asset('img/heart.svg') }}" alt="">{{$profile->good_deeds}}</h2>
                </div>

                <div class="member-hours">
                    <h2>Часы</h2>
                    <h2><img src="{{ asset('img/timeblue.svg') }}" alt="">{{$profile->hours_spent}}</h2>
                </div>


                @if($profile->social_vk != null || $profile->social_tg != null)
                <div class="member-social">
                <p><img src="" alt="">Соц-сети</p>
                    <div class="member-social-img">
                        @if($profile->social_vk != null)
                        <a href="{{$profile->social_vk}}"><img src="{{ asset('img/memb_vk.svg') }}" alt="" style="margin-right:10px;"></a>
                        @endif
                        @if($profile->social_tg != null)
                        <a href="{{$profile->social_tg}}"><img src="{{ asset('img/telegram.svg') }}" alt=""></a>
                            @endif
                    </div>
                </div>
                @endif
            </div>


        </div>




        <div class="member-second">

        <div class="member-info-main">
            <p style="font-weight:500;">Волонтер</p>
            <div class="member-name">

                    <h1>{{ $user->second_name }} {{ $user->name }} </h1>
                    <?php
                        // Получаем дату рождения пользователя из модели
                        $birthday = $user->date;

                        // Преобразуем строку в объект DateTime
                        $birthdate = new DateTime($birthday);

                        // Получаем текущую дату
                        $currentDate = new DateTime();

                        // Вычисляем разницу между текущей датой и датой рождения
                        $age = $currentDate->diff($birthdate)->y;

                        // Выводим возраст
                        echo "<p>Возраст: $age лет</p>";
                        ?>
                </div>

                <div class="member-info">

                    <div class="member-group">
                        <h2><img src="{{ asset('img/gruup.svg') }}" alt="">Группа: </h2>
                        <p>{{ $user->groupp }}</p>
                    </div>
                    <div class="member-mail">
                        <h2><img src="{{ asset('img/mail.svg') }}" alt="">Почта</h2>
                        <p>{{ $user->email }}</p>
                    </div>

                </div>

        </div>


            <div class="member-event">


                @if($getEvent->count() > 0)
                    <p style="font-weight: 500;">Записи на мероприятия: {{$getEvent->count()}}</p>
                    @foreach($getEvent as $event)

                        <div class="profile-stat-event">
                            <p>{{$event->header}}</p>
                            <p>Начало: {{\Carbon\Carbon::parse($event->date_start)->format('d.m.Y')}}</p>
                            <a href="{{route('info-event', $event->id)}}">Подробнее</a>
                        </div>




                    @endforeach
                @else
                    <p style="font-weight: 500;">Записи на мероприятия</p>
                        <div style="margin-top: 10px; ">Нет записей на мероприятия</div>
                @endif





            </div>

            <div class="member-about">
                <p>О себе</p>
                <textarea name="" id="" cols="30" rows="10" readonly>{{ $user->about }}</textarea>
            </div>

        </div>





    </div>
</div>

<script>
    // Находим все textarea на странице
const textareas = document.querySelectorAll('textarea');

// Для каждого textarea
textareas.forEach((textarea) => {
    // Устанавливаем начальную высоту на основе контента и высоту min-height
    textarea.style.height = textarea.scrollHeight + 'px';

    // Добавляем обработчик события input
    textarea.addEventListener('input', function () {
        // Устанавливаем высоту textarea равной его прокрутке (scrollHeight),
        // чтобы она автоматически увеличивалась по мере добавления текста
        this.style.height = 'auto';
        this.style.height = this.scrollHeight + 'px';
    });
});
</script>

@endsection

@include('inc.footer')









