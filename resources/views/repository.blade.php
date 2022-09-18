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
                        <input type="hidden" id="url" value="{{url()->current()}}">
                        <h1 class="title-1 repo__title shortcode__title">{{$rep->title}}</h1>
                        <div id="postitle-container" style="display: flex; align-items: center;">

                            <a href="/profile/{{$author->id}}" class="shortcode__postitle postitle">{{$author->login}}</a> &nbsp; — &nbsp; <p
                                class="postitle views__postitle">{{$rep->watches}}
                                @if($rep->watches % 100 != 11 && $rep->watches % 10 == 1)
                                    просмотр
                                @elseif(($rep->watches % 10 >= 2 && $rep->watches % 10 <= 4) && $rep->watches % 100 != 12 && $rep->watches % 100 != 13 && $rep->watches != 14)
                                    просмотра
                                @else
                                    просмотров
                                @endif
                            </p>
                        </div>

                    </div>
                    <div class="show-more">
                        <a class="show-more__btn"><span></span><span></span><span></span></a>
                        <div class="show-more__popup">
                            <a href="" class="show-more__popup__item show-more__popup__item-settings">Настройки</a>
                            <a href="" class="show-more__popup__item show-more__popup__item-zip">Загрузить Zip</a>
                            <a href="" class="show-more__popup__item show-more__popup__item-uploadfile">Загрузить
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
                        <div class="repository-list__item">
                            <div class="container-flex">
                                <div class="repository-list__image repository-list__image-folder"></div>
                                <a href="{{url()->current()}}" class="repository-list__link">.</a>
                            </div>
                            <div class="container-flex">
                            </div>
                        </div>
                    @endif

                    @foreach($folders as $folder)
                        <div class="repository-list__item">
                            <div class="container-flex">
                                <div class="repository-list__image repository-list__image-folder"></div>
                                <a href="/repository/{{$rep->id}}/{{$folder->title}}" class="repository-list__link">{{$folder->title}}</a>
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
                                    <a href="/repository/{{$rep->id}}/{{$file->title}}" class="repository-list__link">{{$file->title}}</a>
                                </div>
                                <div class="container-flex">
                                    <p class="repository-list__filesize">74 Kb</p>
                                    <a class="repository-list__image repository-list__image-del"></a>
                                </div>
                            </div>
                    @endforeach

                </div>
                <button class="btn">Загрузить</button>
            </section>
            <!-- // Секция -->
            <section class="comment-section">
                <h1 class="title-1">Комментарии</h1>
                <div class="comments">
                    <form action="{{route('repository.comment.create')}}" method="post">
                        @csrf
                        <input type="hidden" name="repository" value="{{$rep->id}}">
                        <textarea class="comments__item" name="text"></textarea>
                        <button type="submit" class="btn">Отправить</button>
                    </form>

                    @foreach($comments as $comment)
                        <!-- Комментарий -->
                        <div class="comments__item comment">
                            <div class="comment__head">
                                <a href="/profile/{{$comment->user->id}}" class="comment__avatar-author">
                                    <img src="{{asset('assets/img/' . $comment->user->photo_src)}}" alt="">
                                </a>
                                <a href="/profile/{{$comment->user->id}}" class="comment__name-author">{{$comment->user->login}}</a>
                            </div>
                            <div class="comment__main">{{$comment->comment}}</div>
                        </div>
                        <!-- // Комментарий -->
                    @endforeach

                </div>
            </section>
        </div>
        <!-- // ОСНОВНОЙ -->


    </div>

@endsection


