<div class="form-group">
    <label for="nome">Nome:</label>
    <input type="text" class="form-control" name="nome" value="{{ old('nome') ?? $filial->nome ?? '' }}" @if (($show ?? '') <> '' ) disabled='disabled' @endif />
</div>

<div class="form-row">
    <div class="form-group col-6">
        <label for="endereco">Endereço:</label>
        <input type="text" class="form-control" name="endereco" value="{{ old('endereco') ?? $filial->endereco ?? '' }}" @if (($show ?? '') <> '' ) disabled='disabled' @endif />
    </div>
    <div class="form-group col-6">
        <label for="bairro">Bairro:</label>
        <input type="text" class="form-control" name="bairro" value="{{ old('bairro') ?? $filial->bairro ?? '' }}" @if (($show ?? '') <> '' ) disabled='disabled' @endif />
    </div>
</div>

<div class="form-row">
    <div class="form-group col-6">
        <label for="cidade">Cidade:</label>
        <input type="text" class="form-control" name="cidade" value="{{ old('cidade') ?? $filial->cidade ?? '' }}" @if (($show ?? '') <> '' ) disabled='disabled' @endif />
    </div>
    <div class="form-group col-6">
        <label for="uf">UF:</label>
        <select class="form-control" name="uf" id="uf" @if (($show ?? '') <> '' ) disabled='disabled' @endif >
            <option value="">Selecione uma UF</option>
            @foreach($ufs as $uf)
                <option value="{{ $uf }}" @if ($uf == (old('uf') ?? $filial->uf ?? '')) selected='selected' @endif>{{ $uf }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-6">
        <label for="inscricao_estadual">Inscrição Estadual:</label>
        <input type="text" class="form-control" name="inscricao_estadual" value="{{ old('inscricao_estadual') ?? $filial->inscricao_estadual ?? '' }}" @if (($show ?? '') <> '' ) disabled='disabled' @endif />
    </div>
    <div class="form-group col-6">
        <label for="cnpj">CNPJ:</label>
        <input type="text" class="form-control" name="cnpj" value="{{ old('cnpj') ?? $filial->cnpj ?? '' }}" @if (($show ?? '') <> '' ) disabled='disabled' @endif />
    </div>
</div>

@if(($show ?? '') <> '' )
    <a href="/filial" class="btn btn-primary">Voltar</a>
@else
    <button type="submit" class="btn btn-primary">Salvar</button>
@endif