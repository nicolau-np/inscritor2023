<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassificadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classificadors', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('id_instituicao')->unsigned()->index();
            $table->bigInteger('id_ano_lectivo')->unsigned()->index();
            $table->bigInteger('id_classe')->nullable()->unsigned()->index();
            $table->bigInteger('id_curso')->nullable()->unsigned()->index();
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->string('estado');
            $table->timestamps();
        });

        Schema::table('classificadors', function (Blueprint $table) {
            $table->foreign('id_instituicao')->references('id')->on('instituicaos')->onUpdate('cascade');
            $table->foreign('id_ano_lectivo')->references('id')->on('ano_lectivos')->onUpdate('cascade');
            $table->foreign('id_classe')->references('id')->on('classes')->onUpdate('cascade');
            $table->foreign('id_curso')->references('id')->on('cursos')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classificadors');
    }
}
