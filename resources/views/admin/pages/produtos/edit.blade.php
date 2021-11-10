@extends('admin.layouts.app')

@section('title', 'Edição de produto {$produto->nome}')

@section('content')
    <h1>Edição de produto {{ $produto->nome }}</h1>

    @include('admin.includes.alerts')

    <form action="{{ route('produtos.update', $produto->id) }}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="nome" placeholder="Nome" value="{{ $produto->nome }}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="preco" placeholder="Preço" value="{{ $produto->preco }}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="descricao" placeholder="Descrição"
                value="{{ $produto->descricao }}">
        </div>
        <div class="form-group">
            <input type="file" class="form-control" name="imagem" value="{{ $produto->imagem }}">
        </div>
        <button class="btn btn-success" type="submit">Enviar</button>
        <a class="btn btn-primary" href="{{ route('produtos.index') }}">Voltar</a>
    </form>
@endsection
