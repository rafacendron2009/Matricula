@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   Exclusão de Cidade                   
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

                    {!! Form::open(['url' => "/courses/$courses->id", 'method' => 'delete']) !!}
                    <input type="hidden" name="id" value="{{$courses->id}}"/>
                    <div class="alert alert-danger"> Deseja excluir o curso {{$courses->nameCourse}}?
                    </div>
                    <div class="form actions">
                        {{Form::submit('Sim', array('class' => 'btn btn-danger'))}}
                        <a href="/courses" type="btn" class="btn btn-default">Não</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection