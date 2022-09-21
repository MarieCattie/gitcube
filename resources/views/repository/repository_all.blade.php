@extends('layouts.index')


@if($user->id == Auth::id())
    @section('title', 'Мои репозитории')
@else
    @section('title', 'Репозитории ' . $user->login)
@endif



@section('main')
        <div class="container container-row">
            <!-- ОСНОВНОЙ -->
            <div class="content-container content">


                

                <!-- Секция -->
                <section>
                    <div class="container-flex main-content__title">
                        @if($user->id == Auth::id())
                            <h1 class="title-1">Мои репозитории</h1>
                        @else
                            <h1 class="title-1">Репозитории {{$user->login}}</h1>
                        @endif
                        <div class="search-field">
                            <input placeholder="Найти" id="search" type="text" class="form__field">
                            <label for="search" class="search-field__icon"></label>
                        </div>
                    </div>
                </section>
                <!-- // Секция -->
                <!-- Секция -->
                <section>
                    <div class="container-grid-4 rep">

                        @if(count($repositories) == 0)
                            @if($user->id == Auth::id())
                                <h3>У вас нет ни одного репозитория</h3>
                            @else
                                <h3>У {{$user->login}} нет ни одного репозитория</h3>
                            @endif
                        @endif

                        @foreach($repositories as $rep)
                            <!-- Репозиторий -->
                            <div class="rep__item repository">
                                <a href="/repository/{{$rep->id}}" class="repository__title"><h2>{{$rep->title}}</h2></a>
                                <div class="container-flex">
                                    <span class="repository__lang lang-{{$rep->lang}}">{{$rep->lang}}</span>
                                    <span class="repository__update">обновлен 2 часа назад</span>
                                </div>
                            </div>
                            <!-- || Репозиторий -->
                        @endforeach
                    </div>
                </section>
                <!-- // Секция -->
            </div>
            <!-- // ОСНОВНОЙ -->

        </div>
    </main>
@endsection