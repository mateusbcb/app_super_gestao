@extends('app.layouts.basico')

@section('titulo', 'Pedido Produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Pedido Produto - Adicionar</p>
        </div>
        
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
    
        <div class="informacao-pagina">
            <h4>Detalhes do pedido</h4>
            <p>ID do pedido: {{ $pedido->id }}</p>
            <p>Cliente: {{ $pedido->cliente_id }}</p>

            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <h4>Itens do Pedido</h4>
                @if(count($pedido->produtos) > 0)
                    <table border="1" style="width: 100%;">
                        <thead>
                            <th>ID</th>
                            <th>Nome do Produto</th>
                            <th>data de inclusão do item no pedidp</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($pedido->produtos as $produto)
                                <tr>
                                    <td>{{ $produto->id }}</td>
                                    <td>{{ $produto->nome }}</td>
                                    <td>{{ $produto->pivot->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <form action="{{ route('pedido-produto.destroy', ['pedidoProduto' => $produto->pivot->id]) }}" id="form_{{ $produto->pivot->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <a href="#" onclick="document.getElementById('form_{{ $produto->pivot->id }}').submit()">Exckuir</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Esse pedido não possui nenhum produto!</p>
                @endif
                @component('app.pedido_produto._components.form_create', [
                    'pedido' => $pedido,
                    'produtos' => $produtos,
                ])
                    
                @endcomponent
            </div>
        </div>
    </div>
    <script>
        documente.getElementById();
    </script>

@endsection