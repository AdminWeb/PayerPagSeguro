<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 16/08/18
 * Time: 17:19
 */

namespace AdminWeb\PayerPagSeguro\Events;


class ContestEvent extends AbstractEvent
{
    const EVENT = self::CONTEST;

    const CODE = 5;

    public function __toString()
    {
       return self::EVENT;
    }
}