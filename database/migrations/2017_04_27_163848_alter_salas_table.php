<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_salas', function (Blueprint $table) {
            
            $table->foreign('usuario_creador_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('usuario_amigo_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('grupo_id')->references('id')->on('tb_grupos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_salas', function (Blueprint $table) {
            //
        });
    }
}
