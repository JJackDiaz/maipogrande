<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VentaEx extends Model
{
    protected $table = 'VENTA_EX';
    protected $pk = 'ID';

    protected $fillable = [

        'id','numero_venta','detalle', 'comision', 'servicio','aduana','total_venta','estado_ex','proceso_producto_id','created_at', 'updated_at'
    ];

    public function proceso_producto()
    {
        //contiene un id de usuario
        return $this->belongsTo('App\ProcesoProducto');
    }
}
