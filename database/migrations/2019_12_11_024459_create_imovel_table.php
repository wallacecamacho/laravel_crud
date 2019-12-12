<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImovelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imovel', function (Blueprint $table) {
            	$table->bigIncrements('id');
		$table->string('logradouro', 300);
		$table->string('bairro', 300);
		$table->string('municipio', 300);
		$table->string('estado', 300);
		$table->string('cep', 9);
		$table->string('tipo_imovel', 50);
		$table->string('nome_proprietario', 300);
		$table->string('cpf', 11);

            	$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imovel');
    }
}
