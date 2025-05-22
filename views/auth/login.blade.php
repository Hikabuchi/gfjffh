@extends('theme')
@section('title','Авторизация')
@section('content')
<section class="container d-flex justify-content-center py-5" id="login">
    <div class="cntainer-h1 login-form">
        <h1 class="text-dark">Авторизация</h1>
        <form action="/login" method="post" >
            @csrf
            <div class="form-floating is-invalid py-2">
                <input type="text" class="form-control"  id="login" name="login" required>
                <label for="login">Логин <span class="text-success">*</span></label>
                <div class="loginError"></div>
            </div>
            <div class="form-floating is-invalid py-2">
                <input type="password" class="form-control"  id="password" name="password" required>
                <label for="password">Пароль <span class="text-success">*</span></label>
                <div class="passwordError"></div>
            </div>
            <input type="submit" class="btn btn-success w-100 btn-lg" value="Авторизоваться">
            <p class="ms-4">Ещё нет аккаунта? <a href="/register" class="link-success">Регистрация</a></p>
        </form>
    </div>
</section>
@endsection
