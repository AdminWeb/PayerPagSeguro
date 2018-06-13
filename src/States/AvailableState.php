<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 11/06/18
 * Time: 17:20
 */

namespace AdminWeb\PayerPagSeguro\States;


class AvailableState extends AbstractState
{

    const STATE = self::AVAILABLE;

    const CODE = 4;

    public function contest()
    {
        return new ContestState();
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