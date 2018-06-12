<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 10/06/18
 * Time: 10:06
 */

namespace AdminWeb\PayerPagSeguro\Http;


use AdminWeb\Payer\EnvInterface;
use AdminWeb\PayerPagSeguro\Payment\Transaction;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WebHookController extends Controller
{
    public function handle(Request $request)
    {
        $env = app()->make(EnvInterface::class);
        $transaction = new Transaction($env);
        $response =$transaction->getTransaction($request->notificationCode);
        $status = $response->status;
    }
}