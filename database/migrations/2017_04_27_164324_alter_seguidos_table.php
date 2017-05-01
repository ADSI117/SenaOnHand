<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSeguidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_seguidos', function (Blueprint $table) {
            $table->foreign('usuario_seguidor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('usuario_seguido_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_seguidos', function (Blueprint $table) {
            //
        });
    }
}
