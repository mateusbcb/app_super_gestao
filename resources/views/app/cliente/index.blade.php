@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Cliente - Listar</p>
        </div>
        
        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
    
        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->nome }}</td>
                                <td><a href="{{ route('cliente.show', $cliente->id) }}">Visualizar</a></td>
                                <td>
                                    <form id="form_{{ $cliente->id }}" action="{{ route('cliente.destroy', $cliente->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="document.getElementById('form_{{ $cliente->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{ route('cliente.edit', $cliente->id) }}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pagination-main">
                    <div class="pagination-info">
                        Exibindo {{ $clientes->count() }} clientes de {{ $clientes->total() }} (de {{ $clientes->firstItem() }} a {{ $clientes->lastItem() }})
                    </div>
                    <div class="pagination-itens">
                        {{ $clientes->appends($request)->links() }}
                    </div>
                </div>
                {{--                  
                <p>{{ $clientes->count() }} - Total de registros por página</p>
                <p>{{ $clientes->total() }} - Total de registros da consulta</p>
                <p>{{ $clientes->firstItem() }} - Número do primeiro registro da página</p>
                <p>{{ $clientes->lastItem() }} - Número do último registro da página</p>  
                --}}
            </div>
        </div>
    </div>


@endsection