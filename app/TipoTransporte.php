<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoTransporte extends Model
{
    protected $table = 'TIPO_TRANS';
    protected $pk = 'id';

    protected $fillable = [
      'id','nombre','created_at','updated_at'
    ];
}
