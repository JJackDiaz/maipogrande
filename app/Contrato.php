<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = 'CONTRATO';
    protected $pk = 'id';

    protected $fillable = [

        'id','fecha_firma','fecha_termino', 'porc_comision', 'usuario_id','created_at','updated_at'

    ];

    public function usuario()
    {
        //contiene un id de usuario
        return $this->belongsTo('App\Usuario');
    }
}
