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
        <h1 class="display-3">Automóveis</h1>
    <div>
        <a style="margin: 19px;" href="{{ route('automovel.create')}}" class="btn btn-primary">Novo Automóvel</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Ano</td>
                <td>Modelo</td>
                <td colspan = 2>Ações</td>
            </tr>
        </thead>
        <tbody>
            @foreach($automoveis as $automovel)
            <tr>
                <td>{{$automovel->id}}</td>
                <td>{{$automovel->nome}}</td>
                <td>{{$automovel->ano}}</td>
                <td>{{$automovel->modelo}}</td>
                <td><a href="{{ route('automovel.edit',$automovel->id)}}" class="btn btn-primary">Editar</a></td>
                <td>
                    <form action="{{ route('automovel.destroy', $automovel->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection