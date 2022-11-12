<?php

namespace App\Http\Controllers;

use App\Payment;
use App\VentaLo;
use App\ProcesoProducto;
use App\ProcesoVenta;
use Cart;
use Illuminate\Http\Request;
use Omnipay\Omnipay;

class PaymentShopController extends Controller
{
    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function pay_shop(Request $request)
    {
        try {

            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success-shop', $request->id),
                'cancelUrl' => url('error-shop')
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

    public function success_shop(Request $request, $id)
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
                    Cart::clear();
                    $venta->save();
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

    public function error_shop()
    {
        return 'User declined the payment!';   
    }
}
