@extends('admin.layouts.app')

@section('title', 'Detalhes do produto { $produto->nome }')

@section('content')
    <h1>Produto {{ $produto->nome }} <a href="{{ route('produtos.index') }}"><<</a> </h1>

    <ul>
        <li><strong>Nome: </strong>{{ $produto->nome }}</li>
        <li><strong>Preço: </strong>{{ $produto->preco }}</li>
        <li><strong>Descrição: </strong>{{ $produto->descricao }}</li>
    </ul>
@endsection