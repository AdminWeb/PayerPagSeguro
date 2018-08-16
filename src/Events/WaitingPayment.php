<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 16/08/18
 * Time: 22:30
 */

namespace AdminWeb\PayerPagSeguro\Events;


use AdminWeb\Payer\EVENTs\CancelledEVENT as CancelEVENT;
use AdminWeb\Payer\EVENTs\PaidEVENT as PaidedEVENT;

class WaitingPayment extends AbstractEvent
{

    const EVENT = self::WAITING_PAYMENT;

    const CODE = 1;

    public function __toString()
    {
        return self::EVENT;
    }
}