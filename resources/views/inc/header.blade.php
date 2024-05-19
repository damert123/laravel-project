

@section('header')

<header class="header ">
        <div class="header-block container aaa">
            <div class="headerOne">
                <div class="logo">

                    <div class="logoText">
                        <h2>Добро=Счастье</h2>
                        <p>Волонтерский центр<br> ГАПОУ ТСПК</p>
                    </div>
                </div>

            </div>
            <ul class="nav">
            <li class="navLi"><a href="{{ route('main') }}">Главная</a> </li>
                <li class="navLi"><a href="{{ route('news') }}">Новости</a></li>
                <li class="navLi"><a href="{{ route('event') }}">Мероприятия</a></li>
                <li class="navLi"><a href="{{ route('info') }}">Контакты</a></li>
                <li class="navLi"><a href="{{ route('members') }}">Волонтёры</a></li>
            </ul>
            <script>
    function burgerMenu(icon) {
        icon.classList.toggle("change");
        var nav = document.querySelector('.nav');
        nav.classList.toggle('showNav');
        document.querySelector('body').classList.toggle("overflow");
    }
</script>
            @auth
    <div class="profile-logo">
        <a href="{{ route('user.private') }}">
            @if(Auth::user()->avatar)
                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="" style=" border: 2px solid #4e77f4;">
            @else
                <img src="{{ asset('img/Group.png') }}" alt="Default Avatar">
            @endif
            <p>{{ Auth::user()->name }}</p>
        </a>
    </div>
@else
    <div class="profile-logo">
        <a href="/login">
            <img src="{{ asset('img/Group.png') }}" alt="">
            <p>Войти</p>
        </a>
    </div>
@endauth

            <div class="burgerMenu" onclick="burgerMenu(this)">
                <div class="b1"></div>
                <div class="b2"></div>
                <div class="b3"></div>
            </div>
        </div>
    </header>

@endsection

