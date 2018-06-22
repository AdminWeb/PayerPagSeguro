<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 17/06/18
 * Time: 12:08
 */

namespace AdminWeb\PayerPagSeguro;

use AdminWeb\Payer\EnvInterface;
use AdminWeb\Payer\Subscription as SubscriptionBase;
use AdminWeb\PayerPagSeguro\Payment\Redirect;

class Subscription extends SubscriptionBase
{
    public function redirect()
    {
        $env = app()->make(EnvInterface::class);
        $redirect = new Redirect($env);
        $redirect->setItems($this->getItem());
        $redirect->setReference($this->reference_id);
        return $redirect->getLink();
    }
}