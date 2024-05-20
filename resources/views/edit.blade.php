

@extends('layouts.app')

@include('inc.header')

@section('title-block')Редактирование профиля @endsection



@section('edit')







    <form action="{{ route('user.edit') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="profile-block container">
            <div class="profile-main">
                <div class="profile-logo-ava">
                    <div class="profile-avatar">
                        <img id="avatarPreview" src="img/profile_logo.png" alt="Avatar preview">
                    </div>

                    <label for="avatar"><img src="img/ei_plus.png" alt="">Загрузить фото</label> <!-- Используем лейбл вместо кнопки -->
                    <input type="file" id="avatar" name="avatar" class="custom-file-input" onchange="previewAvatar(event)"> <!-- Элемент input скрыт от пользователя -->

                    <button type="submit"><img src="img/uil_pen.png" alt=""> Сохранить</button>

                </div>

                <div class="profile-block-info">
                    <div class="profile-block-about">
                        <div class="profile-info-first">
                            <div class="prfl-name">
                                <p>Имя</p>
                                <input name="name" class="{{ $errors->has('name') ? 'error input' : 'gray' }}" type="text" value="{{ old('name') ?? $user->name }}">
                                @error('name')
                                <div class="error-message">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="prfl-name">
                                <p>Телефон</p>
                                <input name="phone" class="{{ $errors->has('phone') ? 'error input' : 'gray' }}" type="text" id="phone" oninput="formatPhoneNumber()" maxlength="18" value="{{ old('phone') ?? $user->phone }}">
                                @error('phone')
                                <div class="error-message">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="prfl-name">
                                <p>Email</p>
                                <input name="email" class="{{ $errors->has('email') ? 'error input' : 'gray' }} " type="text" value="{{ old('email') ?? $user->email }}">
                                @error('email')
                                <div class="error-message">{{$message}}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="profile-info-first">
                            <div class="prfl-name">
                                <p>Фамилия</p>
                                <input   name="second_name" class="{{ $errors->has('second_name') ? 'error input' : 'gray' }} "   type="text" value="{{ old('second_name') ?? $user->second_name }}">
                                @error('second_name')
                                <div class="error-message">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="prfl-name">
                                <p>Дата рождения</p>
                                <input name="date" class="{{ $errors->has('date') ? 'error input' : 'gray' }} "  value="{{ $user->date }}" style="font-size: 18px;" type="date" >
                                @error('date')
                                <div class="error-message">{{$message}}</div>
                                @enderror

                            </div>
                            <div class="prfl-name">
                                <p>Группа</p>
                                <select name="groupp" id=""  class="{{ $errors->has('groupp') ? 'error input' : 'gray' }} ">
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
                    </div>
                    <div class="profile-about" >

                        <p>О себе</p>
                        <textarea  class="{{ $errors->has('about') ? 'error textarea' : 'gray' }}" type="text" value="{{ $user->about }}" name="about" id="about" cols="30" rows="10" >{{ $user->about }}</textarea>
                        @error('about')
                                <div class="error-message">{{$message}}</div>
                                @enderror
                    </div>

                </div>


            </div>




        </div>

    </form>






    <script>
    // Перепишем функцию previewAvatar, чтобы она использовала идентификатор avatar
function previewAvatar(event) {
    const input = document.getElementById('avatar');
    const preview = document.getElementById('avatarPreview');
    const file = input.files[0];

    const reader = new FileReader();
    reader.onload = function() {
        preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = '#';
    }
}
</script>


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

