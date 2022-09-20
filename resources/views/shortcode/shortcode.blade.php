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
                        <p id="postitle-container" class="postitle shortcode__postitle">Загрузил(а) {{App\Models\User::find($shortcode->user_id)->login}}</p>
                    </div>
                    <div class="show-more">
                        <a class="show-more__btn"><span></span><span></span><span></span></a>
                        <div class="show-more__popup">
                            <a href="" class="show-more__popup__item show-more__popup__item-download">Скачать</a>
                            <a data-cdn="{{url("/shortcode/cdn/$shortcode->filename")}}" class="show-more__popup__item show-more__popup__item-copy shortcode-cdn">Скопировать CDN</a>
                            <a href="" class="show-more__popup__item show-more__popup__item-edit">Изменить</a>
                            <a href="{{url("/shortcode/download/$shortcode->filename")}}" class="show-more__popup__item show-more__popup__item-uploadfile">Загрузить файл</a>
                            <div class="show-more__popup__item show-more__popup__item-public show-more__popup__item-select">
                                <a class="show-more__item-active" data-type="public">Публичный</a>
                                <div class="show-more__popup-select">
                                    <a data-type="public" class="show-more__popup-select-item">Публичный</a>
                                    <a data-type="private" class="show-more__popup-select-item">Закрытый</a>
                                </div>
                            </div>
                            <a class="show-more__popup__item show-more__popup__item-delete">Удалить</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Секция -->
            <!-- Секция -->
            <section class="shortcode__content">
                <pre>
                    {{$content}}
                </pre>
            </section>
            <!-- // Секция -->
        </div>
        <!-- // ОСНОВНОЙ -->

    </div>
@endsection
