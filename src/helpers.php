<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 12/06/18
 * Time: 16:43
 */
use AdminWeb\PayerPagSeguro\States\FactoryState;
function makeState($state){
    return FactoryState::get($state);
}