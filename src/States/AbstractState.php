<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 10/06/18
 * Time: 22:34
 */

namespace AdminWeb\PayerPagSeguro\States;

use AdminWeb\Payer\States\AbstractState as BaseState;
use AdminWeb\Payer\States\StateException;

//https://devs.pagseguro.uol.com.br/docs/checkout-web-notificacoes#section--a-name-status-da-transacao-a-status-da-transa-o

abstract class AbstractState extends BaseState
{
    const WAITING_PAYMENT = 'WAITING_PAYMENT';
    const IN_ANALYSIS = 'IN_ANALYSIS';
    const CONTEST = 'CONTEST';
    const RETURNED = 'RETURNED';
    const AVAILABLE = 'AVAILABLE';
    const DEBITED = 'DEBITED';

    public function waitingPayment()
    {
        throw new StateException("Can't be waiting payment");
    }

    public function inAnalysis()
    {
        throw new StateException("Can't be in analysis");
    }

    public function contest()
    {
        throw new StateException("Can't be contest");
    }

    public function returned()
    {
        throw new StateException("Can't be returned");
    }

    public function available()
    {
        throw new StateException("Can't be available");
    }

    public function debited()
    {
        throw new StateException("Can't be debited");
    }

}