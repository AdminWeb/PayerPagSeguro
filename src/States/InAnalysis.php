<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 10/06/18
 * Time: 22:47
 */

namespace AdminWeb\PayerPagSeguro\States;


use AdminWeb\Payer\States\CancelledState as CancelState;
use AdminWeb\Payer\States\PaidState as PaidedState;

class InAnalysis extends AbstractState
{
    const STATE = self::IN_ANALYSIS;

    const CODE = 2;

    public function __toString()
    {
        return self::STATE;
    }

    public function pay()
    {
        return new PaidedState();
    }

    public function cancel()
    {
        return new CancelState();
    }
}