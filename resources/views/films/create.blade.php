@extends('layout.app')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Добавить новый фильм</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('films.index') }}"> Назад</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('films.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Название:</strong>
                <input type="text" name="name" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
            <label class="col-md-4 control-label" for="genres"><strong>Жанры:</strong></label>
            <div class="col-md-4">
                <select id="genres" name="genres[]" class="form-control" multiple="multiple">
                @foreach ($genres as $key => $value)
                    <option value="{{ $key }}"> 
                        {{ $value }} 
                    </option>
                @endforeach 
                </select>
                
            </div>
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Постер:</strong>
                <input type="file" name="poster" class="form-control">     
            </div>
        </div>
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Добавить</button>
        </div>
    </div>
</form>
@endsection