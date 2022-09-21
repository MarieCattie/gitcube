@extends('layouts.index')


@section('title', 'Что такое шорткод?')
    

@section('main')
    <div class="container container-row">
        <!-- ОСНОВНОЙ -->
        <div class="content-container content main-content">
            <!-- Секция -->
            <section>
                <div class="container-flex main-content__title">
                    <h1 class="title-1">Шорткод - что это такое</h1>
                </div>
                <p class="shortcode-about__quote">
                    Шорткод - удобный способ хранения и частого использования фрагментов кода 
                </p>
                <p class="shortcode-about__text">
                    Представляет собой
                    единичный файл, который вы сможете подключить к вашим проектам по cdn и использовать как
                    библиотеку.
                </p>
                <h2 class="title-2 shortcode-about__title">Основные возможности:</h2>
                <ul class="shortcode-about__features ckecked-list">
                    <li class="checked-list__item">Создавайте собственные библиотеки и cdn для их подключения</li>
                    <li class="checked-list__item">Загружайте шорткоды, чтобы не потерять их или поделиться с
                        другими людьми</li>
                    <li class="checked-list__item">Скачивайте файлы или копируйте cdn шорткодов других
                        пользователейи</li>
                </ul>
                <h2 class="title-2 shortcode-about__title">Отличие шорткода от репозитория
                </h2>
                <p class="shortcode-about__text">
                Если репозиторий - это хранилище файлов проекта, то шорткод - это отдельный файл, не относящийся к
                какому-то проекту. В отличие от файлов репозитория, шорткод можно подключить по cdn  
                </p>
            </section>
            <!-- // Секция -->
        </div>
        <!-- // ОСНОВНОЙ -->

    </div>
@endsection
