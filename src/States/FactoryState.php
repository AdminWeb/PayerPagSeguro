<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 12/06/18
 * Time: 16:47
 */

namespace AdminWeb\PayerPagSeguro\States;
class FactoryState
{
    static public function get($state)
    {
        $factoredState = null;
        if ($state == WaitingPayment::CODE) $factoredState = new WaitingPayment();
        if ($state == InAnalysis::CODE) $factoredState = new InAnalysis();
        if ($state == PaidState::CODE) $factoredState = new PaidState();
        if ($state == AvailableState::CODE) $factoredState = new AvailableState();
        if ($state == ContestState::CODE) $factoredState = new ContestState();
        if ($state == ReturnedState::CODE) $factoredState = new ReturnedState();
        if ($state == CancelledState::CODE) $factoredState = new CancelledState();
        if ($state == DebitedState::CODE) $factoredState = new DebitedState();
        return $factoredState;
    }
}