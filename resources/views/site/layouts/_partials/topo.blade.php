<div class="topo">
    <div class="logo">
        <img src="{{ asset('img/logo.png') }}">
    </div>

    <div class="menu">
        <ul>
            <li @if (Route::currentRouteName() == 'site.index') class="active" @endif><a href="{{ route('site.index') }}">Principal</a></li>
            <li @if (Route::currentRouteName() == 'site.sobrenos') class="active" @endif><a href="{{ route('site.sobrenos') }}">Sobre Nós</a></li>
            <li @if (Route::currentRouteName() == 'site.contato') class="active" @endif><a href="{{ route('site.contato') }}">Contato</a></li>
            <li @if (Route::currentRouteName() == 'site.login') class="active" @endif><a href="{{ route('site.login') }}">Login</a></li>
        </ul>
    </div>
</div>
