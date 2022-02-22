@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Фильмы</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('films.create') }}"> Создать новую запись</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Название</th>
            <th>Статус</th>
            <th>Жанр</th>
        </tr>
        @foreach ($films as $film)
        <tr>
            <td>{{ $film->name }}</td>
            <td>{{ $film->status ? 'Опубликован' : 'Не опубликован'}}</td>
            <td>{{ $film->genres->implode('name', ', ') }}</td>
            <td>
                 <a class="btn btn-info" href="{{ route('films.show',$film->id) }}">Показать</a>
                    <a class="btn btn-primary" href="{{ route('films.edit',$film->id) }}">Редактировать</a>
                <form action="{{ route('films.destroy',$film->id) }}" method="POST">
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection