@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @elseif (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
                @endif
            <div class="card">
              <center>  <div class="card-header">Dados do usuario</div></center>
                <div class="card-body">
                    <div class="container">
                        <table class="table">
                            <tr>    
                                <td><strong>ID:</strong> {{ $users->id }}</td>
                            </tr>
                            <tr>
                                <td><strong>Nome:</strong> {{ $users->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Email:</strong> {{ $users->email }}</td>
                            </tr>
                            <tr>    
                                <td><strong>RG:</strong> {{ $users->RG }}</td>
                            </tr>
                            <tr>
                                <td><strong>CPF:</strong> {{ $users->CPF }}</td>
                            </tr>
                            <tr>    
                                <td><strong>Numero da Casa:</strong> {{ $users->numberHouse }}</td>
                            </tr>
                            <tr>
                                <td><strong>Numero de Telefone:</strong> {{ $users->numberTel }}</td>
                            </tr>
                            <tr>    
                                <td><strong>Estado:</strong> {{ $users->state }}</td>
                            </tr>
                            <tr>
                                <td><strong>Cidade:</strong> {{ $users->city }}</td>
                            </tr>       
                            <tr>
                                <td><strong>Rua:</strong> {{ $users->street }}</td>
                                <td></td>
                            </tr>
                        </table>
                        <table class="table">
                            <tr>
                                <td><a href="/home/upperfl" class="btn btn-dark">Editar</a>
                                <a href="/users/admin/{{ $users->id }}/delete" class="btn btn-danger">Excluir</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
