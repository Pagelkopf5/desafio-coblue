<?php

use Illuminate\Database\Seeder;

class ContatoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contato')->insert([
            'nome_vendedor' => 'Carlos',
            'nome_contato' =>'John Doe',
            'email' => 'johndoe@gmail.com',
            'telefone' => '(47)12345-6789',
            'data_validade' => '12/06/2019',
        ]);
        DB::table('contato')->insert([
            'nome_vendedor' => 'Gabriel',
            'nome_contato' =>'Joao Doe',
            'email' => 'joaodoe@gmail.com',
            'telefone' => '(47)12345-6789',
            'data_validade' => '13/06/2019',
        ]);
        DB::table('contato')->insert([
            'nome_vendedor' => 'Rodrigo',
            'nome_contato' =>'João Ninguem',
            'email' => 'joaoninguem@gmail.com',
            'telefone' => '(47)12345-6789',
            'data_validade' => '02/05/2019',
        ]);
        DB::table('contato')->insert([
            'nome_vendedor' => 'Gabriel',
            'nome_contato' =>'John Anybody',
            'email' => 'johnanybody@gmail.com',
            'telefone' => '(47)12345-6789',
            'data_validade' => '30/06/2019',
        ]);
        DB::table('contato')->insert([
            'nome_vendedor' => 'Carla',
            'nome_contato' =>'joão Anybody',
            'email' => 'joaoanybody@gmail.com',
            'telefone' => '(47)12345-6789',
            'data_validade' => '12/09/2019',
        ]);
    }
}
