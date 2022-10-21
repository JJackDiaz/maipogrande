<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'ESTADO';
    protected $pk = 'id';

    protected $fillable = [
      'id','estado'
    ];

    public function solicitud()
    {
        //contiene un id de usuario
        return $this->hasMany('App\Solicitud');
    }
}
