@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Todos os Cursos
                    @can('admin-only', auth()->user())
                    <a href="/courses/create" class="float-right btn btn-success">Novo Curso</a>
                    @endcan
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
                    @can('admin-only', auth()->user())

                    <table class="table">
                        <tr>    
                            <th>ID</th>
                            <th>Curso</th>
                            <th>Ementa</th>
                            <th>Quantidade de Alunos</th>
                            <th>Ações</th>
                        </tr>

                        @foreach($courses as $c)
                                        <tr>
                                            <td>{{ $c->id }}</td>
                                            <td>{{ $c->nameCourse }}</td>
                                            <td>{{ $c->ementa }}</td>
                                            <td>{{ $c->qtnStudents }}</td>
                                            <td>
                                                <a href="/courses/{{ $c->id }}/edit" class="btn btn-warning">Editar</a>
                                                <a href="/courses/{{ $c->id }}/delete" class="btn btn-danger">Excluir</a>
                                            </td>
                                        </tr>
                        @endforeach
                    </table>

                    @endcan
                    {{ $courses->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
