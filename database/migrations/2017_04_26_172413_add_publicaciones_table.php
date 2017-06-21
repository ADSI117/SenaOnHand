<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPublicacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_publicaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->integer('subcategoria_id')->unsigned();
            $table->integer('estado_id')->unsigned();
            $table->string('titulo',45);
            $table->text('contenido');
            $table->decimal('puntaje', 3, 1)->default(0.0);
            $table->integer('cant_cal')->default(0);
            $table->integer('num_visitas')->nullable();
            $table->string('url_video',100)->nullable();
            $table->string('url_archivo',100)->nullable();
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
        Schema::dropIfExists('tb_publicaciones');
    }
}
