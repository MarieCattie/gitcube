<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" href="{{asset('assets/img/bg-grey.png')}}" as="image">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/msgs.css')}}">
    <title>GitCube | @yield('title')</title>

    <link rel="shortcut icon" href="{{asset('assets/img/logo-filled.svg')}}" type="image/x-icon">
    @php
        $user = \App\Models\User::find(\Illuminate\Support\Facades\Auth::id());
        $user->last_seen = \Carbon\Carbon::now();
        $user->save();
    @endphp

</head>

<body>

<div class="msgs"></div>

<header>
    <a href="/" class="logo">
        <div class="logo__image"><img src="{{asset('assets/img/logo.svg')}}" alt=""></div>
        <p class="logo__slogan">GitCube</p>
    </a>

    <div class="user">
        <div class="icon user__notice"><img src="{{asset('assets/img/bell.svg')}}" alt=""></div>
        <div class="avatar">
            <img src="{{$user->getPhoto()}}" alt="">
        </div>
        <p class="user__name">{{ auth()->user()->name }}</p>
        <a class="icon user__arrow"><img src="{{asset('assets/img/arrow.svg')}}" alt=""></a>
        <ul class="submenu">
            <li class="submenu__item"><a href="{{route('user.settings')}}" class="submenu__link">Настройки</a></li>
            <li class="submenu__item"><a href="" class="submenu__link">Темы</a></li>
            <li class="submenu__item submenu__exit"><a href="{{route('user.logout')}}" class="submenu__link">Выйти</a></li>
        </ul>
    </div>
</header>
<main>

    @yield('main')

</main>
<footer>
    <a class="logo">
        <div class="logo__image"><img src="{{asset('assets/img/logo.svg')}}" alt=""></div>
        <p class="logo__slogan">GitCube</p>
    </a>
    <nav class="footer__menu">
        <a href="/" class="menu-link">Главная</a>
        <a href="" class="menu-link">Документация</a>
        <a href="{{route('support')}}" class="menu-link">Техническая поддержка</a>
    </nav>
</footer>
<script src="{{asset('assets/js/jquery-3.6.0.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('assets/js/msg.js')}}"></script>

@yield('jquery')

<script>
        $('.select-type').on('change', function () {
            if ($(this).val() == "open") {
                $('.profile-edit--settings').slideDown()
            }
            else {
                $('.profile-edit--settings').slideUp()
            }
        })
    </script>

@if($errors->any())
    <script>
        @foreach ($errors->all() as $error)
        new Msg('{{$error}}', true);
        @endforeach
    </script>
@endif

@if(session('status'))
    <script>new Msg('{{session('status')}}')</script>
@endif

</body>

</html>
