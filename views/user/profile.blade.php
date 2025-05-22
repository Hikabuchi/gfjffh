@extends('theme')
@section('title','Личный кабинет')
@section('content')
<section class="container d-flex flex-wrap" id="user">
    <h1>{{Auth::user()->name}}</h1>
</section>
<section class="container py-3" id="request">
    <a href="/application" class="btn btn-bg-light link-success">Оформить новую заявку</a>
    <h2>История заявок</h2>
    <div class="d-flex flex-wrap  gap-3">
        @foreach($applications as $application)
        <div class="card card-req">
            <p class="@if($application->status_id == 4) text-danger @elseif($application->status_id == 3) text-success @else text-primary @endif ">{{ $application->status->name}}  <span class="text-success">{{ $application->cancel_comment}}</span> </p>
            <div class="image">
                <p><strong>Отправленное фото</strong></p>
                <img class="img-fluid" src="{{Storage::url($application->photo)}}" alt="">
            </div>
            <div class="image">
                <p>Полученное фото</p>
                <img class="img-fluid" src="{{Storage::url($application->photo_after)}}" alt="">
            </div>
            <div class="pay">
                <p><strong>Способ оплаты: </strong>{{ $application->payment->name }}</p>
            </div>
            <div class="d-flex flex-column">
                <p><strong>Вид услуги: </strong>{{ $application->service->name }}</p>
                <p><strong>Дата и время: </strong>{{ $application->date}} | {{ $application->time }}</p>
                <p><strong>Телефон: </strong>{{$application->phone}}</p>
                <p><strong>Адрес: </strong>{{$application->address}}</p>
                <p><strong>Комментарий: </strong>{{ $application->comment}}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
