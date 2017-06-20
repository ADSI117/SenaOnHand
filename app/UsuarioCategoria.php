<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioCategoria extends Model
{
    protected $table = 'usuario_categoria';

    public function usuario() {
            return $this->belongsToMany('App\Categoria', 'usuario_categoria')->withTimestamps();
    }
}
