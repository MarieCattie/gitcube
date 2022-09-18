@extends('layouts.index')

@section('title', 'Профиль')

@section('main')
    <div class="container">
        <!-- ПОЛЬЗОВАТЕЛЬ -->
        <div class="content-container content profile">
            <div class="profile__user">
                <div class="profile__avatar">
                    <img src="{{asset('assets/img/' . $user->photo_src)}}" alt="">
                    <!-- Место для изображения img -->
                </div>
                <div>
                    <a href="" class="profile__name">{{$user->login}}</a>
                    @if($user->id == auth()->id())
                        <p class="profile__status online">Online</p>
                    @else
                        @if($user->isOnline())
                            <p class="profile__status online">Online</p>
                        @else
                            <p class="profile__status offline">Offline</p>
                        @endif
                    @endif

                </div>
            </div>

            <div class="profile__info">
                <p>{{$user->name}} {{$user->surname}}</p>
                <p>{{$user->email}}</p>
            </div>
            @if($user->id == auth()->id())
                <a href="{{route('user.logout')}}" class="btn btn-danger logout">Выйти</a>
            @else
                @if($relation == -2)
                    <a href="" class="btn">Добавить в друзья</a>
                @elseif($relation == -1)
                    <a href="" class="btn">Отозвать заявку</a>
                @elseif($relation == 0)
                    <a href="" class="btn">Удалить из друзей</a>
                @else
                    <a href="" class="btn logout">Принять заявку</a>
                @endif
            @endif
        </div>
        <!-- // ПОЛЬЗОВАТЕЛЬ -->
        <!-- ОСНОВНОЙ -->
        <div class="content-container content main-content">
            <!-- Секция -->
            <section>
                <div class="container-flex main-content__title">
                    <h1 class="title-1">Репозитории</h1>
                    <div class="active-btns container-flex">
                        @if($user->id == auth()->id())
                            <a href="" class="btn">Создать новый</a>
                        @endif

                        @if(count($repositories) > 4)
                            <a href="" class="btn btn-grey">Показать все</a>
                        @endif
                    </div>
                </div>
                <div class="container-grid-4 rep">

                    @if(count($repositories) == 0)
                        @if($user->id == auth()->id())
                            <p>У вас нет ни одного репозитория</p>
                        @else
                            <p>У {{$user->login}} нет ни одного репозитория</p>
                        @endif
                    @endif

                    @foreach($repositories as $rep)
                        <!-- Репозиторий -->
                        <div class="rep__item repository">
                            <a href="/repository/{{$rep->id}}" class="repository__title">{{$rep->title}}</a>
                            <div class="container-flex">
                                <span class="repository__lang lang-{{$rep->lang}}">{{$rep->lang}}</span>
                                <span class="repository__update">обновлен 2 часа назад</span>
                            </div>
                        </div>
                        <!-- || Репозиторий -->
                    @endforeach




                </div>
            </section>
            <!-- // Секция -->
            <!-- Секция -->
            <section>
                <div class="container-flex main-content__title">
                    <h1 class="title-1">Шорткоды</h1>
                    <div class="active-btns container-flex">
                        @if($user->id == auth()->id())
                            <a href="" class="btn">Создать новый</a>
                        @endif

                        @if(count($shortcodes) > 9)
                            <a href="" class="btn btn-grey">Показать все</a>
                        @endif
                    </div>
                </div>
                <div class="shortcodes container-grid-row-3-col-4">

                    @if(count($shortcodes) == 0)
                        @if($user->id == auth()->id())
                            <p>У вас нет ни одного шорткода <a class="classic__link" href="{{route('shortcode.faq')}}">что это такое?</a></p>
                        @else
                            <p>У {{$user->login}} нет ни одного шорткода <a class="classic__link" href="{{route('shortcode.faq')}}">что это такое?</a></p>
                        @endif
                    @endif

                    @foreach($shortcodes as $shortcode)
                        <div class="short">
                            <a href="/shortcode/{{$shortcode->filename}}" class="short__name">{{$shortcode->title}}</a>
                            <div class="short__controls">
                                <a href="{{url("/shortcode/download/$shortcode->filename")}}" class="download">
                                    <img src="{{asset('assets/img/download.svg')}}" alt="">
                                </a>
                                @if($user->id == auth()->id())
                                    <a href="" class="edit">
                                        <img src="{{asset('assets/img/pencil.svg')}}" alt="">
                                    </a>
                                @endif
                                <a href="/shortcode/cdn/{{$shortcode->filename}}" class="cdn cdn-button">cdn</a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </section>
            <!-- // Секция -->
        </div>
        <!-- // ОСНОВНОЙ -->
        <!-- ДРУЗЬЯ -->
        <div class="content-container bar">
            @if($user->id == auth()->id())
                <h2 class="title-2">Мои друзья</h2>
            @else
                <h2 class="title-2">Друзья {{$user->login}}</h2>
            @endif
            <div class="friends">



                <!-- Друг -->
                @foreach($friends as $friend)
                    <div class="friend">
                        <div class="friend__avatar">
                            <img src="{{asset('assets/img/' . $friend->photo_src)}}" alt="">
                        </div>
                        <div>
                            <a href="/profile/{{$friend->id}}" class="friend__login">{{$friend->login}}</a>
                            <p class="friend__name">{{$friend->name}}</p>
                        </div>
                    </div>
                @endforeach
                <!-- // Друг -->

                @if(count($friends) == 0)
                    <div class="friend">
                        <div>
                            @if($user->id == auth()->id())
                                <p>В списке друзей никого нет</p>
                                <p>Пригласи или найди друга в <a class="classic__link" href="{{route('friend.index')}}">поиске</a></p>
                            @else
                                <p>В списке друзей {{$user->login}} никого нет</p>
                                <p>Станьте первым другом {{$user->login}}</p>
                            @endif
                        </div>
                    </div>
                @else
                    <a href="" class="friends__showall">Показать всех <p class="after"></p></a>
                @endif

            </div>
        </div>
        <!-- // ДРУЗЬЯ -->

    </div>
@endsection
