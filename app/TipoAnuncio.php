<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAnuncio extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_tipo_anuncio';
    protected $fillable = ['id', 'nombre'];


    public function users() {
        return $this->belongsToMany('App\User','tb_anuncios', 'tipo_id','user_id');
    }

    public function anuncios() {
        return $this->hasMany('App\TbAnuncio','tipo_id', 'id');
    }

public function scopeSearch($query,$nombre) {
        return $query->where('nombre','LIKE', "%$nombre%");
    }
}
