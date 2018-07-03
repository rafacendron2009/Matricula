@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Autorização de Alunos
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

                    <table class="table">
                        <tr>    
                            <th>Nome</th>
                            <th>Curso</th>
                            <th>Email</th>
                            <th>Ações</th>
                        </tr>
                        <tr> 
                        @foreach($users as $user)                     
                            @foreach($user->courses as $course)
                                @if ($course->pivot->authorized == 0)
                                    <tr>
                                        <td>{{ $user->name }}</td>     
                                        <td>{{ $course->nameCourse }}</td>
                                        <td>{{ $user->email }}</td> 
                                        <td>
                                            <a href="{{ $course->id }}/{{ $user->id }}/authtorizeStudent" class="btn btn-success">Authorize</a>
                                            <a href="{{ $course->id }}/{{ $user->id }}/deleteStudents" class="btn btn-success">Delete</a>
                                        </td>
                                        
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
