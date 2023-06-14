<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncerramentoActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encerramento_actividades', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('id_instituicao')->unsigned()->index();
            $table->bigInteger('id_ano_lectivo')->unsigned()->index();
            $table->text('observacao')->nullable();
            $table->string('estado');
            $table->timestamps();
        });

        Schema::table('encerramento_actividades', function (Blueprint $table) {
            $table->foreign('id_instituicao')->references('id')->on('instituicaos')->onUpdate('cascade');
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
        Schema::dropIfExists('encerramento_actividades');
    }
}
