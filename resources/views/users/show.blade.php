@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
        <div class="card-body">



            <div class="container">
                <div class="main-body">
                      <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">
                          <div class="card">
                            <div class="card-body">
                              <div class="d-flex flex-column align-items-center text-center">
                                <img src="/img/man.png" class="rounded-circle" width="150">
                                <div class="mt-3">
                                  <h4>{{ $user->name }}  {{ $user->surname }} </h4>
                                  <a class="btn btn-warning" href="{{ route('users.edit',$user->id) }}">EDYTUJ</a>
                                  <hr>
                                  <a class="btn btn-primary" href="{{ route('users.index') }}">WRÓĆ</a>

                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card mt-3">

                          </div>
                        </div>
                        <div class="col-md-8">
                          <div class="card mb-3">
                            <div class="card-body">
                              <div class="row">
                              </div>
                                <div class="col">
                                    <div class="form-group">
                                        <strong>Imię:</strong>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->name }}
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <strong>Nazwisko:</strong>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->surname }}
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->email }}
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <strong>Numer telefonu:</strong>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->phonenumber }}
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <strong>Adres:</strong>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->address }}
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <strong>Data urodzenia:</strong>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->datebirth }}
                                </div>
                              </div>
                              <hr>
                          </div>
                          </div>
@endsection
