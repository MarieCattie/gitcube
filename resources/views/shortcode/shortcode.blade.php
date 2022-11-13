@extends('layouts.index')


@section('title', 'шорткод')

@section('main')
    <div class="container container-row">
        <!-- ОСНОВНОЙ -->
        <div class="content-container content main-content shortcode">
            <!-- Секция -->
            <section class="shortcode__head">
                <div class="container-flex main-content__title">
                    <div>
                        <h1 class="title-1 shortcode__title">{{$shortcode->title}}</h1>
                        <p id="postitle-container" class="postitle shortcode__postitle">Загрузил(а) <a class="link" href="{{route('user.user', ['id' => $shortcode->user->id])}}">{{$shortcode->user->login}}</a></p>
                    </div>
                    <div class="show-more">
                        <a class="show-more__btn"><span></span><span></span><span></span></a>
                        <div class="show-more__popup">

                            <a
                                href="{{route('shortcode.download', [
                                    'id' => $shortcode
                                ])}}"
                                class="show-more__popup__item show-more__popup__item-download">Скачать</a>

                            @if ($shortcode->cdn)
                                <a data-cdn="{{url("/shortcode/cdn/$shortcode->filename")}}" class="show-more__popup__item show-more__popup__item-copy shortcode-cdn">Скопировать CDN</a>
                            @endif


                            @if ($shortcode->user == Auth::user() || Auth::user()->power >= 3)
                                <a
                                    href="{{route('shortcode.edit', ['id' => $shortcode->id])}}"
                                    class="show-more__popup__item show-more__popup__item-edit">Изменить</a>


                                <a
{{--                                    href="{{url("/shortcode/download/$shortcode->filename")}}"--}}
                                    class="show-more__popup__item show-more__popup__item-uploadfile load-btn">Загрузить файл</a>

                                <div class="show-more__popup__item show-more__popup__item-public show-more__popup__item-select">
                                    <a class="show-more__item-active" data-type="public">
                                        @if ($shortcode->access)
                                            Публичный
                                        @else
                                            Закрытый
                                        @endif
                                    </a>
                                    <div class="show-more__popup-select">
                                        <a data-type="public" class="show-more__popup-select-item">Публичный</a>
                                        <a data-type="private" class="show-more__popup-select-item">Закрытый</a>
                                    </div>
                                </div>

                                <a class="show-more__popup__item show-more__popup__item-delete">Удалить</a>
                            @endif

                        </div>
                    </div>
                </div>
            </section>
            <!-- // Секция -->
            <!-- Секция -->
            <section class="shortcode__content">
                <pre>{{$content}}</pre>
            </section>
            <!-- // Секция -->
        </div>
        <!-- // ОСНОВНОЙ -->

    </div>
@endsection
