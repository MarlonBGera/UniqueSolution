<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cpf');
            $table->string('user');
            $table->string('password', 255);
            $table->integer('sexo');
            $table->unsignedBigInteger('contato_id');
            $table->unsignedBigInteger('endereco_id');
            $table->timestamps();
            
            //Relacionamento com Contato
            $table->foreign('contato_id')
                  ->references('id')
                  ->on('contatos')
                  ->onDelete('cascade');
            $table->unique('contato_id');

            //Relacionamento com Endereço
            $table->foreign('endereco_id')
                  ->references('id')
                  ->on('enderecos')
                  ->onDelete('cascade');
            $table->unique('endereco_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
};
