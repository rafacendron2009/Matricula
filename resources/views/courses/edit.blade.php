@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edição de Curso                    
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
                    {!! Form::open(['url' => "/courses/$courses->id", 'method' => 'put']) !!}
                    <div class="form-group row">
                        {{ Form::label('nome', 'Nome:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                        <div class="col-sm-10">
                            {!! Form::open(['url' => '/course', 'method' => 'post']) !!}
                            <div class="form-group row">
                                {{ Form::label('nameCourse', 'Nome do Curso:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                                <div class="col-sm-10">
                                    {{ Form::text('nameCourse', $courses->nameCourse, ['class' => 'form-control form-control-sm', 'required'] ) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('ementa', 'Ementa:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                                <div class="col-sm-10">
                                    {{ Form::text('ementa', $courses->ementa, ['class' => 'form-control form-control-sm', 'required'] ) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('qtnStudents', 'Quantidade Maxima de Alunos:', ['class' => 'col-sm-2 col-form-label col-form-label-sm']) }}
                                <div class="col-sm-10">
                                    {{ Form::text('qtnStudents', $courses->qtnStudents, ['class' => 'form-control form-control-sm', 'required'] ) }}
                                </div>
                            </div>
                            
    
                             <div class="form-group row">
                                <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </div>
    
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
