<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_programas';
    protected $fillable = ['id', 'acronimo', 'descripcion'];


    public function grupos() {
        return $this->hasMany('App\Grupo','programa_id', 'id');
    }

    public function scopeSearch($query,$descripcion) {
        return $query->where('descripcion','LIKE', "%$descripcion%");
    }


}
