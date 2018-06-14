<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 12/06/18
 * Time: 16:47
 */

namespace AdminWeb\PayerPagSeguro\States;

use AdminWeb\Payer\States\StateException;

class FactoryState
{
    static public function get($state)
    {
        $states = [
            WaitingPayment::CODE => new WaitingPayment(),
            InAnalysis::CODE => new InAnalysis(),
            PaidState::CODE => new PaidState(),
            AvailableState::CODE => new AvailableState(),
            ContestState::CODE => new ContestState(),
            ReturnedState::CODE => new ReturnedState(),
            CancelledState::CODE => new CancelledState(),
            DebitedState::CODE => new DebitedState()
        ];
        if (!array_key_exists($state, $states)) {
            throw new StateException('Unknow State');
        }
        return $states[$state];
    }
}