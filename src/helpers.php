<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 16/08/18
 * Time: 16:43
 */
use AdminWeb\PayerPagSeguro\States\FactoryState;
use AdminWeb\PayerPagSeguro\Events\FactoryEvent;

if(!function_exists('makeState')){
    function makeState($state){
        return FactoryState::get($state);
    }
}

if(!function_exists('makeEvent')){
    function makeEvent($event){
        return FactoryEvent::get($event);
    }
}
