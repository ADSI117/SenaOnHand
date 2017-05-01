<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('programa_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->string('nombre',45);
            $table->integer('cantidad_est')->default(0);

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
        Schema::dropIfExists('tb_grupos');
    }
}
