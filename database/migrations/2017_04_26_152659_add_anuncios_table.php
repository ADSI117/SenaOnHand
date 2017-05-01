<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_anuncios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->string('titulo',45);
            $table->string('contenido',255)->nullable();
            $table->string('url_imagen',100)->nullable();
            $table->dateTime('fecha')->nullable();
            $table->string('lugar',45)->nullable();
            $table->string('telefono',12)->nullable();
            $table->string('email',45)->nullable();
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
        Schema::dropIfExists('tb_anuncios');
    }
}
