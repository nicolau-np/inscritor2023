<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('id_instituicao')->unsigned()->index();
            $table->string('curso');
            $table->string('sigla')->nullable();
            $table->string('estado')->default('on');
            $table->timestamps();
        });

        Schema::table('cursos', function(Blueprint $table){
            $table->foreign('id_instituicao')->references('id')->on('instituicaos')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
