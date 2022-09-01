<?php

namespace App;


use App\Usuario;
//use Illuminate\Database\Eloquent\Model;

use Yajra\Oci8\Eloquent\OracleEloquent as Model;

class TipoUsuario extends Model
{
    protected $table = 'TIPO_USUARIO';
    protected $pk = 'id';

    protected $fillable = [
        'id','nombre'
    ];

    public function usuario()
    {
        //contiene un id de usuario
        return $this->belongsToMany('App\Usuario')->withTimesTamps();
    }
}
