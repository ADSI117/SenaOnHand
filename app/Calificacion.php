<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_calificaciones';
    protected $fillable = ['id', 'publicacion_id', 'user_id', 'puntaje'];


    public function publicacion() {
        return $this->belongsTo('App\Publicacion','publicacion_id', 'id');
    }

    public function user() {
        return $this->belongsTo('App\User','user_id', 'id');
    }


}
