<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcesoVenta extends Model
{
    protected $table = 'PROCESO_VEN';
    protected $pk = 'id';

    protected $fillable = [
      'id','estado','solicitud_proceso_id','created_at','updated_at'
    ];

    public function solicitud()
    {
        //contiene un id de usuario
        return $this->belongsTo('App\Solicitud');
    }

    public function proceso_producto()
    {
        //contiene un id de usuario
        return $this->hasMany('App\ProcesoProducto');
    }

}
