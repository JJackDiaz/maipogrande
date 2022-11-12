<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubastaLocal extends Model
{
    protected $table = 'SUBASTA_TRANSPORTE_LOCAL';
    protected $pk = 'id';

    protected $fillable = [
      'id','direccion','valor','estado','subasta_trans_id','transporte_id','proceso_producto_id','created_at','updated_at'
    ];
}
