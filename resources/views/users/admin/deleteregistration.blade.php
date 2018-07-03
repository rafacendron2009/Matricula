@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Todas Matriculas
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
                                    <tr>
                                        <td>{{ $user->name }}</td>     
                                        <td>{{ $course->nameCourse }}</td>
                                        <td>{{ $user->email }}</td> 
                                        <td>
                                            <a href="/courses/registration/{{ $course->id }}/{{ $user->id }}/deleteStudents" class="btn btn-danger">Delete</a>
                                        </td>
                                        
                                    </tr>
                            @endforeach
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
