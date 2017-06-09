<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSeguidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_seguidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_seguidor_id')->unsigned();
            $table->integer('usuario_seguido_id')->unsigned();
            $table->integer('estado_id');
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
        Schema::dropIfExists('tb_seguidos');
    }
}
