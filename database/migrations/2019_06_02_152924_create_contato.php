<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContato extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contato', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome_vendedor');
            $table->string('empresa')->nullable();
            $table->string('nome_contato');
            $table->string('email');
            $table->string('telefone');
            $table->date('data_contato')->nullable();
            $table->date('data_validade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contato');
    }
}
