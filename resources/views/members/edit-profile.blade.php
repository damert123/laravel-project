@extends('layouts.app')

@include('inc.header')

@section('title-block')Редактировать волонтёра@endsection

@section('edit-profile')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif



<div class="wrapper">
    <div class="content">
        <div class="container">


            <form action="{{ route('admin.members.update-profile', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="admin-edit-block">

                    <div class="admin-edit-info">

                        @if($user->avatar)
                            <div class="member-avatars">
                                <img src="{{ asset('storage/' . $user->avatar) }}" alt="">
                            </div>
                        @else
                            <img src="{{ asset('img/profile_logo.png') }}" alt="">
                        @endif
                        <h2>{{ $user->second_name }} {{ $user->name }} </h2>
                        <h3>Группа: {{ $user->groupp }}</h3>
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
                        <button type="submit">Сохранить</button>
                        <div class="admin-input-role">
                            @error('role')
                            <div class="error-message">{{$message}}</div>
                            @enderror
                            <select class="" name="role">
                                @foreach($roles as $key => $value)
                                    <option value="{{ $key }}" @if($user->role == $key) selected @endif>Роль: {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="data-reg">
                            <p>Зарегистрирован: {{ $user->created_at->format('d.m.Y') }}</p>
                        </div>

                    </div>

                    <div class="admin-edit-input">

                        <div class="admin-edit-data">
                            <div class="input-width">
                                <p>Имя</p>
                                <input type="text" class="@error('name') error-event @enderror" name="name" value="{{ old('name') ?? $user->name }}" >
                                @error('name')
                                <div class="error-message">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="input-width">
                                <p>Фамилия</p>
                                <input type="text" name="second_name" value="{{ old('second_name') ?? $user->second_name }}">
                                @error('second_name')
                                <div class="error-message">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="admin-edit-data">
                            <div class="input-width">
                                <p>Телефон</p>
                                <input type="text" name="phone" id="phone" oninput="formatPhoneNumber()" maxlength="18" value="{{ old('phone') ?? $user->phone }}">
                                @error('phone')
                                <div class="error-message">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="input-width">
                                <p>Дата Рождения</p>
                                <input type="date" name="date" value="{{ $user->date }}">
                                @error('date')
                                <div class="error-message">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="admin-edit-data">
                            <div class="input-width">
                            <p>Email</p>
                            <input type="text" name="email" value="{{ $user->email }}">
                            @error('email')
                            <div class="error-message">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="input-width">
                            <p>Группа</p>
                            <select name="groupp" id=""  class="">
                                <option selected value="{{ $user->groupp }}">Ваша группа: {{ $user->groupp }} </option>
                                <option value="ИСиП-41">ИСиП-41</option>
                                <option value="ИСиП-42">ИСиП-42</option>
                                <option value="ИСиП-43">ИСиП-43</option>
                                <option value="ИСиП-31">ИСиП-31</option>
                                <option value="ИСиП-32">ИСиП-32</option>
                                <option value="ИСиП-33">ИСиП-33</option>
                                <option value="ИСиП-21">ИСиП-21</option>
                                <option value="ИСиП-22">ИСиП-22</option>
                                <option value="ИСиП-11">ИСиП-11</option>
                                <option value="ИСиП-12">ИСиП-12</option>
                            </select>
                            @error('groupp')
                            <div class="error-message">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="member-about">
                        <p>О себе</p>
                        <textarea name="" id="" cols="30" rows="10" name="about" >{{ $user->about }}</textarea>
                        @error('about')
                        <div class="error-message">{{$message}}</div>
                        @enderror
                    </div>
                </div>


                </div>

            </form>
        </div>
    </div>
</div>







<script>
    function formatPhoneNumber() {
    let input = document.getElementById('phone');
    let phoneNumber = input.value.replace(/\D/g, ''); // Удаляем все символы, кроме цифр

    // Добавляем "+7" в начало номера
    if (phoneNumber.substring(0, 1) !== '+') {
        phoneNumber = '+' + phoneNumber;
    }

    let formattedPhoneNumber = '';

    if (phoneNumber.length > 0) {
        formattedPhoneNumber += phoneNumber.substring(0, 2);

        if (phoneNumber.length > 2) {
            formattedPhoneNumber += ' (' + phoneNumber.substring(2, 5);

            if (phoneNumber.length > 5) {
                formattedPhoneNumber += ') ' + phoneNumber.substring(5, 8);

                if (phoneNumber.length > 8) {
                    formattedPhoneNumber += '-' + phoneNumber.substring(8, 10);

                    if (phoneNumber.length > 10) {
                        formattedPhoneNumber += '-' + phoneNumber.substring(10, 12);
                    }
                }
            }
        }
    }

    input.value = formattedPhoneNumber;
}
   </script>

@endsection

@include('inc.footer')

