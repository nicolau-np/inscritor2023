<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnoLectivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ano_lectivos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('id_instituicao')->unsigned()->index();
            $table->string('ano');
            $table->string('estado')->default('on');
            $table->timestamps();
        });

        Schema::table('ano_lectivos', function (Blueprint $table) {
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
        Schema::dropIfExists('ano_lectivos');
    }
}