<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcesoVenta extends Model
{
    protected $table = 'PROCESO_VEN';
    protected $pk = 'id';

    protected $fillable = [
      'id','fecha','valor','id_solicitud','producto_id','usuario_id','estado_id','created_at','updated_at'
    ];

    public function producto()
    {
      //contiene un id de usuario
      return $this->belongsTo('App\Producto');
    }
}
