<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 16/08/18
 * Time: 22:47
 */

namespace AdminWeb\PayerPagSeguro\Events;

class InAnalysis extends AbstractEvent
{
    const STATE = self::IN_ANALYSIS;

    const CODE = 2;

    public function __toString()
    {
        return self::STATE;
    }
}