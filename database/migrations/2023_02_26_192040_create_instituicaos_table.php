<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstituicaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituicaos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('id_municipio')->unsigned()->index();
            $table->string('instituicao')->unique();
            $table->string('sigla')->nullable();
            $table->string('endereco');
            $table->bigInteger('telefone')->nullable();
            $table->string('estado')->default('on');
            $table->timestamps();
        });

        Schema::table('instituicaos', function (Blueprint $table) {
            $table->foreign('id_municipio')->references('id')->on('municipios')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instituicaos');
    }
}
