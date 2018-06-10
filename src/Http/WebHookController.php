<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 10/06/18
 * Time: 10:06
 */

namespace AdminWeb\PayerPagSeguro\Http;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WebHookController extends Controller
{
    public function handle(Request $request)
    {
        return $request->all();
    }
}