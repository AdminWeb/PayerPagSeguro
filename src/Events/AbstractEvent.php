<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 16/08/18
 * Time: 22:34
 */

namespace AdminWeb\PayerPagSeguro\Events;

use AdminWeb\Payer\Events\EventInterface;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Event;

abstract class AbstractEvent extends Event implements EventInterface, ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    const WAITING_PAYMENT = 'WAITING_PAYMENT';
    const IN_ANALYSIS = 'IN_ANALYSIS';
    const CONTEST = 'CONTEST';
    const RETURNED = 'RETURNED';
    const AVAILABLE = 'AVAILABLE';
    const DEBITED = 'DEBITED';

    public function broadcastOn()
    {
        return new Channel('payment');
    }
}