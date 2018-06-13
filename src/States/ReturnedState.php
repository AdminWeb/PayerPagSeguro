<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 11/06/18
 * Time: 17:17
 */

namespace AdminWeb\PayerPagSeguro\States;


class ReturnedState extends AbstractState
{

    const STATE = self::RETURNED;

    const CODE = 6;

    public function __toString()
    {
       return self::STATE;
    }
}