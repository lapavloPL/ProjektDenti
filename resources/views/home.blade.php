@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Panel użytkownika') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

<div id="uslugi" class="container-fluid text-center">
    <br>
    <div class="row slideanim">
        @role('Admin')
        <div class="col-sm-4">
            <a href="{{ route ('users.index') }}"><img src="img/patients.png"></a>
            <a href="{{ route ('users.index') }}">
            <h4 class="space">UŻYTKOWNICY</h4>
          </a>
            <p>Lista użytkowników</p>
          </div>

          <div class="col-sm-4">
            <a href="{{ route ('roles.index') }}"><img src="img/brainstorm.png"></a>
            <a href="{{ route ('roles.index') }}">
            <h4 class="space">ROLE</h4>
          </a>
            <p>Zarządzaj rolami</p>
          </div>
          @endrole
      <div class="col-sm-4">
        <a href="{{ url('full-calender') }}"><img src="img/timetable.png"></a>
        <a href="{{ url('full-calender') }}">
        <h4 class="space">KALENDARZ</h4>
      </a>
        <p>Sprawdź kalendarz</p>
      </div>
      <div class="col-sm-4">
        <img src="img/contact.png"></a>
        <h4 class="space">KONTAKT</h4>
      </a>
        <p>Skontaktuj się z nami</p>
      </div>
      @role('Doctor')
      <div class="col-sm-4">
        <img src="img/suitcase.png"></a>
        <h4 class="space">WNIOSKI</h4>
        <p>Złóż wniosek o urlop</p>
      </div>
      @endrole
      <div class="col-sm-4">
        <a href="{{ route('logout') }}"><img src="img/logout.png"></a>
        <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
        <h4 class="space"> {{ __('WYLOGUJ') }}</h4>
 </a>
        </a>
        <p>Wyloguj się ze swojego konta</p>
      </div>

    </div>


</div>
</div>
</div>
</div>
</div>
@endsection
