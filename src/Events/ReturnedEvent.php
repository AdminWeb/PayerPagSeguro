<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 16/08/18
 * Time: 17:17
 */

namespace AdminWeb\PayerPagSeguro\Events;


class ReturnedEvent extends AbstractEvent
{

    const EVENT = self::RETURNED;

    const CODE = 6;

    public function __toString()
    {
       return self::EVENT;
    }
}