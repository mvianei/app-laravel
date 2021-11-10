@extends('admin.layouts.app')

@section('title', 'Produtos')

@section('content')
    <h1>Exibindo os produtos</h1>

    <a class="btn btn-primary" href="{{ route('produtos.create') }}">Cadastrar</a>
    <hr>

    <form action="{{ route('produtos.search') }}" method="POST" class="form form-inline">
        @csrf
        <div class="form-group">
            <input class="form-control" type="text" name="filter" placeholder="Filtrar:" value = '{{ $filters['filter'] ?? ''}}'>
        </div>
        <button type="submit" class="btn btn-info">Pesquisar</button>
    </form>

    <table class="table table-sm table-striped table-bordered">
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
                    <td width="200">
                        <a class="btn-sm btn-primary" href="{{ route('produtos.edit', $produto->id) }}">Editar</a>
                        <a class="btn-sm btn-info" href="{{ route('produtos.show', $produto->id) }}">Detalhes</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if (isset($filters))
        {!! $produtos->appends($filters)->links() !!}
    @else
        {!! $produtos->links() !!}
    @endif

@endsection
