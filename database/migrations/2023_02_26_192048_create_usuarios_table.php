<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('id_instituicao')->nullable()->unsigned()->index();
            $table->bigInteger('id_pessoa')->unsigned()->index();
            $table->string('name')->unique();
            $table->text('password');
            $table->string('nivel_acesso');
            $table->string('estado')->default('on');
            $table->timestamps();
        });

        Schema::table('usuarios', function (Blueprint $table) {
            $table->foreign('id_instituicao')->references('id')->on('instituicaos')->onUpdate('cascade');
            $table->foreign('id_pessoa')->references('id')->on('pessoas')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}