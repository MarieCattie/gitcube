@extends('layouts.index')

@section('title', 'Профиль')

@section('main')
        <div class="container container-row">
            <!-- ОСНОВНОЙ -->
            <div class="content-container content">
                <!-- Секция -->
                <section>
                    <div class="container-flex main-content__title">
                        <h1 class="title-1">Мои друзья</h1>
                        <div class="search-field">
                            <input placeholder="Найти по логину" id="search" type="text" class="form__field">
                            <label for="search" class="search-field__icon"></label>
                        </div>
                    </div>
                </section>
                <!-- // Секция -->
                <!-- Секция -->
                <section class="allfriends">
                    <!-- ПОЛЬЗОВАТЕЛЬ -->
                    <div class="content profile allfriends__item">
                        <div class="profile__user">
                            <div class="profile__avatar allfriends__avatar">
                                <!-- Место для изображения img -->
                            </div>
                            <a href="" class="profile__name">MarieCattie</a>
                        </div>

                        <div class="delete delete-all">
                            Удалить из друзей
                        </div>
                    </div>
                    <!-- // ПОЛЬЗОВАТЕЛЬ -->
                    <!-- ПОЛЬЗОВАТЕЛЬ -->
                    <div class="content profile allfriends__item">
                        <div class="profile__user">
                            <div class="profile__avatar allfriends__avatar">
                                <!-- Место для изображения img -->
                            </div>
                            <a href="" class="profile__name">MarieCattie</a>
                        </div>

                        <div class="delete delete-all">
                            Удалить из друзей
                        </div>
                    </div>
                    <!-- // ПОЛЬЗОВАТЕЛЬ -->
                </section>
                <!-- // Секция -->
            </div>
            <!-- // ОСНОВНОЙ -->

        </div>
@endsection
