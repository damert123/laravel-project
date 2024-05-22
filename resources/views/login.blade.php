
@extends('layouts.app')


@section('title-block')Вход@endsection
@section('login')

<div class="login-block container">
        <img src="img/Tspk-logo.png" class="login-logo" alt="">
        <h1>Добро=Счастье</h1>
        <div class="block-border-login">

            <form action="{{ route('user.login') }}" method="post">


                @csrf
                <h2>Вход</h2>


                @if($errors->any())
                    <ul style="text-align: center; margin-bottom: 20px; color: #ff6a6a ">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                @endif

                <div class="login-imp">
                    <p>Почта</p>
                    <div class="input-container">
                        <img src="img/email.svg" alt="">
                        <input  type="text" placeholder="Введите ваш email" name="email">
                    </div>
                </div>

                <div class="login-imp">
                    <p>Пароль</p>
                    <div class="input-container">
                        <img src="img/password.svg" alt="">
                        <input type="password" placeholder="Введите пароль" name="pass">
                    </div>
                </div>





                <div class="btn-lg">
                    <button type="submit" class="login-confirm">Войти</button>
                </div>

                <div class="not-reg">
                    <a href="/register">Я не зарегистрирован</a>
                </div>
            </form>
        </div>
    </div>

@endsection
