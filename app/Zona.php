<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $table = 'ZONA';
    protected $pk = 'ID';

    protected $fillable = [

        'id','nombre','pais_id','created_at', 'updated_at'
    ];
}
