<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" class="form-control" name="name" value="{{ old('name') ?? $user->name ?? '' }}" @if (($show ?? '') <> '' ) disabled='disabled' @endif />
</div>

<div class="form-group">
    <label for="cpf">CPF:</label>
    <input type="number" class="form-control" name="cpf" value="{{ old('cpf') ?? $user->cpf ?? '' }}" @if (($user->cpf ?? '') <> '' ) disabled='disabled' @endif />
</div>

<div class="form-row">
    <div class="form-group col-6">
        <label for="data_nascimento">Data Nascimento:</label>
        @if(($user->data_nascimento ?? '') <> '' )
            <input type="text" class="form-control datepicker" name="data_nascimento" value="{{ old('data_nascimento') ?? date('d/m/Y', strtotime($user->data_nascimento)) ?? '' }}" @if (($show ?? '') <> '' ) disabled='disabled' @endif />
        @else
            <input type="text" class="form-control datepicker" name="data_nascimento" value="{{ old('data_nascimento') ?? $user->data_nascimento ?? '' }}" @if (($show ?? '') <> '' ) disabled='disabled' @endif />
        @endif
    </div>
    <div class="form-group col-6">
        <label for="sexo">Sexo:</label>
        <select class="form-control" name="sexo" @if (($show ?? '') <> '' ) disabled='disabled' @endif>
            <option value=""    @if ((old('sexo') ?? $user->sexo ?? '') === '')  selected='selected' @endif >Selecione o sexo</option>
            <option value="M"   @if ((old('sexo') ?? $user->sexo ?? '') === 'M') selected='selected' @endif >Masculino</option>
            <option value="F"   @if ((old('sexo') ?? $user->sexo ?? '') === 'F') selected='selected' @endif >Feminino</option>
            <option value="O"   @if ((old('sexo') ?? $user->sexo ?? '') === 'O') selected='selected' @endif >Outros</option>
        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-6">
        <label for="endereco">Endereço:</label>
        <input type="text" class="form-control" name="endereco" value="{{ old('endereco') ?? $user->endereco ?? '' }}" @if (($show ?? '') <> '' ) disabled='disabled' @endif />
    </div>
    <div class="form-group col-6">
        <label for="bairro">Bairro:</label>
        <input type="text" class="form-control" name="bairro" value="{{ old('bairro') ?? $user->bairro ?? '' }}" @if (($show ?? '') <> '' ) disabled='disabled' @endif />
    </div>
</div>

<div class="form-row">
    <div class="form-group col-6">
        <label for="cidade">Cidade:</label>
        <input type="text" class="form-control" name="cidade" value="{{ old('cidade') ?? $user->cidade ?? '' }}" @if (($show ?? '') <> '' ) disabled='disabled' @endif />
    </div>
    <div class="form-group col-6">
        <label for="uf">UF:</label>
        <select class="form-control" name="uf" id="uf" @if (($show ?? '') <> '' ) disabled='disabled' @endif >
            <option value="">Selecione uma UF</option>
            @foreach($ufs as $uf)
                <option value="{{ $uf }}" @if ($uf == (old('uf') ?? $user->uf ?? '')) selected='selected' @endif>{{ $uf }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-6">
        <label for="cargo">Cargo:</label>
        <input type="text" class="form-control" name="cargo" value="{{ old('cargo') ?? $user->cargo ?? '' }}" @if (($show ?? '') <> '' ) disabled='disabled' @endif />
    </div>
    <div class="form-group col-6">
        <label for="salario">Salário:</label>
        <input type="number" class="form-control" name="salario" value="{{ old('salario') ?? $user->salario ?? '' }}" @if (($show ?? '') <> '' ) disabled='disabled' @endif />
    </div>
</div>

<div class="form-row">
    <div class="form-group col-6">
        <label for="password">Senha</label>
        <input id="password" type="password" class="form-control" name="password" autocomplete="new-password" @if (($show ?? '') <> '' ) disabled='disabled' @endif />
    </div>
    <div class="form-group col-6">
        <label for="password-confirm">Confirme a Senha</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" @if (($show ?? '') <> '' ) disabled='disabled' @endif />
    </div>
</div>

<div class="form-row">
    <div class="form-group col-6">
        <label for="situacao">Situação:</label>
        <select class="form-control" name="situacao" @if (($show ?? '') <> '' ) disabled='disabled' @endif >
            <option value="1"   @if ((old('situacao') ?? $user->situacao ?? '') === '1') selected='selected' @endif >Ativo</option>
            <option value="0"   @if ((old('situacao') ?? $user->situacao ?? '') === '0') selected='selected' @endif >Inativo</option>
        </select>
    </div>
    <div class="form-group col-6">
        <label for="id_filial">Filial:</label>
        <select class="form-control" name="id_filial" id="id_filial" @if (($show ?? '') <> '' ) disabled='disabled' @endif >
            <option value="">Selecione uma filial</option>
            @foreach($filiais as $filial)
                <option value="{{ $filial->id }}" @if ($filial->id == (old('id_filial') ?? $user->id_filial ?? '')) selected='selected' @endif>{{ $filial->nome }}</option>
            @endforeach
        </select>
    </div>
</div>

@if(($show ?? '') <> '' )
    <a href="/funcionario" class="btn btn-primary">Voltar</a>
@else
    <button type="submit" class="btn btn-primary">Salvar</button>
@endif