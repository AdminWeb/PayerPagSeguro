<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 10/06/18
 * Time: 22:47
 */

namespace AdminWeb\PayerPagSeguro\States;


use AdminWeb\Payer\States\CancelledState;
use AdminWeb\Payer\States\PaidState;

class InAnalysis extends AbstractState
{
    const STATE = self::IN_ANALYSIS;

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