<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 16/08/18
 * Time: 17:16
 */

namespace AdminWeb\PayerPagSeguro\Events;


class PaidEvent extends AbstractEvent
{

    const EVENT = self::PAID;

    const CODE = 3;


    public function __toString()
    {
        return self::EVENT;
    }
}