<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubastaExterno extends Model
{
    protected $table = 'SUBASTA_TRANSPORTE_EXTERNO';
    protected $pk = 'id';

    protected $fillable = [
      'id','direccion','valor','estado','subasta_trans_id','transporte_id','proceso_producto_id','created_at','updated_at'
    ];

    public function transporte()
    {
        //contiene un id de usuario
        return $this->belongsTo('App\Transporte');
    }
}
