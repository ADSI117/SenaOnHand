<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSedesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sedes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('centro_id')->unsigned();
            $table->string('acronimo',45)->unique();
            $table->string('descripcion',45)->unique();
            $table->timestamps();
            
            //$table->foreign('centro_id')->references('id')->on('tb_centros')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_sedes');
    }
}
