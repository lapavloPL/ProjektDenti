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
                <h4 class="text-center">LISTA UŻYTKOWNIKÓW</h4>
            </div>
                <p class="card-text">
                    <a href="{{ route ('users.create')}}">
                        <h4><button type="button" class="btn btn-primary"><i class="fas fa-plus-square"></i></button> DODAJ PACJENTA</h4>
                    </a>
                </p>
                    <table class="table table-stripped">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Imię</th>
                            <th scope="col">Nazwisko</th>
                            <th scope="col">Email</th>
                            <th scope="col">Adres</th>
                            <th scope="col">Numer telefonu</th>
                            <th scope="col">Data urodzenia</th>
                            <th scope="col">Użytkownik</th>
                            <th scope="col" width="280px">Akcje</th>
                        </tr>
                        @foreach ($data as $key => $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->surname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->phonenumber }}</td>
                            <td>{{ $user->datebirth }}</td>

                        <td>
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                            <label>{{ $v }}</label>
                            @endforeach
                        @endif
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ route('users.show',$user->id) }}">Podgląd</a>
                            <a class="btn btn-warning" href="{{ route('users.edit',$user->id) }}">Edytuj</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Usuń', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                        </td>
                        </tr>
                        @endforeach
                    </table>
</div>
</div>
</div>
@elserole('Doctor')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h4 class="text-center">LISTA UŻYTKOWNIKÓW</h4>
            </div>
                <p class="card-text">
                    <a href="{{ route ('users.create')}}">
                        <h4><button type="button" class="btn btn-primary"><i class="fas fa-plus-square"></i></button> DODAJ PACJENTA</h4>
                    </a>
                </p>
                    <table class="table table-stripped">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Imię</th>
                            <th scope="col">Nazwisko</th>
                            <th scope="col">Email</th>
                            <th scope="col">Adres</th>
                            <th scope="col">Numer telefonu</th>
                            <th scope="col">Data urodzenia</th>
                            <th scope="col" width="280px">Akcje</th>
                        </tr>
                        @foreach ($data as $key => $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->surname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->phonenumber }}</td>
                            <td>{{ $user->datebirth }}</td>
                        <td>
                            <a class="btn btn-success" href="{{ route('users.show',$user->id) }}">Podgląd</a>
                            <a class="btn btn-warning" href="{{ route('users.edit',$user->id) }}">Edytuj</a>
                        </td>
                        </tr>
                        @endforeach
                    </table>
</div>
</div>
</div>
@else
<div class="card text-center">
    <div class="card-body">
        <div class="card-header">
            <img src="/img/error.png"style="center">
            <h4 class="text-center">DOSTĘP ZABRONIONY!</h4>
        </div>
    </div>
</div>
@endrole
{!! $data->render() !!}
@endsection
