<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AlertaPVSuccessAdmin extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = 'Información Proceso Venta';
    protected $nombre,$email,$telefono,$nombre_p,$email_p,$producto_p, $cantidad_p;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre,$email,$telefono,$nombre_p,$email_p,$producto_p, $cantidad_p)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->nombre_p = $nombre_p;
        $this->email_p = $email_p;
        $this->producto_p = $producto_p;
        $this->cantidad_p = $cantidad_p;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('notificacion.pvSuccessAdmin')->with([
            'nombre' => $this->nombre,
            'email' => $this->email,
            'telefono' => $this->telefono,
            'nombre_p' => $this->nombre_p,
            'email_p' => $this->email_p,
            'producto_p' => $this->producto_p,
            'cantidad_p' => $this->cantidad_p
        ]);
    }
}
