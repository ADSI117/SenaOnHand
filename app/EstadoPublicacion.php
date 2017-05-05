<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class EstadoPublicacion extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_estados_publicaciones';
    protected $fillable = ['id', 'descripcion'];


    public function Comentarios() {
        return $this->hasMany('App\Comentario','estado_id', 'id');
    }

    public function Publicaciones() {
        return $this->hasMany('App\Publicacion','estado_id', 'id');
    }


}
