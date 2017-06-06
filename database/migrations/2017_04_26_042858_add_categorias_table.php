<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',45)->unique();
            $table->timestamps();
        });

        Schema::create('usuario_categoria', function (Blueprint $table){
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->integer('categoria_id')->unsigned();

          $table->foreign('usuario_id')->references('id')->on('users');
          $table->foreign('categoria_id')->references('id')->on('tb_categorias');

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
        Schema::dropIfExists('tb_categorias');
    }
}
