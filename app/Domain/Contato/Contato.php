<?php

namespace App\Domain\Contato;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $fillable = [
        'nome_vendedor',
        'empresa',
        'nome_contato',
        'email',
        'telefone',
        'data_contato',
        'data_validade'
    ];

    protected $table = 'contato';


    protected $dates = ['data_contato', 'data_validade'];

    public $timestamps = false;
}
