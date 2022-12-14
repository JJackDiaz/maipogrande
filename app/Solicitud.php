<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'SOLICITUD_PRO';
    protected $pk = 'id';

    protected $fillable = [
      'id','direccion','cantidad','producto','estado_id','usuario_id','pais_id','ciudad','created_at','updated_at'
    ];

    public function estado()
    {
        //contiene un id de usuario
        return $this->belongsTo('App\Estado');
    }

    public function proceso_venta()
    {
        //contiene muchos
        return $this->hasMany('App\ProcesoVenta');
    }

    public function pais()
    {
        //contiene muchos
        return $this->belongsTo('App\Pais');
    }
}
