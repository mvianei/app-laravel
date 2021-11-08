@extends('admin.layouts.app')

@section('title', 'Cadastro de produto')

@section('content')
    <h1>Cadastro de produto</h1>

    @include('admin.includes.alerts')

    <form action="{{ route('produtos.store') }}" method="post" enctype="multipart/form-data" class="form">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="nome" placeholder="Nome" value="{{ old('nome') }}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="preco" placeholder="Preço" value="{{ old('preco') }}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="descricao" placeholder="Descrição" value="{{ old('descricao') }}">
        </div>
        <div class="form-group">
            <input type="file" class="form-control" name="photo">
        </div>
        <button class="btn btn-success" type="submit">Enviar</button>
    </form>
@endsection
