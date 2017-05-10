<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_subcategorias';
    protected $fillable = ['id', 'categoria_id', 'descripcion'];


    public function Publicaciones() {
        return $this->hasMany('App\Publicacion','subcategoria_id', 'id');
    }


}
