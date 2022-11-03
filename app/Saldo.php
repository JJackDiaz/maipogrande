<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    protected $table = 'SALDO';
    protected $pk = 'id';

    protected $fillable = [
      'id','estado','cantidad','descripcion','precio','id_producto','created_at','updated_at'
    ];

    public function producto()
    {
        //contiene un id de usuario
        return $this->belongsTo('App\Producto');
    }
}
