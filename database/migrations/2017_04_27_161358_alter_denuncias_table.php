<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDenunciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_denuncias', function (Blueprint $table) {
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('publicacion_id')->references('id')->on('tb_publicaciones')->onDelete('cascade');
            $table->foreign('comentario_id')->references('id')->on('tb_comentarios')->onDelete('cascade');
            $table->foreign('tipo_id')->references('id')->on('tb_tipos_denuncias')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('tb_estados_denuncias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_denuncias', function (Blueprint $table) {
            //
        });
    }
}
