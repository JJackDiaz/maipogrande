<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'PAIS';
    protected $pk = 'id';

    protected $fillable = [

        'id','nombre','nombre_corto','created_at','updated_at'

    ];

    public function ciudad()
    {
        return $this->hasMany('App\Ciudad');
    }

    public function solicitud()
    {
        //contiene un id de usuario
        return $this->hasMany('App\Solicitud');
    }
}
