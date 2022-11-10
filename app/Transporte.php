<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    protected $table = 'TRANSPORTE';
    protected $pk = 'id';

    protected $fillable = [
        'id','descripcion','capacidad_kg','capacidad_vol','mts_2','id_tipo_trans','usuario_id','created_at','updated_at'
    ];
}
