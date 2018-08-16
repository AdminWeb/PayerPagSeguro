<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 16/08/18
 * Time: 12:01
 */

namespace AdminWeb\PayerPagSeguro\Tests;

use AdminWeb\PayerPagSeguro\Events\AvailableEvent;
use AdminWeb\PayerPagSeguro\Events\CancelledEvent;
use AdminWeb\PayerPagSeguro\Events\ContestEvent;
use AdminWeb\PayerPagSeguro\Events\DebitedEvent;
use AdminWeb\PayerPagSeguro\Events\FactoryEvent;
use AdminWeb\PayerPagSeguro\Events\InAnalysis;
use AdminWeb\PayerPagSeguro\Events\PaidEvent;
use AdminWeb\PayerPagSeguro\Events\ReturnedEvent;
use AdminWeb\PayerPagSeguro\Events\WaitingPayment;
use PHPUnit\Framework\TestCase;

class FactoryEventTest extends TestCase
{
    /**
     * @test
     *
     */
    public function GetAvailableEvent()
    {
        $this->assertEquals(AvailableEvent::CODE, FactoryEvent::get(4)::CODE);
    }

    /**
     * @test
     *
     */
    public function GetCancelledEvent()
    {
        $this->assertEquals(CancelledEvent::CODE, FactoryEvent::get(7)::CODE);
    }

    /**
     * @test
     *
     */
    public function GetContestEvent()
    {
        $this->assertEquals(ContestEvent::CODE, FactoryEvent::get(5)::CODE);
    }

    /**
     * @test
     *
     */
    public function GetDebitedEvent()
    {
        $this->assertEquals(DebitedEvent::CODE, FactoryEvent::get(8)::CODE);
    }

    /**
     * @test
     *
     */
    public function GetInAnalysisEvent()
    {
        $this->assertEquals(InAnalysis::CODE, FactoryEvent::get(2)::CODE);
    }

    /**
     * @test
     *
     */
    public function GetPaidEvent()
    {
        $this->assertEquals(PaidEvent::CODE, FactoryEvent::get(3)::CODE);
    }

    /**
     * @test
     *
     */
    public function GetReturnedEvent()
    {
        $this->assertEquals(ReturnedEvent::CODE, FactoryEvent::get(6)::CODE);
    }

    /**
     * @test
     *
     */
    public function GetWaitingPaimentEvent()
    {
        $this->assertEquals(WaitingPayment::CODE, FactoryEvent::get(1)::CODE);
    }

    /**
     * @test
     *
     */
    public function makeEvent()
    {
        $this->assertEquals(AvailableEvent::CODE, makeEvent(4)::CODE);
        $this->assertEquals(CancelledEvent::CODE, makeEvent(7)::CODE);
        $this->assertEquals(ContestEvent::CODE, makeEvent(5)::CODE);
        $this->assertEquals(DebitedEvent::CODE, makeEvent(8)::CODE);
        $this->assertEquals(InAnalysis::CODE, makeEvent(2)::CODE);
        $this->assertEquals(PaidEvent::CODE, makeEvent(3)::CODE);
        $this->assertEquals(ReturnedEvent::CODE, makeEvent(6)::CODE);
        $this->assertEquals(WaitingPayment::CODE, makeEvent(1)::CODE);
    }
}
