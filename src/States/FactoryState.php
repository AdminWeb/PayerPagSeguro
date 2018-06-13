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
class FactoryState
{
    static public function get($state)
    {
        $factoredState = null;
        switch ($state) {
            case 1:
                $factoredState = new WaitingPayment();
                break;
            case 2:
                $factoredState = new InAnalysis();
                break;
            case 3:
                $factoredState = new PaidState();
                break;
            case 4:
                $factoredState = new AvailableState();
                break;
            case 5:
                $factoredState = new ContestState();
                break;
            case 6:
                $factoredState = new ReturnedState();
                break;
            case 7:
                $factoredState = new CancelledState();
                break;
            case 8:
                $factoredState = new DebitedState();
                break;
        }
        return $factoredState;
    }
}