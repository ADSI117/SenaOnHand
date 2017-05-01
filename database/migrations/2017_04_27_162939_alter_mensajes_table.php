<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_mensajes', function (Blueprint $table) {
            
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('sala_id')->references('id')->on('tb_salas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_mensajes', function (Blueprint $table) {
            //
        });
    }
}
