<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 11/06/18
 * Time: 17:19
 */

namespace AdminWeb\PayerPagSeguro\States;


class ContestState extends AbstractState
{
    const STATE = self::CONTEST;

    public function __toString()
    {
       return self::STATE;
    }

    public function available()
    {
        return new AvailableState();
    }

    public function returned()
    {
        return new ReturnedState();
    }

    public function pay()
    {
        return new PaidState();
    }
}