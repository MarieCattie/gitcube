@extends('layouts.index')


@section('title', 'Профиль')

@section('main')
<form action="">
            <div class="container container-row" style="grid-template-rows: none;">
                <!-- ОСНОВНОЙ -->
                <div class="content-container content">
                    <!-- Секция -->
                    <section>
                        <div class="container-flex main-content__title">
                            <h1 class="title-1">Настроить профиль</h1>
                        </div>
                        <!-- ПОЛЬЗОВАТЕЛЬ -->
                        <div class="content profile profile-edit profile-edit--container">
                            <div class="profile__user profile-edit--container">
                                <a href="" class="profile__avatar profile-edit__avatar">
                                    <!-- Место для изображения img -->
                                </a>
                                <div class="profile-edit--container">
                                    <!-- СМЕНИТЬ ЛИЧНЫЕ ДАННЫЕ -->
                                    <div class="container-flex">
                                        <div class="profile-edit__field--container"><input value="ivanov123"
                                                placeholder="Логин" type="text" class="form__field profile-edit__field">
                                        </div>
                                        <div class="profile-edit__field--container"><input value="ivan@mail.ru"
                                                placeholder="E-mail" type="text"
                                                class="form__field profile-edit__field"></div>
                                    </div>
                                    <div class="container-flex">
                                        <div class="profile-edit__field--container"><input value="Иванов"
                                                placeholder="Фамилия" type="text"
                                                class="form__field profile-edit__field"></div>
                                        <div class="profile-edit__field--container"><input value="Иван"
                                                placeholder="Имя" type="text" class="form__field profile-edit__field">
                                        </div>
                                    </div>
                                    <!-- //СМЕНИТЬ ЛИЧНЫЕ ДАННЫЕ -->
                                </div>
                            </div>
                        </div>
                        <!-- // ПОЛЬЗОВАТЕЛЬ -->
                    </section>
                    <div class="profile-edit--container profile-edit--container--select">
                        <div class="profile-edit__field--container"><label class="profile-edit__label form__label"
                                for="profile-type">Тип профиля</label> <select name=""
                                class="profile-edit__select select-type form__field">
                                <option value="open">Открытый</option>
                                <option value="close">Закрытый</option>
                            </select>
                        </div>
                        <div class="profile-edit__field--container profile-edit--container--select"><label
                                class="profile-edit__label form__label" for="profile-type">Тема</label>
                            <select name="" class="profile-edit__select form__field">
                                <option value="theme-light">Светлая</option>
                                <option value="theme-dark">Темная</option>
                            </select>
                        </div>
                    </div>
                    <div class="profile-edit--settings">
                        <h2 class="title-2">Параметры отображения</h2>
                        <p class="postitle">Отмеченные элементы будут видеть все посетители в вашем профиле</p>
                        <div class="profile-settings__checkboxes">
                            <div class="profile-settings__checkboxes-group">
                                <!-- Настройки профиля: чекбоксы: скрывать/показывать -->
                                <!-- Чекбокс -->
                                <div class="profile-check">

                                    <input type="checkbox" name="show-mail" id="show-mail">
                                    <label for="show-mail" class="show-mail"></label>
                                    <p>Показывать E-mail</p>

                                </div>
                                <!-- //Чекбокс -->
                                <!-- Чекбокс -->
                                <div class="profile-check">

                                    <input type="checkbox" name="show-mail" id="show-mail">
                                    <label for="show-mail" class="show-mail"></label>
                                    <p>Показывать Фамилию и Имя</p>

                                </div>
                                <!-- //Чекбокс -->
                                <!-- Чекбокс -->
                                <div class="profile-check">

                                    <input type="checkbox" name="show-mail" id="show-mail">
                                    <label for="show-mail" class="show-mail"></label>
                                    <p>Показывать статус (онлайн/офлайн)</p>

                                </div>
                                <!-- //Чекбокс -->
                                <!-- //Настройки профиля: чекбоксы: скрывать/показывать -->
                            </div>
                            <div class="profile-settings__checkboxes-group">
                                <!-- Настройки профиля: чекбоксы: скрывать/показывать -->
                                <!-- Чекбокс -->
                                <div class="profile-check">

                                    <input type="checkbox" name="show-mail" id="show-mail">
                                    <label for="show-mail" class="show-mail"></label>
                                    <p>Показывать E-mail</p>

                                </div>
                                <!-- //Чекбокс -->
                                <!-- Чекбокс -->
                                <div class="profile-check">

                                    <input type="checkbox" name="show-mail" id="show-mail">
                                    <label for="show-mail" class="show-mail"></label>
                                    <p>Показывать Фамилию и Имя</p>

                                </div>
                                <!-- //Чекбокс -->
                                <!-- Чекбокс -->
                                <div class="profile-check">

                                    <input type="checkbox" name="show-mail" id="show-mail">
                                    <label for="show-mail" class="show-mail"></label>
                                    <p>Показывать статус (онлайн/офлайн)</p>

                                </div>
                                <!-- //Чекбокс -->
                                <!-- //Настройки профиля: чекбоксы: скрывать/показывать -->
                            </div>
                        </div>
                    </div>
                    <!-- // Секция -->
                </div>
                <!-- // ОСНОВНОЙ -->
                <div class="content content-container profile-edit__confirm"><button type="submit" class="btn">Применить
                        изменения</button></div>
            </div>



        </form>

    </main>
@endsection
        