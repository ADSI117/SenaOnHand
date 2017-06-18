<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoComentario extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_estados_comentarios';
    protected $fillable = ['id', 'descripcion'];


    public function scopeSearch($query,$descripcion) {
        return $query->where('descripcion','LIKE', "%$descripcion%");
    }
}
