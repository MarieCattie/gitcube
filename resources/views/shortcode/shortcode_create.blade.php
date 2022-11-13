@extends('layouts.index')

@section('title', 'Создание шорткода')



@section('main')
    <div class="container container-row">
        <!-- ОСНОВНОЙ -->
        <div class="content-container content main-content">
            <!-- Секция -->
            <section>
                <div class="container-flex main-content__title">
                    <h1 class="title-1">Создать шорткод</h1>
                </div>
            </section>
            <!-- // Секция -->
            <!-- Секция -->
            <section>
                <form action="{{route('post.shortcode.create')}}" method="post" class="form create">
                    @csrf
                    <!-- Поле -->
                    <div class="create__field">
                        <label class="create__label" for="short-name">Название шорткода</label>
                        <input type="text" name="short-name" id="short-name" class="form__field create__input">
                    </div>
                    <!-- Поле -->
                    <div class="create__field">
                        <label class="create__label" for="short-status">Статус репозитория</label>
                        <select name="short-status" id="short-status" class="profile-edit__select form__field">
                            <option value="repo-open">Открытый</option>
                            <option value="repo-friends">Только друзьям</option>
                            <option value="repo-cllose">Закрытый</option>
                        </select>
                    </div>
                    <!-- Поле -->
                    <div class="create__field">
                        <label class="create__label" for="short-access">Доступ к cdn</label>
                        <div class="profile-settings__checkboxes-group">
                            <!-- Чекбокс -->
                            <div class="profile-check">

                                <input type="checkbox" name="show-mail" id="show-mail">
                                <label for="show-mail" class="show-mail"></label>
                                <p>Разрешить пользователям доступ к cdn</p>

                            </div>
                            <!-- //Чекбокс -->
                        </div>
                    </div>
                    <button class="btn">Создать</button>
                </form>
            </section>
            <!-- // Секция -->
        </div>
        <!-- // ОСНОВНОЙ -->

    </div>
@endsection