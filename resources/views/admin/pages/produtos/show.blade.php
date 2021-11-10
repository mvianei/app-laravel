@extends('admin.layouts.app')

@section('title', 'Detalhes do produto { $produto->nome }')

@section('content')
    <h1>Produto {{ $produto->nome }} <a href="{{ route('produtos.index') }}"><<</a></h1>

    @include('admin.includes.alerts')

    <ul>
        <li><strong>Nome: </strong>{{ $produto->nome }}</li>
        <li><strong>Preço: </strong>{{ $produto->preco }}</li>
        <li><strong>Descrição: </strong>{{ $produto->descricao }}</li>
    </ul>

    <form action="{{ route('produtos.destroy', $produto->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Excluir</button>
        <a class="btn btn-info" href="{{ route('produtos.show','') }}">Voltar</a>
    </form>

@endsection
