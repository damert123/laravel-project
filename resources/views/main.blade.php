@extends('layouts.app')

@include('inc.header')

@section('title-block')Добро=Счастье@endsection

@section('content')

@auth
<div class="container news">
        <h1 class="anim_items">Последние новости</h1>

        <div class="news_blocks">

        @foreach ($freshNews as $item)
        <article class="new_block">


            <a href="{{route ('new', $item->id)}}">
                <img src="{{ asset ('storage/' . $item->picture) }}" class="logo-news" alt="тут фотка новостей">
            </a>
                <h3>{{ $item->header }}</h3>

                <div class="news-feature">
                    <div>
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
        <a class="btn_more" href="{{route('news')}}">Читать больше</a>
        <img src="" alt="">
    </div>

    <!-- Конец блока с новостями -->

    <!-- блок основная информация -->


    <div class="main_info container">
        <h1></h1>
        <div class="block_main_info anim_items">
            <div class="info_text">
                <h2>Коротко о нас:</h2>
                <p> <span class="color">«Добро=Счастье»</span> - это волонтерский отряд Тольяттинского социально-педагогического колледжа, готовый оказывать помощь и принимать активное участие в любых направлениях добровольческой деятельности. Мы активные,
                    позитивные, всегда и всем готовые прийти на помощь!
                </p>
            </div>

            <img src="img/logo_info.jpg" alt="info_img">

        </div>
        <div class="block_main_info anim_items">
            <div class="info_text">
                <h2>О сотрудничестве с нами:</h2>
                <p> Мы сотрудничаем со <span class="color3">множеством</span> других организаций которые устраивают мероприятия и поездки в различные места для проведения волонтерских мероприятий.</p>


            </div>

            <img src="img/logo_info3.jpg" alt="info_img">

        </div>
        <div class="block_main_info anim_items">
            <div class="info_text">
                <h2>Достижения:</h2>
                <p> Мы гордимся нашими достижениями в добровольческой деятельности. За прошедший год мы провели успешные акции по благоустройству города, оказали помощь нуждающимся и участвовали в различных мероприятиях, способствующих развитию общества.
                </p>


            </div>
            <img src="img/logo_info2.png" alt="info_img">
        </div>
    </div>


    <div class="container stats-logo">
        <h1><span class="color">Наша</span> статистика</h1>
    </div>
    <div class="stats container">

        <div class="block-stats  ">
            <div class="text-stats ">
                <h1>30+</h1>
                <p>Добрых дел</p>
            </div>
        </div>

        <div class="block-stats ">
            <div class="text-stats">
                <h1>280+</h1>
                <p>Волонтеров</p>
            </div>
        </div>

        <div class="block-stats ">
            <div class="text-stats">
                <h1>4700+</h1>
                <p>Часов</p>
            </div>
        </div>
    </div>




    @else
        <div class="main-action-block" style="background-image: url('{{ asset('img/main-action-logo.jpg') }}');">
            <div class="main-action container" >
                <div class="main-action-text">
                    <h1>Стань волонтером</h1>
                    <h1>Измени свою жизнь!</h1>
                    <p>Вступайте в волонтерский отряд <br>«Добро=Счастье»</p>
                </div>
                <div class="main-action-btn">
                    <a href="">Стать волонтером!</a>
                </div>
            </div>
        </div>

        <div class="main-about-block container">
            <div class="main-about-logo">
                <h1>О НАС</h1>
            </div>
            <div class="main-about-text">
                <p><img src="{{ asset('img/logo-about.svg') }}" alt="" style="margin-right:10px;">«Добро=Счастье» - это волонтерский отряд Тольяттинского социально-педагогического колледжа, готовый оказывать помощь и принимать активное участие в любых направлениях добровольческой деятельности. Мы активные, позитивные, всегда и всем готовые прийти на помощь!</p>
            </div>
            <div class="main-about-stats-text">
                <h1>Cтатистика</h1>
            </div>
            <div class="main-about-stats">
                <div class="block-stats  ">
                    <div class="text-stats ">
                        <h1>30+</h1>
                        <p>Добрых дел</p>
                    </div>
                </div>

            <div class="block-stats ">
                <div class="text-stats">
                    <h1>280+</h1>
                    <p>Волонтеров</p>
                </div>
            </div>

            <div class="block-stats ">
                <div class="text-stats">
                    <h1>4700+</h1>
                    <p>Часов</p>
                </div>
            </div>
                </div>
        </div>

    <div class="main-block-feature container">
        <h1>Чем мы занимаемся </h1>
        <div class="feature-items-block">
            <div class="feature-item">
                <img src="{{ asset('img/main/event.svg') }}" alt="">
                <p>События</p>
                <p>Волонтеры центра участвуют в городских, региональных, всероссийских мероприятиях. </p>
            </div>
            <div class="feature-item">
                <img src="{{ asset('img/main/animal.svg') }}" alt="">
                <p>Животные</p>
                <p>Акции по сбору кормов и всего необходимого для животных, субботники на территории приютов.</p>
            </div>
            <div class="feature-item">
                <img src="{{ asset('img/main/ecology.svg') }}" alt="">
                <p>Экология</p>
                <p>Организуем ежемесячные акции по уборке мусора в городе, сажаем деревья</p>
            </div>
        </div>

        <div class="feature-items-block">
            <div class="feature-item">
                <img src="{{ asset('img/main/old.svg') }}" alt="">
                <p>Старшее поколение</p>
                <p>Осуществляем адресную помощь пожилым и маломобильным граждан г.о. Тольятти старше 60 лет – доставляем лекарства и продукты.</p>
            </div>
            <div class="feature-item">
                <img src="{{ asset('img/main/sport.svg') }}" alt="">
                <p>Спорт</p>
                <p>Волонтеры Центра сопровождают хоккейные и футбольные матчи, организуют городские спортивные праздники. </p>
            </div>
            <div class="feature-item">
                <img src="{{ asset('img/main/hand.svg') }}" alt="">
                <p>Социальное волонтерство</p>
                <p>Оказываем поддержку детям сиротам, воспитанникам детских домов, школ-интернатов и реабилитационным центрам.</p>
            </div>
        </div>

        <div class="call-text container">
            <h1>Стать <span style="color: #3F3E46;">волонтером</span></h1>
        </div>
        <div class="call-back container">

            <div class="call-block">

                <div class="call-input" placeholder="Имя Фамилия">
                    <h2>Заполните форму</h2>
                    <p>Имя </p>
                    <input type="text" placeholder="Введите Имя ">

                </div>

                <div class="call-input">
                    <p>Фамилия</p>
                    <input type="text" placeholder="Введите Фамилия">
                </div>

                <div class="call-input">
                    <p>Группа</p>
                    <select name="" id="">
                        <option value="">ИСиП-31</option>
                        <option value="">ИСиП-32</option>
                        <option value="">ИСиП-33</option>
                        <option value="">ИСиП-21</option>
                        <option value="">ИСиП-22</option>
                        <option value="">ИСиП-11</option>
                        <option value="">ИСиП-12</option>
                    </select>
                </div>

                <div class="call-input">
                    <p>Телефон</p>
                    <input type="text" id="phone" placeholder="Введите номер телефона" oninput="formatPhoneNumber()" maxlength="18">
                </div>
                <div class="call-input">
                    <p>Пароль</p>
                    <input type="text" placeholder="Пароль">
                </div>

                <div class="call-input">
                    <p>Email</p>
                    <input type="text" placeholder="example@mail.ru">
                </div>



                <div class="btn-call">
                    <button>Стать волонтером</button>
                </div>
            </div>

        </div>


    </div>

    @endauth

    @include('inc.footer')



    @endsection

