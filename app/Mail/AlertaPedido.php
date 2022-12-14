<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AlertaPedido extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Comprobante de compra';
    protected $numero_pedido,$direccion,$comuna;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($numero_pedido,$direccion,$comuna)
    {
        $this->numero_pedido = $numero_pedido;
        $this->direccion = $direccion;
        $this->comuna = $comuna;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('notificacion.Pedido')->with([
            'numero_pedido' => $this->numero_pedido,
            'direccion' => $this->direccion,
            'comuna' => $this->comuna
        ]);
    }
}
