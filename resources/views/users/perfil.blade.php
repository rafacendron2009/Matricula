@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Perfil do Usuario
                    <a href="/users" class="float-right btn btn-success">Voltar a lista</a>
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
                    <img src="/uploads/avatars/{{ $users->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">

                    <table class="table">
                        <tr>    
                            <td><strong>ID:</strong> {{ $users->id }}</td>
                            <td><strong>Nome:</strong> {{ $users->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Email:</strong> {{ $users->email }}</td>
                            <td></td>
                        </tr>
                        <tr>    
                            <td><strong>RG:</strong> {{ $users->RG }}</td>
                            <td><strong>CPF:</strong> {{ $users->CPF }}</td>
                        </tr>
                        <tr>    
                            <td><strong>Numero da Casa:</strong> {{ $users->numberHouse }}</td>
                            <td><strong>Numero de Telefone:</strong> {{ $users->numberTel }}</td>
                        </tr>
                        <tr>    
                            <td><strong>Estado:</strong> {{ $users->state }}</td>
                            <td><strong>Cidade:</strong> {{ $users->city }}</td>
                        </tr>       
                        <tr>
                            <td><strong>Rua:</strong> {{ $users->street }}</td>
                            <td></td>
                        </tr>
                    </table>
                    <table class="table">
                        <tr>
                            <td><a href="/users/admin/{{ $users->id }}/edit" class="btn btn-warning">Editar</a></td>
                            <td><a href="/users/admin/{{ $users->id }}/delete" class="btn btn-danger">Excluir</a></td>
                            @if($users->isAdmin ==0)
                            <td><a href="/users/admin/{{ $users->id }}/updateAdmin" class="btn btn-success">Tornar Admin</a></td>
                            @else
                            <td><a href="/users/admin/{{ $users->id }}/updateAdmin" class="btn btn-danger">Tornar User</a></td>
                            @endif
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection