@extends('admin.layouts.app')

@section('title', 'Cadastro de produto')

@section('content')
<h1>Cadastro de produto</h1>
<form action="{{ route('produtos.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="nome" placeholder="Nome">
    <input type="text" name="descricao" placeholder="Descrição">
    <input type="file" name="photo" >
    <button type="submit">Enviar</button>
</form>
@endsection
