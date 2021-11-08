@extends('admin.layouts.app')

@section('title', 'Produtos')

@section('content')
    <h1>Exibindo os produtos</h1>

    <a class="btn btn-primary" href="{{ route('produtos.create') }}">Cadastrar</a>

    <hr>

    <table class="table table-striped table-bordered">
        <thead>
            <th>Nome</th>
            <th>Valor</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td width="200">{{ $produto->preco }}</td>
                    <td width="100"><a href="{{ route('produtos.show', $produto->id) }}">Detalhes</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $produtos->links() !!}

@endsection
