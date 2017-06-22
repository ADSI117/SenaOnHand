<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rol_id')->unsigned();
            $table->integer('estado_id')->unsigned()->nullable();
            $table->integer('grupo_id')->unsigned()->nullable();
            $table->integer('sede_id')->unsigned()->nullable();
            $table->integer('tipo_doc_id')->unsigned()->nullable();
            $table->string('num_doc',15)->nullable()->unique();
            $table->string('nombres',45)->nullable();
            $table->string('apellidos',45)->nullable();
            $table->date('fecha_nac')->nullable();
            $table->string('email',45)->unique();
            $table->string('profesion',45)->nullable();
            $table->text('perfil')->nullable();
            $table->string('url_foto',100)->nullable();
            $table->string('password',60);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('seguido_seguidor', function (Blueprint $table){
          $table->increments('id');
          $table->integer('seguido_id')->unsigned();
          $table->integer('seguidor_id')->unsigned();

          $table->foreign('seguido_id')->references('id')->on('users');
          $table->foreign('seguidor_id')->references('id')->on('users');

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
        Schema::dropIfExists('users');
    }
}
