@extends('admin.layouts.app')

@section('title', 'Produtos')


@section('content')
    <h1>Exibindo os produtos</h1>

    <a href="{{ route('produtos.create') }}">Cadastrar</a>

    <hr>

    @component('admin.componentes.card')
        @slot('title')
            <h1>Título Card</h1>
        @endslot
        Um card de de exemplo
    @endcomponent

    <hr>

    @include('admin.includes.alerts', ['content' => 'Alerta de preços de produtos'])

    <hr>

    @isset($produtos)
        <table border="1">
            @foreach ($produtos as $produto)
                <tr>
                    <td class="
                     @if ($loop->first) first @endif
                     @if ($loop->last) last @endif">
                        {{ $produto }}</td>
                </tr>
            @endforeach
        </table>
    @endisset

    <hr>

    <table border="1">
        @forelse ($produtos as $produto)
            <tr>
                <td class="@if ($loop->last) last @endif">{{ $produto }}</td>
            </tr>
        @empty
            <p>Não existem produtos cadastrados
        @endforelse
    </table>


    <div>Valor da variável {!! $texto !!}: {{ $teste }}</div>

    @if ($teste === '123')
        É igual
    @elseif($teste == 123)
        É igual a 123
    @else
        É diferente
    @endif

    @unless($teste === '123')
        <!-- só entra se for falso -->
        É falso
    @endunless

    @isset($teste2)
        {{ $teste2 }}
    @endisset

    <p>
    @empty($teste3)
        Variável $teste3 vazia
    @else
        Variável $teste3 não está vazia
    @endempty
</p>

<p> Usuário:
    @auth
        Autenticado
    @else
        Não autendicado
    @endauth
</p>

<p>
    @guest
        Não autendicado
    @endguest
</p>

@switch($teste)
    @case(123)
        É igual a 123
    @break
    @case(2)
        É diferente de 2
    @break
    @default
        Default
@endswitch

@endsection

@push('styles')
<style>
    .last {
        color: red;
    }

    .first {
        color: lime;
        background-color: black;
    }

</style>
@endpush

@push('scripts')
<script>
    document.body.style.background = '#efefef'
</script>
@endpush
