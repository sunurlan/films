@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Редактировать запись</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('films.index') }}"> Back</a>
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

    <form action="{{ route('films.update',$film->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        @method('PUT')
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Название:</strong>
                    <input type="text" name="name" value="{{ $film->name }}" class="form-control" >
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <label class="col-md-4 control-label" for="genres"><strong>Жанры:</strong></label>
            <div class="col-md-4">
                <select id="genres" name="genres[]" class="form-control" multiple="multiple">
                @foreach ($genres as $key => $value)
                    <option value="{{ $key }}" {{ ( in_array($key, $film->genres->pluck('id')->toArray()) ) ? 'selected' : '' }}> 
                        {{ $value }} 
                    </option>
                @endforeach 
                </select>         
            </div>    
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Статус:</strong>
                    <select id="genres" name="status" class="form-control">
                @foreach ($statusNames as $key => $value)
                    <option value="{{ $key }}" {{ ( $film->status === $key ) ? 'selected' : '' }}> 
                        {{ $value }} 
                    </option>
                @endforeach 
                </select>  
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
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection