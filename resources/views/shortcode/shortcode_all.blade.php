@extends('layouts.index')


@if($user->id == Auth::id())
    @section('title', 'Мои шорткоды')
@else
    @section('title', 'Шорткоды ' . $user->login)
@endif



@section('main')
        <div class="container container-row">
            <!-- ОСНОВНОЙ -->
            <div class="content-container content">
                <!-- Секция -->
                <section>
                    <div class="container-flex main-content__title">
                        @if($user->id == Auth::id())
                            <h1 class="title-1">Мои шорткоды</h1>
                        @else
                            <h1 class="title-1">Шорткоды {{$user->login}}</h1>
                        @endif
                        <div class="search-field">
                            <input placeholder="Найти" id="search" type="text" class="form__field">
                            <label for="search" class="search-field__icon"></label>
                        </div>
                    </div>
                </section>
                <!-- // Секция -->
                <!-- Секция -->
                <section>
                    <div class="shortcodes container-grid-row-3-col-4">

                        @foreach ($shortcodes as $short)
                            <div class="short">
                                <p class="short__name">{{$short->title}}</p>
                                <div class="short__controls">
                                    <a href="" class="download">
                                        <img src="{{asset('assets/img/download.svg')}}" alt="">
                                    </a>
                                    <a href="" class="edit">
                                        <img src="{{asset('assets/img/pencil.svg')}}" alt="">
                                    </a>
                                    <a href="" class="cdn">cdn</a>
                                </div>
                            </div>
                        @endforeach

                        <div class="short">
                            <p class="short__name">main.js</p>
                            <div class="short__controls">
                                <a href="" class="download">
                                    <img src="assets/img/download.svg" alt="">
                                </a>
                                <a href="" class="edit">
                                    <img src="assets/img/pencil.svg" alt="">
                                </a>
                                <a href="" class="cdn">cdn</a>
                            </div>
                        </div>
                        <div class="short">
                            <p class="short__name">main.js</p>
                            <div class="short__controls">
                                <a href="" class="download">
                                    <img src="assets/img/download.svg" alt="">
                                </a>
                                <a href="" class="edit">
                                    <img src="assets/img/pencil.svg" alt="">
                                </a>
                                <a href="" class="cdn">cdn</a>
                            </div>
                        </div>
                        <div class="short">
                            <p class="short__name">main.js</p>
                            <div class="short__controls">
                                <a href="" class="download">
                                    <img src="assets/img/download.svg" alt="">
                                </a>
                                <a href="" class="edit">
                                    <img src="assets/img/pencil.svg" alt="">
                                </a>
                                <a href="" class="cdn">cdn</a>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Секция -->
            </div>
            <!-- // ОСНОВНОЙ -->

        </div>
@endsection