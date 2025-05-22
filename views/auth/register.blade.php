@extends('theme')
@section('title','Регистрация')
@section('content')
<section class="container d-flex justify-content-center register-form-content py-5" id="register">
    <div class="cntainer-h1 register-form">
        <h1 class="text-dark">Регистрация</h1>
    <form action="/register" method="post" class="register-form ">
        @csrf
        <div class="form-floating is-invalid py-2">
            <input type="text" class="form-control" id="name" name="user_name" required>
            <label for="name"  >ФИО <span class="text-success">*</span></label>
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-floating is-invalid py-2">
            <input type="text" class="form-control"  id="login" name="login" required>
            <label for="login">Логин <span class="text-success">*</span></label>
            <div class="loginError"></div>
        </div>
        <div class="form-floating is-invalid py-2">
            <input type="email" class="form-control"  id="email" name="email" required>
            <label for="email">Электронная почта <span class="text-success">*</span></label>
            <div class="emailError"></div>
        </div>
        <div class="form-floating is-invalid py-2">
            <input type="tel" class="form-control"  id="tel" name="phone" required>
            <label for="tel">Телефон <span class="text-success">*</span></label>
            <div class="telError"></div>
        </div>
        <div class="form-floating is-invalid py-2">
            <input type="password" class="form-control"  id="password" name="password" required>
            <label for="password">Пароль <span class="text-success">*</span></label>
            <div class="passwordError"></div>
        </div>
        <div class="form-floating is-invalid py-2">
            <input type="password" class="form-control"  id="password-confirm" name="password_confirmation" required>
            <label for="password-confirm">Повтор пароля <span class="text-success">*</span></label>
            <div class="passwordConfirmError"></div>
        </div>
        <div>
            <input type="checkbox" id="checkbox" name="checkbox" required> <span class="text-success">*</span>
            <label for="checkbox">Я согласен с чем-то</label><br>
            <div class="checkboxError"></div>
        </div>
        <input type="submit" class="btn btn-success w-100" value="Зарегистрироваться">
        <p class="ms-4">Уже зарегистрированы? <a href="/login" class="link-success">Авторизация</a></p>
    </form>
    </div>
</section>
@endsection
