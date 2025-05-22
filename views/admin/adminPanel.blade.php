@extends('theme')
@section('title','Панель администратора')
@section('content')
<section class="p-5" id="content">
  @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Исходное фото</th>
              <th scope="col">Результат</th>
              <th scope="col">ФИО</th>
              <th scope="col">Контактные данные</th>
              <th scope="col">Дата и время</th>
              <th scope="col">Услуга</th>
              <th scope="col">Тип оплаты</th>
              <th scope="col">Пожелания</th>
              <th scope="col">Статус</th>
            </tr>
          </thead>
          <tbody>
            @foreach($applications as $application)
            <tr>
              <td>{{$application->id}}</td>
              <td><img class="img-fluid" src="{{Storage::url($application->photo)}}" alt="before"></td>
              <td><img class="img-fluid" src="{{Storage::url($application->photo_after)}}" alt="after"></td>
              <td>{{$application->user->name}}</td>
              <td>
                <p><strong>Адрес: </strong>{{$application->address}}</p>
                <p><strong>Электронная почта: </strong>{{$application->user->email}}</p>
                <p><strong>Телефон: </strong> {{$application->phone}}</p>
              </td>
              <td><p>{{$application->date}} |
                {{$application->time}}</p></td>
              <td>{{$application->service->name}}</td>
              <td>{{$application->payment->name}}</td>
              <td>{{$application->comment}}</td>
              <td>
                <form action="/application/{{$application->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <select name="status" id="status-{{$application->id}}" class="form-select status-select" required>
                        @foreach($statuses as $status)
                        <option value="{{$status->id}}" @if(intval($application->status->id) == intval($status->id)) selected @endif>{{$status->name}}</option>
                        @endforeach
                    </select>
                    <div class="photo_after" id="photo-upload-{{$application->id}}" style="display: none;">
                        <label for="photo-{{$application->id}}">Загрузить фотографию:</label>
                        <input type="file" id="photo-{{$application->id}}" name="photo_after">
                    </div>
                    <div class="comment" id="comment-{{$application->id}}" style="display: none;">
                        <textarea name="comment" id="comment" cols="20" rows="6" placeholder="Причина отмены"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Отправить</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        
        {{ $applications->links() }}
      </div>
</section>

@endsection
