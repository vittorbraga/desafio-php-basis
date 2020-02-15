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
        <h1 class="display-3">Filiais</h1>
    <div>
        <a style="margin: 19px;" href="{{ route('filial.create')}}" class="btn btn-primary">Nova Filial</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Endereço</td>
                <td>CNPJ</td>
                <td>Ações</td>
            </tr>
        </thead>
        <tbody>
            @foreach($filiais as $filial)
            <tr>
                <td>{{$filial->id}}</td>
                <td>{{$filial->nome}}</td>
                <td>{{$filial->endereco}}</td>
                <td>{{$filial->cnpj}}</td>
                <td>
                    <form action="{{ route('filial.destroy', $filial->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('filial.show',$filial->id)}}" class="btn btn-info">Ver</a>
                        <a href="{{ route('filial.edit',$filial->id)}}" class="btn btn-primary">Editar</a>
                        <button class="btn btn-danger" type="submit">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection