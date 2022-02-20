@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produto - Editar Detalhes</p>
        </div>
        
        <div class="menu">
            <ul>
                <li><a href="#">Voltar</a></li>
            </ul>
        </div>
    
        <div class="informacao-pagina">

            <div style="text-align: left; width: 30%; margin-left: auto; margin-right: auto;">
                <h3>Produto</h3>
                <div>
                    <table>
                        <tr>
                            <th>Nome</th>
                            <td>{{ $produto_detalhe->item->nome }}</td>
                        </tr>
                        <tr>
                            <th>Descrição</th>
                            <td>{{ $produto_detalhe->item->descricao }}</td>
                        </tr>
                    </table>
                    <br>
                </div>
            </div>

            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.produto_detalhe._components.form_create_edit', [
                    'produto_detalhe' => $produto_detalhe,
                    'unidades' => $unidades,
                ])
                    
                @endcomponent
            </div>
        </div>
    </div>


@endsection