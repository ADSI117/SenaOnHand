<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email', 'password','rol_id','estado_id','grupo_id','sede_id','tipo_doc_id','num_doc','nombres','apellidos','fecha_nac','profesion','url_foto'
    ];

    public function Rol() {
        return $this->belongsTo('App\Rol','rol_id', 'id');
    }
    public function EstadoUsuario() {
        return $this->belongsTo('App\EstadoUsuario','estado_id', 'id');
    }
    public function Grupo() {
        return $this->belongsTo('App\Grupo','grupo_id', 'id');
    }
    public function Sede() {
        return $this->belongsTo('App\Sede','sede_id', 'id');
    }
    public function TipoDoc() {
        return $this->belongsTo('App\TipoDoc','tipo_doc_id', 'id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Seguido() {
        return $this->belongsToMany('App\User');
    }
    public function Seguidor() {
        return $this->belongsToMany('App\User');
    }
}
