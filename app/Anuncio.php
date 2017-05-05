
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_anuncios';
    protected $fillable = ['id', 'tipo_id', 'user_id', 'titulo', 'contenido', 'url_imagen', 'fecha', 'lugar', 'telefono', 'email'];


    public function TipoAnuncio() {
        return $this->belongsTo('App\TipoAnuncio','tipo_id', 'id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }


}
