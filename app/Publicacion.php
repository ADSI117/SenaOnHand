<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_publicaciones';
    protected $fillable = ['id', 'user_id', 'subcategoria_id', 'estado_id', 'titulo', 'contenido', 'url_video', 'url_archivo'];


    public function EstadoPublicacion() {
        return $this->belongsTo('App\EstadosPublicacione','estado_id', 'id');
    }

    public function Subcategoria() {
        return $this->belongsTo('App\Subcategoria','subcategoria_id', 'id');
    }

    public function user() {
        return $this->belongsTo('App\User','user_id', 'id');
    }

    public function users() {
        return $this->belongsToMany('App\User','tb_calificaciones', 'publicacion_id', 'user_id');
    }

    public function Calificaciones() {
        return $this->hasMany('App\Calificacion','publicacion_id', 'id');
    }

    public function Comentarios() {
        return $this->hasMany('App\Comentario','publicacion_id', 'id');
    }

    public function Tags() {
        return $this->belongsToMany('App\Tag');
    }



}
