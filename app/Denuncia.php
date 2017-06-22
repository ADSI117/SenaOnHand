<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_denuncias';
    protected $fillable = ['id', 'user_id', 'publicacion_id', 'comentario_id', 'tipo_id', 'estado_id', 'comentario'];


    public function comentario() {
        return $this->belongsTo('App\Comentario', 'comentario_id', 'id');
    }

    public function estado_denuncia() {
        return $this->belongsTo('App\EstadoDenuncia','estado_id', 'id');
    }

    public function publicacion() {
        return $this->belongsTo('App\Publicacion','publicacion_id', 'id');
    }

    public function tipo_denuncia() {
        return $this->belongsTo('App\TipoDenuncia','tipo_id', 'id');
    }

    public function user() {
        return $this->belongsTo('App\User','usuario_id', 'id');
    }


}
