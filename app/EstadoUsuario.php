<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class EstadoUsuario extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_estados_usuarios';
    protected $fillable = ['id', 'descripcion'];

    public function scopeSearch($query,$descripcion) {
        return $query->where('descripcion','LIKE', "%$descripcion%");
    }

    public function usuarios() {
        return $this->hasMany('App\User');
    }

}
