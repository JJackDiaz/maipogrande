<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'PAIS';
    protected $pk = 'id';

    protected $fillable = [

        'id','nombre','created_at','updated_at'

    ];

    public function ciudad()
    {
        return $this->hasMany('App\Ciudad');
    }
}
