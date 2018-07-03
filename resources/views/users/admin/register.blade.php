@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Cadstro de Aluno em Curso                   
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

                    {!! Form::open(['url' => "courses/registration/adminre", 'method' => 'get']) !!}
                        <div class="form-group">
                          <label for="user">Selecione o Aluno</label>
                          <select class="custom-select" size="3" name="user" required>
                            @foreach($users as $u)
                                @if($u->isAdmin!=1)
                                    <option value="{{$u->id}}">{{$u->name}}</option>
                                @endif
                            @endforeach
                          </select>

                          <label for="curso">Selecione o Cursos</label>
                          <select class="custom-select" size="3" name="curso" required>
                            @foreach($courses as $c)
                                <option value="{{$c->id}}">{{$c->nameCourse}}</option>
                            @endforeach
                          </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    {!! Form::close() !!}

                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection