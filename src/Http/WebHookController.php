<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 10/06/18
 * Time: 10:06
 */

namespace AdminWeb\PayerPagSeguro\Http;


use AdminWeb\Payer\EnvInterface;
use AdminWeb\Payer\Subscription;
use AdminWeb\PayerPagSeguro\Payment\Transaction;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WebHookController extends Controller
{
    public function handle(Request $request)
    {
        $env = app()->make(EnvInterface::class);
        $t = new Transaction($env);
        $response = $t->getTransaction($request->notificationCode);
        $sub = Subscription::where('reference_id', $response->reference)->get()->first();
        $status = (int) $response->status;
        $sub->status = makeState($status);
        $sub->save();
    }
}