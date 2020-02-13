<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{
    protected $fillable = [
        'nome',
        'endereco',
        'bairro',
        'cidade',
        'uf',
        'inscricao_estadual',
        'cnpj'
    ];
}
