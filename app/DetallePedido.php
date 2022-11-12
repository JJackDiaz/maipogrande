<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table = 'DETALLE_PEDIDO';
    protected $pk = 'id';

    protected $fillable = [

        'id','numero_pedido','estado','direccion','comuna','numero', 'telefono', 'email','usuario_id','created_at','updated_at'

    ];
}
