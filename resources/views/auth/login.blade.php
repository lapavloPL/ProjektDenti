@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">


                <div class="card-body cardbody-color p-lg-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="text-center">
                            <img src="img/logodenti.png" class="logodenti"
                            width="200px" alt="profile">
                        </div>


                        <div class="mb-3">

                            <div class="col-md-6 offset-md-3">
                                <input id="email" aria-describedby="name" placeholder="E-mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">

                            <div class="col-md-6 offset-md-3">
                                <input id="password" placeholder="Hasło" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="col-md-6 offset-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Zapamiętaj') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-color px-5 mb-5 w-100">
                                    {{ __('Zaloguj') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="text-dark fw-bold" href="{{ route('password.request') }}">
                                        {{ __('Nie pamiętasz hasła?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
