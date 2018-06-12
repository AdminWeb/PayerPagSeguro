<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 12/06/18
 * Time: 16:24
 */

namespace AdminWeb\PayerPagSeguro\Tests\Fixtures;


use AdminWeb\PayerPagSeguro\Http\WebHookController;
use Illuminate\Http\Request;

class WebHookControllerStub extends WebHookController
{
    public function handle(Request $request)
    {
        return $request->all();
    }
}