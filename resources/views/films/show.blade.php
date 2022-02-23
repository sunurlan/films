@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Информация о фильме</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('films.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Название:</strong>
                {{ $film->name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Жанр:</strong>
                {{ $film->genres->implode('name', ', ') }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Статус:</strong>
                {{ $film->getStatusName() }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Постер:</strong>
                <img src="{{ $film->poster_link }}" alt="" style="max-width: 300px; display:block">
            </div>
        </div>

    </div>
@endsection