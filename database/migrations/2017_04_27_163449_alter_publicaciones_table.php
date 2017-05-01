<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPublicacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_publicaciones', function (Blueprint $table) {
            
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('subcategoria_id')->references('id')->on('tb_subcategorias')->onDelete('cascade');

            $table->foreign('estado_id')->references('id')->on('tb_estados_publicaciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_publicaciones', function (Blueprint $table) {
            //
        });
    }
}
