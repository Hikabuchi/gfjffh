<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('./bootstrap/bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('./css/style.css')}}">
</head>
<body>
    <header class="header border-bottom py-3">
    <div class="container d-flex justify-content-between aling-items-center">
        <a href="/">
            <img src="{{asset('./img/logo.svg')}}" alt="logo">
        </a>
        <nav>
            <ul class="nav d-flex gap-5">
                @auth()
                <li><a href="/profile" class="btn">Личный кабинет</a></li>
                <li><a href="/logout" class="btn btn-success btn-lg">Выйти</a></li>
                @else
                <li><a href="/register" class="btn btn-success btn-lg">Регистрация</a></li>
                <li><a href="/login" class="btn btn-success btn-lg">Войти</a></li>
                @endauth

            </ul>
        </nav>
    </div>
</header>
<main>
@yield('content')
</main>
<footer class="py-3 container d-flex justify-content-between aling-items-center">
    <ul class="nav d-flex">
        <li><a href="./" class="btn">Главная</a></li>
        <li><a href="/login" class="btn">Войти</a></li>
        <li><a href="/register" class="btn">Регистрация</a></li>
        <li><a href="/profile" class="btn">Мой заявки</a></li>
    </ul>
    <span>© 2025</span>
</footer>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="./scripts/script.js"></script>
</body>
</html>
