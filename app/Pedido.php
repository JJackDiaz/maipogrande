<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'PEDIDO';
    protected $pk = 'id';

    protected $fillable = [

        'id','numero_pedido','precio','cantidad','estado','saldo_id','usuario_id','created_at','updated_at'

    ];
}
