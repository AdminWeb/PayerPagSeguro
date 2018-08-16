<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 16/08/18
 * Time: 17:20
 */

namespace AdminWeb\PayerPagSeguro\Events;


class AvailableEvent extends AbstractEvent
{

    const EVENT = self::AVAILABLE;

    const CODE = 4;

    
    public function __toString()
    {
       return self::EVENT;
    }
}