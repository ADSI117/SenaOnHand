<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCentrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_centros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('regional_id')->unsigned();
            $table->string('acronimo',45)->unique();
            $table->string('descripcion',45)->unique();

            //$table->foreign('regional_id')->references('id')->on('tb_regionales')->onDelete('cascade');

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
        Schema::dropIfExists('tb_centros');
    }
}
