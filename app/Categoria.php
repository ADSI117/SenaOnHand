<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_categorias';
    protected $fillable = ['id', 'nombre', 'descripcion', 'url_imagen'];

    public function subcategoria(){
    	return $this->hasMany('App\Subcategoria');
    }
    public function scopeSearch($query,$descripcion) {
        return $query->where('descripcion','LIKE', "%$descripcion%");
    }
    public function usuarios() {
            return $this->belongsToMany('App\User')->withTimestamps();
        }

}
