<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\PostCreated;

class Publicacion extends Model {

    /**
     * Generated
     */

    protected $guarded = [];
    protected $events = [
      'created' => PostCreated::class
    ];

    protected $table = 'tb_publicaciones';
    protected $fillable = ['id', 'usuario_id',
    'subcategoria_id', 'estado_id', 'titulo',
    'contenido', 'puntaje', 'cant_cal', 'num_vistas',
    'url_video', 'url_archivo'];


    public function estado_publicacion() {
        return $this->belongsTo('App\EstadoPublicacion','estado_id', 'id');
    }

    public function subcategoria() {
        return $this->belongsTo('App\Subcategoria','subcategoria_id', 'id');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function users() {
        return $this->belongsToMany('App\User','tb_calificaciones', 'publicacion_id', 'user_id');
    }

    public function calificaciones() {
        return $this->hasMany('App\Calificacion','publicacion_id', 'id');
    }

    public function comentarios() {
        return $this->hasMany('App\Comentario','publicacion_id', 'id');
    }

    public function imagenes() {
        return $this->hasMany('App\Imagen','publicacion_id', 'id');
    }

    public function archivos() {
        return $this->hasMany('App\Archivo','publicacion_id', 'id');
    }

    public function videos() {
        return $this->hasMany('App\Video','publicacion_id', 'id');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag', 'publicacion_tag')->withTimestamps();
    }



}
