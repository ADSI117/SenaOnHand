<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDenuncia extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_tipos_denuncias';
    protected $fillable = ['descripcion'];


    public function denuncias() {
        return $this->hasMany('App\Denuncia','tipo_id', 'id');
    }


}
