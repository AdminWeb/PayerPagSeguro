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
        $reference = $response->getElementsByTagName('reference');
        $status = $response->getElementsByTagName('status');
        $referenceValue = $reference[0]->nodeValue;
        $statusValue = $status[0]->nodeValue;
        $sub = Subscription::where('reference_id', $referenceValue)->get()->first();
        $sub->status = makeState($statusValue);
        $sub->save();
    }
}