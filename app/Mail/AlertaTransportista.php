<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AlertaTransportista extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = 'Felicidades!';
    protected $numero_soli,$direccion,$ciudad,$pais,$nombre,$email,$telefono;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($numero_soli,$direccion,$ciudad,$pais,$nombre,$email,$telefono)
    {
        $this->numero_soli = $numero_soli;
        $this->direccion = $direccion;
        $this->ciudad = $ciudad;
        $this->pais = $pais;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->telefono = $telefono;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('notificacion.transportista')->with([
            'numero_soli' => $this->numero_soli,
            'direccion' => $this->direccion,
            'ciudad' => $this->ciudad,
            'pais' => $this->pais,
            'nombre' => $this->nombre,
            'email' => $this->email,
            'telefono' => $this->telefono
        ]);
    }
}
