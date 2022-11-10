<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'CIUDAD';
    protected $pk = 'id';

    protected $fillable = [

        'id','nombre_ci','id_pais','created_at','updated_at'

    ];

    public function pais()
    {
        return $this->belongsTo('App\Pais');
    }
}
