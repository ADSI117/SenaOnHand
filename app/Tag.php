<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_tags';
    protected $fillable = ['id', 'publicacion_id', 'descripcion'];

public function publicaciones() {
        return $this->belongsToMany('App\Publicacion');
    }

}
