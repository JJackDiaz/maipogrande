<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    protected $table = 'TIPO_PRODUCTO';
    protected $pk = 'id';

    protected $fillable = [
      'id','descrip_pro','cantidad','created_at','updated_at'
    ];
}
