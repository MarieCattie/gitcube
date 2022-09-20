@extends('layouts.index')


@section('title', $file->title)

@section('main')
    <div class="container container-row">
        <!-- ОСНОВНОЙ -->
        <div class="content-container content main-content shortcode file">
            <!-- Секция -->
            <section class="shortcode__head">
                <div class="container-flex main-content__title">
                    <div>
                        <h1 class="title-1 shortcode__title">{{$file->title}}</h1>
                        <p id="postitle-container" class="postitle file__postitle">{{$file->repository->title}}</p>
                    </div>
                    <div class="show-more">
                        <a class="show-more__btn"><span></span><span></span><span></span></a>
                        <div class="show-more__popup">
                            <a href="" class="show-more__popup__item show-more__popup__item-download">Скачать</a>
                            <a href="" class="show-more__popup__item show-more__popup__item-refresh">Обновить</a>
                            <a href="" class="show-more__popup__item show-more__popup__item-edit">Изменить</a>

                            <a href="" class="show-more__popup__item show-more__popup__item-delete">Удалить</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Секция -->
            <!-- Секция -->
            <section class="shortcode__content">

            </section>
            <!-- // Секция -->
        </div>
        <!-- // ОСНОВНОЙ -->

    </div>
@endsection
