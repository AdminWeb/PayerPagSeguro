<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 16/08/18
 * Time: 17:25
 */

namespace AdminWeb\PayerPagSeguro\Events;


class DebitedEvent extends AbstractEvent
{

    const EVENT = self::DEBITED;

    const CODE = 8;

    public function __toString()
    {
        return self::EVENT;
    }
}