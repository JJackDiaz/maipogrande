<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AlertaSolicitud extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Comprobante de solicitud';
    protected $numero_pedido,$direccion,$ciudad;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($numero_pedido,$direccion,$ciudad)
    {
        $this->numero_pedido = $numero_pedido;
        $this->direccion = $direccion;
        $this->ciudad = $ciudad;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('notificacion.solicitud')->with([
            'numero_pedido' => $this->numero_pedido,
            'direccion' => $this->direccion,
            'ciudad' => $this->ciudad
        ]);
    }
}
