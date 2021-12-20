@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h4 class="text-center">UTWÓRZ</h4>
            </div>


            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong> Wystąpiły jakieś problemy...</strong><br><br>
                <ul>
                   @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                   @endforeach
                </ul>
              </div>
            @endif


{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nazwa:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Nazwa','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Pozwolenie:</strong>
            <br/>
            @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-warning">ZAPISZ</button>
        <div class="space"></div>
        <p class="card-text">
            <a class="btn btn-primary" href="{{ route('roles.index') }}">WRÓĆ</a>
        </p>
    </div>
</div>
{!! Form::close() !!}

@endsection
