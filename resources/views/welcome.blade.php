<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/msgs.css">
    <title>GitCube</title>

    <meta name="csrf-token" content="{{csrf_token()}}">
</head>

<body>

    <div class="msgs"></div>
    <header>
        <div class="container container-flex">
            <div class="logo"> <img src="assets/img/logo.png" alt=""> </div>
            <div id="enter-question">
                <div class="container-flex">
                    <p class="popup__text mr-40">Уже зарегистрированы?</p><a class="popup__link"
                        id="enter-btn">Войти</a>
                </div>
            </div>

            <div id="register-question">
                <div class="container-flex">
                    <p class="popup__text mr-40">Еще не зарегистрированы?</p><a class="popup__link"
                        id="register-btn">Зарегистрироваться</a>
                </div>
            </div>

        </div>
    </header>
    <main>
        <div class="container-flex main-content">
            <div class="about">
                <div class="about__logo">
                    <img src="assets/img/dark-purple-logo-large.png" alt="">
                </div>
                <h1 class="about__company">GitCube</h1>
                <p class="about__info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae deserunt
                    illum
                    adipisci neque aperiam debitis ratione quod, sequi ipsam asperiores, obcaecati reiciendis.</p>
            </div>
            <div class="forms">
                <!-- Регистрация -->
                <div class="popup" id="register">
                    <p class="popup__title">Регистрация</p>
                    <form method="post" action="{{route('post.user.registration')}}">
                        @csrf
                        <div class="container-flex">
                            <div class="mr-40 form-section">
                                <div class="form__group">
                                    <label class="form__label" for="surname">Введите вашу фамилию</label>
                                    <input autocomplete="off" value="{{old('surname')}}" class="form__control" type="text" name="surname"
                                        id="surname">
                                    <span class="form__underline"></span>
                                </div>
                                <div class="form__group">
                                    <label class="form__label" for="email">Введите ваш Email</label>
                                    <input autocomplete="off" value="{{old('email')}}" class="form__control" type="email" name="email"
                                        id="email">
                                    <span class="form__underline"></span>
                                </div>
                                <div class="form__group">
                                    <label class="form__label" for="password">Придумайте пароль</label>
                                    <input autocomplete="off" class="form__control" type="password" name="password"
                                        id="password">
                                    <span class="form__underline"></span>
                                </div>
                            </div>
                            <div class="form-section">
                                <div class="form__group">
                                    <label class="form__label" for="name">Введите ваше имя</label>
                                    <input autocomplete="off" value="{{old('name')}}" class="form__control" type="text" name="name" id="name">
                                    <span class="form__underline"></span>
                                </div>
                                <div class="form__group">
                                    <label class="form__label" for="login">Придумайте логин</label>
                                    <input autocomplete="off" value="{{old('login')}}" class="form__control" type="text" name="login" id="login">
                                    <span class="form__underline"></span>
                                </div>

                                <div class="form__group">
                                    <label class="form__label" for="re-password">Введите пароль еще раз</label>
                                    <input autocomplete="off" class="form__control" type="password" name="re-password"
                                        id="re-password">
                                    <span class="form__underline"></span>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="popup__link popup__btn">Зарегистрироваться</button>

                    </form>
                </div>
                <!-- // Регистрация -->
                <!-- Вход -->
                <div class="popup" id="enter">
                    <p class="popup__title">Вход</p>
                    <form method="post" action="{{ route('post.user.login') }}">
                        @csrf
                        <div class="container-flex">
                            <div class="mr-40 form-section">
                                <div class="form__group">
                                    <label class="form__label" for="login">Введите логин</label>
                                    <input autocomplete="off" class="form__control" type="text" name="login" id="login">
                                    <span class="form__underline"></span>
                                </div>
                            </div>

                            <div class="form-section">
                                <div class="form__group">
                                    <label class="form__label" for="password">Введите пароль</label>
                                    <input autocomplete="off" class="form__control" type="password" name="password"
                                        id="password">
                                    <span class="form__underline"></span>
                                </div>
                            </div>
                        </div>
                        <div class="container-flex">
                            <label class="form__label form__check">
                                <input type="checkbox" name="remember" id="remember">
                                <span class="checkbox"></span>
                                Запомнить меня
                            </label>
                        </div>

                        <button type="submit" class="popup__link popup__btn">Войти</button>

                    </form>
                </div>
                <!-- // Вход -->
            </div>
        </div>
    </main>

    <footer>
        <div class="container container-flex">
            <div class="logo logo-footer"><img src="assets/img/dark-purple-logo.png" alt=""></div>
            <nav>
                <ul class="menu">
                    <li class="menu__item mr-40"><a class="menu__link" href="">Главная</a></li>
                    <li class="menu__item mr-40"><a class="menu__link" href="">Документация</a></li>
                    <li class="menu__item"><a class="menu__link" href="">Техническая поддержка</a></li>
                </ul>
            </nav>

        </div>
    </footer>
    <script src="assets/js/jquery-3.6.0.js"></script>
    <script src="assets/js/msg.js"></script>
    <script src="assets/js/main.js"></script>

    @if($errors->any())
        <script>
            @foreach ($errors->all() as $error)
            new Msg('{{$error}}', true);
            @endforeach
        </script>
    @endif
</body>

</html>
