<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_comentarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('publicacion_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->integer('estado_id')->unsigned();            
            $table->string('comentario',255);
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
        Schema::dropIfExists('tb_comentarios');
    }
}

