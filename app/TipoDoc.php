<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDoc extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_tipo_doc';
    protected $fillable = ['id', 'nombre'];

    public function scopeSearch($query,$nombre) {
        return $query->where('nombre','LIKE', "%$nombre%");
    }

    public function usuarios() {
        return $this->hasMany('App\User');
    }

}
