<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Automovel extends Model
{
    protected $fillable = [
        'nome',
        'ano',
        'modelo',
        'cor',
        'numero_chassi',
        'categoria',
        'id_filial'
    ];
}
