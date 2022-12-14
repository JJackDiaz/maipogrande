<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AlertaPVSuccessProductor extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Información Venta';

    protected $producto_p, $cantidad_p;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($producto_p,$cantidad_p)
    {
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
        return $this->view('notificacion.pvSuccessProductor')->with([
            'producto_p' => $this->producto_p,
            'cantidad_p' => $this->cantidad_p
        ]);
    }
}
