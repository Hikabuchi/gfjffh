@extends('theme')
@section('title','Галерея')
@section('content')

<section class="container text-center ">
    <div class="row">
        <h1 class="my-4">О нас</h1>
        <p class="lead">
            Добро пожаловать в нашу студию восстановления фотографий! Мы — команда профессионалов, увлеченных искусством восстановления и сохранения воспоминаний. Наша цель — вернуть к жизни ваши драгоценные моменты, которые были утеряны или повреждены со временем.
С момента нашего основания мы работаем с различными типами фотографий: от старинных черно-белых снимков до современных цифровых изображений. Мы понимаем, как важны для вас эти воспоминания, и поэтому подходим к каждому проекту с максимальной тщательностью и вниманием к деталям.
        </p>
    </div>
</section>
<section class="container text-center mb-4">
    <h2 class="my-4">Наши работы</h2>
    <div class="row">
        @foreach($applications as $application)
        <div class="col-md-6 mb-4">
            <div class="card card-req">
                <div class="card-header">
                    <h5 class="card-title">{{$application->service->name}}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <img src="{{Storage::url($application->photo)}}" alt="До" class="img-fluid rounded">
                            <p class="text-muted text-center">До</p>
                        </div>
                        <div class="col-6">
                            <img src="{{Storage::url($application->photo_after)}}" alt="После" class="img-fluid rounded">
                            <p class="text-muted text-center">После</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

@endsection
