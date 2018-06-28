<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 10/06/18
 * Time: 10:07
 */

Route::post('/payer_webhook',['as'=>'payer_webhook', 'uses'=>'AdminWeb\PayerPagSeguro\Http\WebHookController@handle']);