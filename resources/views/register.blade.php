
@extends('layouts.app')


@section('title-block')Регистрация@endsection

@section('reg')



    <div class="login-block container">
        <img src="img/Tspk-logo.png" class="login-logo" alt="">
        <h1>Добро=Счастье</h1>
        <div class="call-back container">
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>

            @endif

            <div class="call-block" >
                <form action="{{ route('user.register') }}"  method="post">
                    @csrf
                    <div class="call-input" placeholder="Имя Фамилия">
                        <h2>Регистрация</h2>
                        <p>Имя </p>
                        <input type="text" name="name" placeholder="Введите Имя ">

                    </div>

                    <div class="call-input">
                        <p>Фамилия</p>
                        <input type="text" name="second_name"  placeholder="Введите Фамилия">

                    </div>

                    <div class="call-input">
                        <p>Группа</p>
                        <select name="groupp" id="groupp">
                                            <option value="">Выберите группу</option>
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

                    </div>

                    <div class="call-input">
                        <p>Дата рождения</p>
                        <input type="date" id="date" name="date" style="font-size: 18px;">

                    </div>

                    <div class="call-input ">
                        <p>Телефон</p>
                        <input name="phone" type="text" id="phone" placeholder="Введите номер телефона" oninput="formatPhoneNumber()" maxlength="18">

                    </div>

                    <div class="call-input">
                        <p>Пароль</p>
                        <input name="pass" id="pass" type="password" placeholder="Пароль">

                    </div>

                    <div class="call-input">
                        <p>Email</p>
                        <input name="email" id="email" type="text" placeholder="example@mail.ru">

                    </div>



                    <div class="btn-call">
                        <button type="submit"><p>Зарегистрироваться</p></button>
                    </div>

                    <div class="not-reg">
                    <a href="{{route('user.login')}}">Я меня уже есть аккаунт</a>
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

