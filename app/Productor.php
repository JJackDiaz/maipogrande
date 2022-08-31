<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productor extends Model
{
    protected $table = 'PRODUCTOR';
    protected $pk = 'id_productor';

    protected $fillable = [
      'id_gan_ex','usuario_id'
    ];

    public function usuario()
    {
        //contiene un id de usuario
        return $this->belongsTo('App\Usuario');
    }

}
