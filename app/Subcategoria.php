<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_subcategorias';
    protected $fillable = ['id', 'categoria_id', 'descripcion'];

    public function categoria(){
    	return $this->belongsTo('App\Categoria','categoria_id', 'id');
    }


    public function publicaciones() {
        return $this->hasMany('App\Publicacion','subcategoria_id', 'id');
    }

     public function scopeSearch($query,$descripcion) {
            return $query->where('descripcion','LIKE', "%$descripcion%");
        }
}
