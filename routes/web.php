<?php

use App\Domain\Contato\Contato;

Route::get('/', function () {
    $contatos = Contato::orderBy('data_validade', 'desc')->get();
    return view('index', ['contatos' => $contatos]);
})->name('index');

Route::resource('contato', 'ContatoController');
