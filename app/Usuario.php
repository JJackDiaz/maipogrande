<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'USUARIO';
    protected $pk = 'id';

    protected $fillable = [
        'nombre','apellido','telefono', 'email', 'password','id_tipo_usuario'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function productor()
    {
        //uno a muchos
        return $this->hasMany('App\Productor');
    }
}