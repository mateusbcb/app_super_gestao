<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - @yield('titulo')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">

        {{--  <script src="https://cdn.tailwindcss.com"></script>  --}}
    </head>

    <body>
        @include('app.layouts._partials.topo')
        @component('app.layouts._components.alert')
            
        @endcomponent
        @yield('conteudo')
    </body>
</html>
