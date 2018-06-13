<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 11/06/18
 * Time: 17:25
 */

namespace AdminWeb\PayerPagSeguro\States;


class DebitedState extends AbstractState
{

    const STATE = self::DEBITED;

    const CODE = 8;

    public function __toString()
    {
        return self::STATE;
    }
}