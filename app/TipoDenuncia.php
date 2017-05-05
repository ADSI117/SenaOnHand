<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiposDenuncia extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_tipos_denuncias';
    protected $fillable = ['id', 'descripcion'];


    public function Denuncias() {
        return $this->hasMany('App\Denuncia','tipo_id', 'id');
    }


}
