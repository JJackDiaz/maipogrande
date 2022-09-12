<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use App\Productor;
use App\TipoUsuario;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'USUARIO';
    protected $pk = 'id';

    protected $fillable = [

        'id','nombre_completo','telefono', 'email', 'password','id_tipo_usuario'

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

    public function tipo_usuario()
    {
        //contiene un id de usuario
        return $this->belongsTo('App\TipoUsuario','id_tipo_usuario');
    }

    public function contrato()
    {
        //contiene un id de usuario
        return $this->hasMany('App\Contrato');
    }
}