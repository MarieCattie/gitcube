@extends('layouts.index')

@section('title', 'создать репозиторий')


@section('main')
<div class="container container-row">
            <!-- ОСНОВНОЙ -->
            <div class="content-container content main-content">
                <!-- Секция -->
                <section>
                    <div class="container-flex main-content__title">
                        <h1 class="title-1">Создать репозиторий</h1>
                    </div>
                </section>
                <!-- // Секция -->
                <!-- Секция -->
                <section>
                    <form action="{{route('post.repository.create')}}" method="post" class="form create">
                        @csrf
                        <!-- Поле -->
                        <div class="create__field">
                            <label class="create__label" for="repo-name">Название репозитория</label>
                            <input type="text" name="repo-name" id="repo-name" class="form__field create__input">
                        </div>
                        <!-- Поле -->
                        <div class="create__field">
                            <label class="create__label" for="repo-status">Статус репозитория</label>
                            <select name="repo-status" id="repo-status" class="profile-edit__select form__field">
                                <option value="repo-open">Открытый</option>
                                <option value="repo-close">Закрытый</option>
                            </select>
                        </div>
                        <!-- Поле -->
                        <div class="create__field whoCanOpen none">
                            <label class="create__label" for="repo-access">Кто может заходить в репозиторий</label>
                            <select name="repo-access" id="repo-access" class="profile-edit__select form__field">
                                <option value="me">Только я</option>
                                <option value="friends">Только мои друзья</option>
                            </select>
                        </div>
                        <!-- Поле -->
                        <button class="btn">Создать</button>
                    </form>
                </section>
                <!-- // Секция -->
            </div>
            <!-- // ОСНОВНОЙ -->

        </div>
@endsection
    

@section('jquery')
    <script>

        $('#repo-status').on('input', function() {
            if($(this).val() == 'repo-close') {
                $('.whoCanOpen').removeClass('none');
            } else {
                $('.whoCanOpen').addClass('none');
            }
        })


    </script>
@endsection
      