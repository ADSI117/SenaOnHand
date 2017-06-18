<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_tags', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('publicacion_id')->unsigned();
            $table->string('descripcion',45);
            $table->timestamps();
        });

        Schema::create('publicacion_tag', function (Blueprint $table){
          $table->increments('id');
          $table->integer('publicacion_id')->unsigned();
          $table->integer('tag_id')->unsigned();

          $table->foreign('publicacion_id')->references('id')->on('tb_publicaciones');
          $table->foreign('tag_id')->references('id')->on('tb_tags');

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
        Schema::dropIfExists('tb_tags');
    }
}
