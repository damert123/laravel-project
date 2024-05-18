@extends('layouts.app')


@include('inc.header')

@section('title-block')Контакты@endsection


@section('info')

    <div class="info-block container">
        <h1>Как с нами связаться</h1>
        <h2>Контактная информация</h2>

        <div class="info-item">
            <div class="info-text">
                <img src="img/location.png" alt="">
                <p>г Тольятти, ул Мурысева 84</p>
            </div>
            <div class="info-text">
                <img src="img/phone.png" alt="">
                <p>+7 (900)-555-35-35</p>
            </div>
            <div class="info-text">
                <img src="img/email.png" alt="">
                <p>example@yandex.ru</p>
            </div>
            <div class="info-text">

                <a href="https://vk.com/dobrotspk63"><img src="img/vk.png" alt="">Группа ВК</a>
            </div>

        </div>

        <div class="info-maps">
            <h1>Где нас найти</h1>
            <div style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/org/tolyattinskiy_sotsialno_pedagogicheskiy_kolledzh/1080507544/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Тольяттинский социально-педагогический колледж</a>
                <a href="https://yandex.ru/maps/240/togliatti/category/college/184106236/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:14px;">Колледж в Тольятти</a><iframe src="https://yandex.ru/map-widget/v1/?ll=49.477335%2C53.476034&mode=search&oid=1080507544&ol=biz&z=18"
                    frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
        </div>
    </div>




    @include('inc.footer')


 @endsection
