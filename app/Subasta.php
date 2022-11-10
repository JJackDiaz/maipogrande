<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subasta extends Model
{
    protected $table = 'SUBASTA_TRANS';
    protected $pk = 'id';

    protected $fillable = [
      'id','direccion','fecha_inicio','fecha_fin','tipo','estado','proceso_producto_id','created_at','updated_at'
    ];
}
