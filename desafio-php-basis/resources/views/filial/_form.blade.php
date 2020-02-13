<div class="form-group">
    <label for="nome">Nome:</label>
    <input type="text" class="form-control" name="nome" value="{{ old('nome') ?? $filial->nome ?? '' }}" />
</div>

<div class="form-row">
    <div class="form-group col-6">
        <label for="endereco">Endereço:</label>
        <input type="text" class="form-control" name="endereco" value="{{ old('endereco') ?? $filial->endereco ?? '' }}" />
    </div>
    <div class="form-group col-6">
        <label for="bairro">Bairro:</label>
        <input type="text" class="form-control" name="bairro" value="{{ old('bairro') ?? $filial->bairro ?? '' }}" />
    </div>
</div>

<div class="form-row">
    <div class="form-group col-6">
        <label for="cidade">Cidade:</label>
        <input type="text" class="form-control" name="cidade" value="{{ old('cidade') ?? $filial->cidade ?? '' }}" />
    </div>
    <div class="form-group col-6">
        <label for="uf">Estado:</label>
        <input type="text" class="form-control" name="uf" value="{{ old('uf') ?? $filial->uf ?? '' }}" />
    </div>
</div>

<div class="form-row">
    <div class="form-group col-6">
        <label for="inscricao_estadual">Inscrição Estadual:</label>
        <input type="text" class="form-control" name="inscricao_estadual" value="{{ old('inscricao_estadual') ?? $filial->inscricao_estadual ?? '' }}" />
    </div>
    <div class="form-group col-6">
        <label for="cnpj">CNPJ:</label>
        <input type="text" class="form-control" name="cnpj" value="{{ old('cnpj') ?? $filial->cnpj ?? '' }}" />
    </div>
</div>

<button type="submit" class="btn btn-primary">Salvar</button>