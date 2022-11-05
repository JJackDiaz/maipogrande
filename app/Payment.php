<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'PAYMENT';
    protected $pk = 'id';

    protected $fillable = [

        'id','payment_id','payer_id','payer_email','amount','currency','payment_status','venta_ex_id','venta_lo_id','created_at','updated_at'

    ];
}
