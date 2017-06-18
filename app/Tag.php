<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    /**
     * Generated
     */

    protected $table = 'tb_tags';
    protected $fillable = ['id', 'publicacion_id', 'descripcion'];

<<<<<<< HEAD
    public function publicaciones() {
        return $this->belongsToMany('App\Publicacion')->withTimestamps();
    }

    
=======
	public function publicaciones() {
        return $this->belongsToMany('App\Publicacion')->withTimestamps();
    }

    public function scopeSearch($query,$descripcion) {
        return $query->where('descripcion','LIKE', "%$descripcion%");
    }
>>>>>>> Santiago

}
