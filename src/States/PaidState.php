<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 11/06/18
 * Time: 17:16
 */

namespace AdminWeb\PayerPagSeguro\States;


class PaidState extends AbstractState
{

    const STATE = self::PAID;

    const CODE = 3;

    public function contest()
    {
        return new ContestState();
    }

    public function available()
    {
        return new AvailableState();
    }

    public function returned()
    {
        return new ReturnedState();
    }

    public function __toString()
    {
        return self::STATE;
    }
}