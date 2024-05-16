@extends('layouts.app')

@include('inc.header')

@section('title-block')Волонтер@endsection

@section('profile')

@csrf
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
            <div class="member-stat">
                <h2>Добрых дел</h2>
                
                    
                <h2><img src="{{ asset('img/heart.svg') }}" alt="">3</h2>
                
            </div>
            
            <div class="member-social">
            <p><img src="" alt="">Соц-сети</p>
                <div class="member-social-img">
                    <a href=""><img src="{{ asset('img/memb_vk.svg') }}" alt="" style="margin-right:10px;"></a>
                    <a href=""><img src="{{ asset('img/telegram.svg') }}" alt=""></a>
                </div>
            </div>


           
        </div>




        <div class="member-second">
            <div class="member-name">
                <p style="font-weight:500;">Волонтер</p>
                <h1>{{ $user->name }} {{ $user->second_name }}</h1>
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
                    <h2><img src="{{ asset('img/gruup.svg') }}" alt="">Группа</h2>
                    <p>{{ $user->groupp }}</p>
                </div>
                <div class="member-mail">
                    <h2><img src="{{ asset('img/mail.svg') }}" alt="">Почта</h2>
                    <p>{{ $user->email }}</p>
                </div>
            </div>
            <div class="member-about">
                <p>О себе</p>
                <textarea name="" id="" cols="30" rows="10" readonly>{{ $user->about }}</textarea>
            </div>

        </div>

        <div class="member-event">
            <p>Учавствовал в:</p>
            <ul>
                <li>Помощь ветеранам</li>
                <li>Корм для животных</li>
                <li>Уборка территории</li>
                <li>Одежда в детские дома</li>
            </ul>

            
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
</div>

@include('inc.footer')

