@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Editar Dados Do Usuario                   
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @elseif (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif

                    {!! Form::open(['url' => "/users/$users->id", 'method' => 'put']) !!}
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$users->name}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$users->email}}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="CPF" class="col-md-4 col-form-label text-md-right">{{ __('CPF') }}</label>

                            <div class="col-md-6">
                                <input id="CPF" type="text" class="form-control{{ $errors->has('CPF') ? ' is-invalid' : '' }}" name="CPF" value="{{$users->CPF}}" required autofocus>

                                @if ($errors->has('CPF'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('CPF') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="RG" class="col-md-4 col-form-label text-md-right">{{ __('RG') }}</label>

                            <div class="col-md-6">
                                <input id="RG" type="text" class="form-control{{ $errors->has('RG') ? ' is-invalid' : '' }}" name="RG" value="{{$users->RG}}" required autofocus>

                                @if ($errors->has('RG'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('RG') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" value="{{$users->state}}" required autofocus>

                                @if ($errors->has('state'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Cidade') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{$users->city}}" required autofocus>

                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="street" class="col-md-4 col-form-label text-md-right">{{ __('Rua') }}</label>

                            <div class="col-md-6">
                                <input id="street" type="text" class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" name="street" value="{{$users->street}}" required autofocus>

                                @if ($errors->has('street'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="numberHouse" class="col-md-4 col-form-label text-md-right">{{ __('Numero da Residencia') }}</label>

                            <div class="col-md-6">
                                <input id="numberHouse" type="text" class="form-control{{ $errors->has('numberHouse') ? ' is-invalid' : '' }}" name="numberHouse" value="{{$users->numberHouse}}" required autofocus>

                                @if ($errors->has('numberHouse'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('numberHouse') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="numberTel" class="col-md-4 col-form-label text-md-right">{{ __('Numero De Telefone') }}</label>

                            <div class="col-md-6">
                                <input id="numberTel" type="text" class="form-control{{ $errors->has('numberTel') ? ' is-invalid' : '' }}" name="numberTel" value="{{$users->numberTel}}" required autofocus>

                                @if ($errors->has('numberTel'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('numberTel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Salvar') }}
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
