@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Pedido - Listar</p>
        </div>
        
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
    
        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->cliente_id }}</td>
                                <td><a href="{{ route('pedido-produto.create', $pedido->id) }}">Adicionar Produtos</a></td>
                                <td><a href="{{ route('pedido.show', $pedido->id) }}">Visualizar</a></td>
                                <td>
                                    <form id="form_{{ $pedido->id }}" action="{{ route('pedido.destroy', $pedido->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="document.getElementById('form_{{ $pedido->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{ route('pedido.edit', $pedido->id) }}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pagination-main">
                    <div class="pagination-info">
                        Exibindo {{ $pedidos->count() }} pedidos de {{ $pedidos->total() }} (de {{ $pedidos->firstItem() }} a {{ $pedidos->lastItem() }})
                    </div>
                    <div class="pagination-itens">
                        {{ $pedidos->appends($request)->links() }}
                    </div>
                </div>
                {{--                  
                <p>{{ $pedidos->count() }} - Total de registros por página</p>
                <p>{{ $pedidos->total() }} - Total de registros da consulta</p>
                <p>{{ $pedidos->firstItem() }} - Número do primeiro registro da página</p>
                <p>{{ $pedidos->lastItem() }} - Número do último registro da página</p>  
                --}}
            </div>
        </div>
    </div>


@endsection