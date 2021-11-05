@extends('admin.layouts.app')

@section('title', 'Edição de produto')

@section('content')
<h1>Edição de produto {{ $id }}</h1>
<form action="{{ route('produtos.update', $id) }}" method="post">
    @method('PUT')
    @csrf
    <input type="text" name="nome" placeholder="Nome">
    <input type="text" name="descricao" placeholder="Descrição">
    <button type="submit">Enviar</button>
</form>
@endsection
