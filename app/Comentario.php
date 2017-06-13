<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_comentarios';
    protected $fillable = ['id', 'publicacion_id', 'user_id', 'estado_id', 'comentario'];


    public function estado_publicacion() {
        return $this->belongsTo('App\EstadoPublicacion','estado_id', 'id');
    }

    public function publicacion() {
        return $this->belongsTo('App\Publicacion','publicacion_id', 'id');
    }

    public function user() {
        return $this->belongsTo('App\User','usuario_id', 'id');
    }

    public function denuncias() {
        return $this->hasMany('App\Denuncia','comentario_id', 'id');
    }


}
