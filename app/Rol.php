<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_roles';
    protected $fillable = ['id', 'descripcion'];

    public function scopeSearch($query,$descripcion) {
        return $query->where('descripcion','LIKE', "%$descripcion%");
    }

    public function usuarios() {
        return $this->hasMany('App\User','rol_id','id');
    }

}
