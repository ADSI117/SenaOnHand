<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{

  public function publicacion() {
      return $this->belongsTo('App\Publicacion','publicacion_id', 'id');
  }
}
