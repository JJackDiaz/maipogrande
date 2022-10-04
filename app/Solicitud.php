<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'SOLICITUD_PRO';
    protected $pk = 'id';

    protected $fillable = [
      'id','cantidad','producto','estado_id','cliente_id','created_at','updated_at'
    ];
}
