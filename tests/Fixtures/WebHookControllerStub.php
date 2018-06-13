<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 12/06/18
 * Time: 16:24
 */

namespace AdminWeb\PayerPagSeguro\Tests\Fixtures;


use AdminWeb\Payer\EnvInterface;
use AdminWeb\Payer\Subscription;
use AdminWeb\PayerPagSeguro\Http\WebHookController;
use Illuminate\Http\Request;

class WebHookControllerStub extends WebHookController
{
    public function handle(Request $request)
    {
        return $request->all();
    }

    public function handleXml(Request $request)
    {
        $env = app()->make(EnvInterface::class);
        $t = new TransactionStub($env);
        $response = $t->getTransaction($request->notificationCode, true);
        $sub = Subscription::where('reference_id', $response->reference)->get()->first();
        $sub->status = makeState($response->status);
        $sub->save();
    }
}