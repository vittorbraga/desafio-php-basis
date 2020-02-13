<div class="form-group">
    <label for="nome">Nome:</label>
    <input type="text" class="form-control" name="nome" value="{{ old('nome') ?? $automovel->nome ?? '' }}" />
</div>

<div class="form-row">
    <div class="form-group col-2">
        <label for="ano">Ano:</label>
        <input type="number" class="form-control" name="ano" value="{{ old('ano') ?? $automovel->ano ?? '' }}" />
    </div>
    <div class="form-group col-5">
        <label for="modelo">Modelo:</label>
        <input type="text" class="form-control" name="modelo" value="{{ old('modelo') ?? $automovel->modelo ?? '' }}" />
    </div>
    <div class="form-group col-5">
        <label for="cor">Cor:</label>
        <input type="text" class="form-control" name="cor" value="{{ old('cor') ?? $automovel->cor ?? '' }}" />
    </div>
</div>

<div class="form-row">
    <div class="form-group col-6">
        <label for="numero_chassi">Número Chassi:</label>
        <input type="text" class="form-control" name="numero_chassi" value="{{ old('numero_chassi') ?? $automovel->numero_chassi ?? '' }}" />
    </div>
    <div class="form-group col-6">
        <label for="categoria">Categoria:</label>
        <select class="form-control" name="categoria">
            <option value=""                @if ((old('categoria') ?? $automovel->categoria ?? '') === '')                  selected='selected' @endif >Selecione um modelo</option>
            <option value="entrada"         @if ((old('categoria') ?? $automovel->categoria ?? '') === 'entrada')           selected='selected' @endif >Entrada</option>
            <option value="hatch_pequeno"   @if ((old('categoria') ?? $automovel->categoria ?? '') === 'hatch_pequeno')     selected='selected' @endif >Hatch Pequeno</option>
            <option value="hatch_medio"     @if ((old('categoria') ?? $automovel->categoria ?? '') === 'hatch_medio')       selected='selected' @endif >Hatch Médio</option>
            <option value="seda_medio"      @if ((old('categoria') ?? $automovel->categoria ?? '') === 'seda_medio')        selected='selected' @endif >Sedã Médio</option>
            <option value="seda_grande"     @if ((old('categoria') ?? $automovel->categoria ?? '') === 'seda_grande')       selected='selected' @endif >Sedã Grande</option>
            <option value="suv"             @if ((old('categoria') ?? $automovel->categoria ?? '') === 'suv')               selected='selected' @endif >SUV</option>
            <option value="pick_ups"        @if ((old('categoria') ?? $automovel->categoria ?? '') === 'pick_ups')          selected='selected' @endif >Pick-ups</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="id_filial">Filial:</label>
    <select class="form-control" name="id_filial" id="id_filial">
        <option value="">Selecione uma filial</option>
        @foreach($filiais as $filial)
            <option value="{{ $filial->id }}" @if ($filial->id == (old('id_filial') ?? $automovel->id_filial ?? '')) selected='selected' @endif>{{ $filial->nome }}</option>
        @endforeach
    </select>
</div>

<button type="submit" class="btn btn-primary">Salvar</button>