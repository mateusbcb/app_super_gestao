@if (isset($cliente->id))
    <form action="{{ route('cliente.update', $cliente->id) }}" method="post">
        @method('PUT')
@else
        <form action="{{ route('cliente.store') }}" method="post">
@endif
    @csrf
    
    <input type="text" name="nome" placeholder="Nome" value="{{ $cliente->nome ?? old('nome') }}" class="{{ $errors->has('nome') ? 'borda-vermelha' : 'borda-preta'}}">
    @error('nome')
        <p style="color: #ff7474;">
            {{ $message }}
        </p>
    @enderror

    <button type="submit" class="borda-preta">
        @if (isset($cliente->id))
            Salvar
        @else
            Cadastrar
        @endif
    </button>
</form>