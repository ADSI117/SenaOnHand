<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_sedes';
    protected $fillable = ['id', 'centro_id', 'acronimo', 'descripcion'];


    public function Centro() {
        return $this->belongsTo('App\Centro','centro_id', 'id');
    }


}
