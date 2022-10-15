<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCliente extends Model
{
    protected $table = 'DETALLE_CLIENTE';
    protected $pk = 'id';

    protected $fillable = [

        'id','nombre_empresa','direccion', 'ciudad_id', 'usuario_id','created_at','updated_at'

    ];

    public function ciudad()
    {
        return $this->belongsTo('App\Ciudad');
    }
}
