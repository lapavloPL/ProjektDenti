@extends('layouts.app')


@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
@role('Admin')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h4 class="text-center">ZARZĄDZANIE ROLAMI</h4>
            </div>
                <p class="card-text">
                    <a href="{{ route ('roles.create')}}">
                        <h4><button type="button" class="btn btn-primary"><i class="fas fa-plus-square"></i></button> DODAJ ROLĘ</h4>
                    </a>
                </p>
                <table class="table table-stripped">
                    <tr>
     <th>Id</th>
     <th>Nazwa</th>
     <th width="280px">Akcje</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ $role->id }}</td>
        <td>{{ $role->name }}</td>
        <td>
                <a class="btn btn-warning" href="{{ route('roles.edit',$role->id) }}">Edytuj</a>
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Usuń', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}

        </td>
    </tr>
    @endforeach
</table>
@elserole
<div class="card text-center">
    <div class="card-body">
        <div class="card-header">
            <img src="/img/error.png"style="center">
            <h4 class="text-center">DOSTĘP ZABRONIONY!</h4>
        </div>
    </div>
</div>
@endrole

{!! $roles->render() !!}

@endsection
