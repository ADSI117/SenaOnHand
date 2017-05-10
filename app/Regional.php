<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Regional extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_regionales';
    protected $fillable = ['id', 'descripcion'];


    public function Centros() {
        return $this->hasMany('App\Centro','regional_id', 'id');
    }


}
