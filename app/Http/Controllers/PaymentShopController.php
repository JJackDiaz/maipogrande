<?php

namespace App\Http\Controllers;

use App\Payment;
use App\VentaLo;
use App\ProcesoProducto;
use App\ProcesoVenta;
use App\Pedido;
use Cart;
use Illuminate\Http\Request;
use Omnipay\Omnipay;

class PaymentShopController extends Controller
{
    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->initialize(array(
            'clientId' => 'AZ_wXmzWdmDP54FVe3vSATkzWv0BsODrX-bhIKTi2uWCBmzkQzgBxgeK078P8PlzleE4G909fiTGgKOD',
            'secret'   => 'EHwfWyfvatG9N29PS9O7CspFz0T5gFMxluUak1m7hH8GxeexD8-f6yNjR9Yxn8miyQHYGQ_tXm3OQn4K',
            'testMode' => true, // Or false when you are ready for live transactions
        ));

    }

    public function pay(Request $request)
    {
        try {

            $response = $this->gateway->purchase(array(
                'amount' => (int)$request->amount,
                'currency' => 'USD',
                'returnUrl' => route('success-shop', $request->id),
                'cancelUrl' => route('error-shop')
            ))->send();
            
            if ($response->isRedirect()) {
                $response->redirect();
            }
            else{
                
                return $response->getMessage();
            }

        } catch (\Throwable $th) {
            
            return $th->getMessage();
        }
    }

    public function success(Request $request, $id)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $response = $transaction->send();

            if ($response->isSuccessful()) {

                $arr = $response->getData();

                $payment = new Payment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];
                $payment->venta_lo_id =  $id;

                if ($payment->save()) {
                    
                    $venta = VentaLo::find($id);
                    $venta->estado_lo = 'completed';

                    $pedido = Pedido::where('numero_pedido', $venta->numero_venta)->get();

                    foreach ($pedido as $key => $value) {
                        $value->estado = 'en_ruta';
                        if ($value->save()) {
                            # code...
                            Cart::clear();
                            $venta->save();
                        }
                    }
                    
                }

                //return "Payment is Successfull. Your Transaction Id is : " . $arr['id'];

                return redirect()->route('shop')->with('success', 'Pagado' . $arr['id']);

            }
            else{
                return $response->getMessage();
            }
        }
        else{
            return 'Payment declined!!';
        }
    }

    public function error()
    {
        return 'User declined the payment!';   
    }
}
