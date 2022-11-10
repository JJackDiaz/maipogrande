<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VentaLo extends Model
{
    protected $table = 'VENTA_LO';
    protected $pk = 'ID';

    protected $fillable = [

        'id','numero_venta','detalle', 'comision', 'servicio','iva','total_venta','estado_ex','id_saldo','created_at', 'updated_at'
    ];
}
