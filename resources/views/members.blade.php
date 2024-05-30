@extends('layouts.app')

@include('inc.header')

@section('title-block')Волонтёры@endsection

@section('members')

<div class="wrapper">
    <div class="content">
        <h1 style="font-size: 40px; color: #4e77f4; width: 75%; margin: 50px auto ">Волонтеры</h1>
        <div class="container_tb">
            <div class="table-flex">
                <table class="tb_members ">
                    <thead>
                    <tr>

                        <th>Волонтер</th>
                        <th>Добрых дел</th>
                        <th>Группа</th>
                        <th>Соцсети </th>
                        <th>Подробнее</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>

                            <td> <div class="ava_memb">
                                    @if($user->avatar)
                                        <img src="{{ asset('storage/' . $user->avatar) }}" style="width: 50px; border-radius: 50%; border: 2px solid #4e77f4 " alt="">
                                    @else
                                        <img src="{{ asset('img/Group.png') }}" style="width: 50px; border-radius: 50%;" alt="Default Avatar">
                                    @endif
                                </div>
                                {{ $user->name }} {{ $user->second_name }}</td>
                            <td>

                                <img src="{{asset('img/heart.svg')}}" alt="" style="width: 30px; margin-right:5px;">
                                @if($user->profile->good_deeds > 0 )
                                {{$user->profile->good_deeds}}
                                @else
                                    0
                                @endif

                            </td>

                            <td>{{ $user->groupp }}</td>
                            <td style="height: 30px">
                                @if($user->profile->social_vk != null || $user->profile->social_tg != null)
                                    @if($user->profile->social_vk !=null )
                                <a href="{{$user->profile->social_vk}}"><img src="img/memb_vk.svg" alt="" style="margin-right:5px;"></a>
                                    @endif

                                    @if($user->profile->social_tg !=null )
                                <a href=""><img src="img/telegram.svg" alt=""></a>
                                        @endif
                                @else
                                    <p style="">Нет</p>
                                @endif

                            </td>
                            <td >
                                <a  href="{{ route('profile', $user->id) }}" ><button style="height:35px; margin-bottom: 5px">Профиль</button></a>
                                @if(Auth::check() && Auth::user()->role == \App\Models\User::ROLE_ADMIN)
                                    <a   href="{{ route('admin.members.edit-profile', $user->id) }}" >
                                        <button style="width:50px; height:35px">
                                            <img style="width:20px; height:20px" src="{{ asset('img/settings.svg') }}" alt="">
                                        </button>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach


                    <!-- Здесь можно добавить другие строки с данными о пользователях -->
                    </tbody>
                </table>


            </div>
        </div>

        <div class="my-nav container">{{$users->withQueryString()->links('pagination::bootstrap-4')}}</div>
    </div>
</div>
@endsection

    @include('inc.footer')


