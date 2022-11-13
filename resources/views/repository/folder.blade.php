@extends('layouts.index')

@section('title', 'Репозиторий')

@section('main')
    <div class="container container-row">
        <!-- ОСНОВНОЙ -->
        <div class="content-container content main-content shortcode">
            <!-- Секция -->
            <section class="shortcode__head">
                <div class="container-flex main-content__title">
                    <div>
                        <h1 class="title-1 repo__title shortcode__title">{{$rep->title}}</h1>
                        <div id="postitle-container" style="display: flex; align-items: center;">
                            <a href="/profile/{{$author->id}}" class="shortcode__postitle postitle">{{$author->login}}</a>
                        </div>

                    </div>
                    <div class="show-more">
                        <a class="show-more__btn"><span></span><span></span><span></span></a>
                        <div class="show-more__popup">
                            <a href="" class="show-more__popup__item show-more__popup__item-settings">Настройки</a>
                            <a href="" class="show-more__popup__item show-more__popup__item-zip load-btn">Загрузить Zip</a>
                            <a href="" class="show-more__popup__item show-more__popup__item-uploadfile load-btn">Загрузить
                                файл</a>
                            <div
                                class="show-more__popup__item show-more__popup__item-public show-more__popup__item-select">
                                <a class="show-more__item-active" data-type="public">Публичный</a>
                                <div class="show-more__popup-select">
                                    <a data-type="public" class="show-more__popup-select-item">Публичный</a>
                                    <a data-type="private" class="show-more__popup-select-item">Закрытый</a>
                                </div>
                            </div>

                        </div>
                    </div>



                </div>
            </section>
            <!-- // Секция -->
            <!-- Секция -->
            <section>
                <div class="repository-list">

                    @if(count($folders) == 0 && count($files) == 0)
                        <p>Данный каталог пуст</p>
                    @endif

                    <div class="repository-list__item">
                        <div class="container-flex">
                            <div class="repository-list__image repository-list__image-folder"></div>
                            <a href="/repository/{{$rep->id}}/{{$folder->top()->getPath()}}" class="repository-list__link">..</a>
                        </div>
                        <div class="container-flex">
                        </div>
                    </div>


                    @foreach($folders as $folder)
                        <div class="repository-list__item">
                            <div class="container-flex">
                                <div class="repository-list__image repository-list__image-folder"></div>
                                <a href="/repository/{{$rep->id}}/{{$path}}/{{$folder->title}}" class="repository-list__link">{{$folder->title}}</a>
                            </div>
                            <div class="container-flex">
                                <a class="repository-list__image repository-list__image-del"></a>
                            </div>
                        </div>
                    @endforeach

                    @foreach($files as $file)
                        <div class="repository-list__item">
                            <div class="container-flex">
                                <div class="repository-list__image repository-list__image-file"></div>
                                <a href="/repository/{{$rep->id}}/{{$path}}/{{$file->title}}" class="repository-list__link">{{$file->title}}</a>
                            </div>
                            <div class="container-flex">
                                <p class="repository-list__filesize">74 Kb</p>
                                <a class="repository-list__image repository-list__image-del"></a>
                            </div>
                        </div>
                    @endforeach

                </div>
                <button class="btn load-btn">Загрузить</button>
            </section>
            <!-- // Секция -->

        </div>
        <!-- // ОСНОВНОЙ -->

    </div>
@endsection
