<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcesoVenta extends Model
{
    protected $table = 'PROCESO_VEN';
    protected $pk = 'id';

    protected $fillable = [
      'id','estado','solicitud_proceso_id','valor','created_at','updated_at'
    ];
    
    public function proceso_producto()
    {
        //contiene un id de usuario
        return $this->hasOne('App\ProcesoProducto');
    }
    
    public function solicitud()
    {
        //contiene un id de usuario
        return $this->belongsTo('App\Solicitud');
    }



}
