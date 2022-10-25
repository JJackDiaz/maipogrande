<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcesoProducto extends Model
{
    protected $table = 'PROCESO_PRODUCTO';
    protected $pk = 'id';

    protected $fillable = [
      'id','estado','producto_id','proceso_ven_id','created_at','updated_at'
    ];

    public function proceso_venta()
    {
        //contiene un id de usuario
        return $this->belongsTo('App\ProcesoVenta');
    }

    public function producto()
    {
        //contiene un id de usuario
        return $this->belongsTo('App\Producto');
    }
}
