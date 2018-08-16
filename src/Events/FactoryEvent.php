<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 12/06/18
 * Time: 16:47
 */

namespace AdminWeb\PayerPagSeguro\Events;

use AdminWeb\Payer\Events\EventException;

class FactoryEvent
{
    static public function get($event)
    {
        $events = [
            WaitingPayment::CODE => new WaitingPayment(),
            InAnalysis::CODE => new InAnalysis(),
            PaidEvent::CODE => new PaidEvent(),
            AvailableEvent::CODE => new AvailableEvent(),
            ContestEvent::CODE => new ContestEvent(),
            ReturnedEvent::CODE => new ReturnedEvent(),
            CancelledEvent::CODE => new CancelledEvent(),
            DebitedEvent::CODE => new DebitedEvent()
        ];
        if (!array_key_exists($event, $events)) {
            throw new EventException('Unknow Event');
        }
        return $events[$event];
    }
}