{{ $slot }}

<form action={{ route('site.contato') }} method="post">
    @csrf
    <input name="nome" type="text" placeholder="Nome" value="{{ old('nome') }}" class="{{ $class }}" style="@error('nome') border-color: #ff7474; @enderror">
    @error('nome')
        <p style="color: #ff7474">{{ $message }}</p>
    @enderror
    <br>
    <input name="telefone" type="text" placeholder="Telefone" value="{{ old('telefone') }}" class="{{ $class }}" style="@error('telefone') border-color: #ff7474; @enderror">
    @error('telefone')
        <p style="color: #ff7474">{{ $message }}</p>
    @enderror
    <br>
    <input name="email" type="text" placeholder="E-mail" value="{{ old('email') }}" class="{{ $class }}" style="@error('email') border-color: #ff7474; @enderror">
    @error('email')
        <p style="color: #ff7474">{{ $message }}</p>
    @enderror
    <br>
    <select name="motivo_contatos_id" class="{{ $class }}" style="@error('motivo_contatos_id') border-color: #ff7474; @enderror">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key => $motivo_contato)
            <option value="{{ $motivo_contato->id }}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}>{{ $motivo_contato->motivo_contato }}</option>
        @endforeach
    </select>
    @error('motivo_contatos_id')
        <p style="color: #ff7474">{{ $message }}</p>
    @enderror
    <br>
    <textarea name="mensagem" class="{{ $class }}" style="@error('mensagem') border-color: #ff7474; @enderror">{{ old('mensagem') != '' ? old('mensagem') : 'Preencha aqui a sua mensagem' }}</textarea>
    @error('mensagem')
        <p style="color: #ff7474">{{ $message }}</p>
    @enderror
    <br>
    <button type="submit" class="{{ $class }}">ENVIAR</button>
</form>