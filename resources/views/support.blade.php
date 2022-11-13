@extends('layouts.index')

@section('title', 'Техподдержка')

@section('main')
    <div class="container container-row">
        <!-- ОСНОВНОЙ -->
        <div class="content-container content main-content">
            <!-- Секция -->
            <section>
                <div class="container-flex main-content__title">
                    <h1 class="title-1">Техподдержка</h1>
                </div>
            </section>
            <!-- // Секция -->
            <!-- Секция -->
            <section>
                <form action="" method="post" class="form support">
                    <select name="" class="support__field form__field">
                        <option value="0">У меня проблема</option>
                        <option value="1">У меня есть идея</option>
                        <option value="2">Другое</option>
                    </select>
                    <textarea placeholder="Введите текст сообщения" name="" id="" cols="30" rows="10" class="support__field form__field"></textarea>
                    <button class="btn">Отправить</button>
                </form>
            </section>
            <!-- // Секция -->
        </div>
        <!-- // ОСНОВНОЙ -->

    </div>
@endsection
