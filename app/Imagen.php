<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{

  protected $table = 'imagenes';
  public function publicacion() {
      return $this->belongsTo('App\Publicacion','publicacion_id', 'id');
  }
}
