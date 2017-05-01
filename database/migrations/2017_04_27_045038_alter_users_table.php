<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
        $table->foreign('rol_id')->references('id')->on('tb_roles')->onDelete('cascade');
        $table->foreign('estado_id')->references('id')->on('tb_estados_usuarios')->onDelete('cascade');
        $table->foreign('grupo_id')->references('id')->on('tb_grupos')->onDelete('cascade');
        $table->foreign('sede_id')->references('id')->on('tb_sedes')->onDelete('cascade');
        $table->foreign('tipo_doc_id')->references('id')->on('tb_tipo_doc')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
