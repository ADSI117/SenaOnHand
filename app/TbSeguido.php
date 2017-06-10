<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbSeguido extends Model
{
    protected $table = 'tb_seguidos';
    protected $fillable = ['usuario_seguidor_id', 'usuario_seguido_id', 'estado_id'];

    public function seguidor() {
        // return $this->belongsToMany('App\User')->withTimestamps();
        return $this->belongsTo('App\User', 'usuario_seguidor_id', 'id');
    }

    public function seguido() {
        // return $this->belongsToMany('App\User')->withTimestamps();
        return $this->belongsTo('App\User', 'usuario_seguido_id', 'id');
    }
}
