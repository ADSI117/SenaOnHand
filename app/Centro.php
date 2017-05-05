<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Centro extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_centros';
    protected $fillable = ['id', 'regional_id', 'acronimo', 'descripcion'];


    public function Regional() {
        return $this->belongsTo('App\Regional', 'regional_id', 'id');
    }

    public function Sedes() {
        return $this->hasMany('App\Sede','centro_id', 'id');
    }


}
