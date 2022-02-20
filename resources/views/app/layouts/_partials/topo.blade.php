<div class="topo">
    <div class="logo">
        <img src="{{ asset('img/logo.png') }}">
    </div>

    <div class="menu">
        
        <ul>
            @php
                $currentRouteName = Route::currentRouteName(); // busca o rota atual ('app.nome.da.rota')
                $currentRouteNameArray = explode('.', $currentRouteName); // cria um array utilizando o separador ponto (['app','nome', 'da', 'rota'])
                $newCurrentRouteNameArray = array_slice($currentRouteNameArray, 0, 2); // pega as duas primeiras ocorrências (['app', 'nome'])
                $newCurrentRouteName = implode('.', $newCurrentRouteNameArray); // junta o array em uma string novamente, usando o ponto como separador ('app.nome')
            @endphp
            <li @if ($newCurrentRouteName == 'app.home') class="active" @endif><a href="{{ route('app.home') }}">Home</a></li>
            <li @if ($newCurrentRouteName == 'cliente.index') class="active" @endif><a href="{{ route('cliente.index') }}">Cliente</a></li>
            <li @if ($newCurrentRouteName == 'pedido.index') class="active" @endif><a href="{{ route('pedido.index') }}">Pedido</a></li>
            <li @if ($newCurrentRouteName == 'app.fornecedor') class="active" @endif><a href="{{ route('app.fornecedor') }}">Fornecedor</a></li>
            <li @if ($newCurrentRouteName == 'produto.index' || $newCurrentRouteName == 'pedido-produto.create') class="active" @endif><a href="{{ route('produto.index') }}">Produto</a></li>
            <li @if ($newCurrentRouteName == 'app.sair') class="active" @endif><a href="{{ route('app.sair') }}">Sair</a></li>
        </ul>
    </div>
</div>
