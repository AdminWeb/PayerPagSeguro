<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 12/06/18
 * Time: 16:47
 */

namespace AdminWeb\PayerPagSeguro\States;
use AdminWeb\PayerPagSeguro\States\{
    AvailableState, CancelledState, ContestState, DebitedState, InAnalysis, PaidState, ReturnedState, WaitingPayment
};
use AdminWeb\PayerPagSeguro\States\AbstractState;

class FactoryState
{
    static public function get($state)
    {
        $factoredState = null;
        switch ($state) {
            case AbstractState::AVAILABLE == $state :
                $factoredState = new AvailableState();
                break;
            case AbstractState::PAID == $state:
                $factoredState = new PaidState();
                break;
            case AbstractState::CANCELLED == $state:
                $factoredState = new CancelledState();
                break;
            case AbstractState::CONTEST == $state:
                $factoredState = new ContestState();
                break;
            case AbstractState::DEBITED == $state:
                $factoredState = new DebitedState();
                break;
            case AbstractState::IN_ANALYSIS == $state:
                $factoredState = new InAnalysis();
                break;
            case AbstractState::RETURNED == $state:
                $factoredState = new ReturnedState();
                break;
            case AbstractState::WAITING_PAYMENT == $state:
                $factoredState = new WaitingPayment();
                break;
        }
        return $factoredState;
    }
}