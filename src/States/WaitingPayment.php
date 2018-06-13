<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 10/06/18
 * Time: 22:30
 */

namespace AdminWeb\PayerPagSeguro\States;


use AdminWeb\Payer\States\CancelledState;
use AdminWeb\Payer\States\PaidState;

class WaitingPayment extends AbstractState
{

    const STATE = self::WAITING_PAYMENT;

    const CODE = 1;

    public function __toString()
    {
        return self::STATE;
    }

    public function pay()
    {
        return new PaidState();
    }

    public function cancel()
    {
        return new CancelledState();
    }


}