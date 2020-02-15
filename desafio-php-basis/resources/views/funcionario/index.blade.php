@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
    </div>
    <div class="col-sm-12">
        <h1 class="display-3">Funcionários</h1>
    <div>
        <a style="margin: 19px;" href="{{ route('funcionario.create')}}" class="btn btn-primary">Novo Funcionário</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Endereço</td>
                <td>CPF</td>
                <td colspan = 2>Ações</td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>endereco</td>
                <td>{{$user->cpf}}</td>
                <td>
                    <form action="{{ route('funcionario.destroy', $user->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('funcionario.show',$user->id)}}" class="btn btn-info">Ver</a>
                        <a href="{{ route('funcionario.edit',$user->id)}}" class="btn btn-primary">Editar</a>
                        <button class="btn btn-danger" type="submit">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection