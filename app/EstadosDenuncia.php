<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class EstadoDenuncia extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_estados_denuncias';
    protected $fillable = ['id', 'descripcion'];


    public function Denuncias() {
        return $this->hasMany('App\Denuncia','estado_id', 'id');
    }
    public function scopeSearch($query,$descripcion) {
        return $query->where('descripcion','LIKE', "%$descripcion%");
    }

}
