<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 16/08/18
 * Time: 17:24
 */

namespace AdminWeb\PayerPagSeguro\Events;


class CancelledEvent extends AbstractEvent
{

    const EVENT = self::CANCELLED;

    const CODE = 7;

    public function __toString()
    {
      return self::EVENT;
    }
}