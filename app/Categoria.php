<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_categorias';
    protected $fillable = ['id', 'descripcion'];

public function subcategoria(){
    	return $this->hasMany('App\Subcategoria');
    }
public function scopeSearch($query,$descripcion) {
        return $query->where('descripcion','LIKE', "%$descripcion%");
    }

}
