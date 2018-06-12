<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 11/06/18
 * Time: 17:24
 */

namespace AdminWeb\PayerPagSeguro\States;


class CancelledState extends AbstractState
{

    const STATE = self::CANCELLED;

    public function __toString()
    {
      return self::STATE;
    }
}