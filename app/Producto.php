<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'PRODUCTO';
    protected $pk = 'id';

    protected $fillable = [
      'id','codigo','nombre','cantidad','calidad','precio','fecha_cosecha','precio_unitario','id_tipo_pro','usuario_id','created_at','updated_at'
    ];

    public function proceso_producto()
    {
        //contiene un id de usuario
        return $this->hasMany('App\ProcesoProducto');
    }
}
