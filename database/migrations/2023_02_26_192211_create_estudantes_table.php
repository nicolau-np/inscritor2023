<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudantes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('id_pessoa')->unsigned()->index();
            $table->bigInteger('id_instituicao')->unsigned()->index();
            $table->bigInteger('id_classe')->unsigned()->index();
            $table->bigInteger('id_curso')->unsigned()->index();
            $table->bigInteger('id_ano_lectivo')->unsigned()->index();
            $table->string('estado_classificacao')->nullable();
            $table->string('estado')->default('on');
            $table->timestamps();
        });

        Schema::table('estudantes', function (Blueprint $table) {
            $table->foreign('id_pessoa')->references('id')->on('pessoas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_instituicao')->references('id')->on('instituicaos')->onUpdate('cascade');
            $table->foreign('id_classe')->references('id')->on('classes')->onUpdate('cascade');
            $table->foreign('id_curso')->references('id')->on('cursos')->onUpdate('cascade');
            $table->foreign('id_ano_lectivo')->references('id')->on('ano_lectivos')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudantes');
    }
}