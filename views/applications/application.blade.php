@extends('theme')
@section('title','Оформление заявки')
@section('content')
       <section class="container d-flex justify-content-center py-5" id="login">
            <div class="cntainer-h1 register-form ">
                <h1 class="text-dark">Отправить заявку</h1>

            <form action="/application" method="post" class="register-form d-flex flex-column aling-items-center" enctype="multipart/form-data">
                @csrf
                <div class="form-floating is-invalid py-2">
                    <input type="file" name="photo" id="photo" class="form-control" required>
                    <label for="photo" class="form-label">Выбрать фото <span class="text-success">*</span></label>
                    <div class="photoError"></div>
                </div>
                <div class="form-floating is-invalid py-2">
                    <input type="text" name="address" id="address" class="form-control" required>
                    <label for="address" class="form-label">Адрес <span class="text-success">*</span></label>
                    <div class="addressError"></div>
                </div>
                <div class="form-floating is-invalid py-2">
                    <input type="tel" class="form-control"  id="phone" name="phone" required>
                    <label for="phone">Телефон <span class="text-success">*</span></label>
                    <div class="telError"></div>
                </div>
                <div class="form-floating is-invalid py-2">
                    <input type="date" class="date form-control"  id="date" name="date" required>
                    <label for="date">Выбирите дату <span class="text-success">*</span></label>
                </div>
                <div class="form-floating is-invalid py-2">
                    <input type="time" class="form-control"  id="time" name="time" required>
                    <label for="time">Выбирите время <span class="text-success">*</span></label>
                    <div class="datetimeError"></div>
                </div>

                <div class="form-floating is-invalid py-2">
                    <select name="type_services" id="type_services"  class="form-select">
                        <option value="">Выбирите услугу</option>
                        @foreach($services as $service)
                            <option value="{{$service->id}}">{{$service->name}}</option>
                        @endforeach
                    </select>
                    <label for="name " >Услуга <span class="text-success">*</span></label>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-floating is-invalid py-2">
                    <textarea name="comment" id="comment" cols="30" rows="10" class="form-control mt-3" placeholder="Опишите проблему"></textarea>
                    <label for="name " >Оставте пожелания <span class="text-success">*</span></label>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-floating is-invalid py-2">
                    <label for="type_pay">Тип оплаты <span class="text-success">*</span></label>
                    <select name="type_pay" id="type_pay"  class="form-select">
                        <option value="">Выбрать тип оплаты</option>
                        <option value="1">Наличные</option>
                        <option value="2">Банковская карта</option>
                    </select>
                    <div class="type_payError"></div>
                </div>
                <input type="submit" class="btn btn-success w-100" value="Отправить">
            </form>
        </section>
@endsection
