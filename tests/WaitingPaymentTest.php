<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 13/06/18
 * Time: 15:07
 */

namespace AdminWeb\PayerPagSeguro\Tests;

use AdminWeb\PayerPagSeguro\States\AbstractState;
use AdminWeb\PayerPagSeguro\States\CancelledState;
use AdminWeb\PayerPagSeguro\States\PaidState;
use AdminWeb\PayerPagSeguro\States\WaitingPayment;
use PHPUnit\Framework\TestCase;

/**
 * Class WaitingPaymentTest
 * @package AdminWeb\PayerPagSeguro\Tests
 * @covers \AdminWeb\PayerPagSeguro\States\WaitingPayment
 * @covers \AdminWeb\PayerPagSeguro\States\AbstractState
 */
class WaitingPaymentTest extends TestCase
{

    public function testCancel()
    {
        $w = new WaitingPayment();
        $this->assertEquals(CancelledState::STATE, $w->cancel()::STATE);
    }

    public function testPay()
    {
        $w = new WaitingPayment();
        $this->assertEquals(PaidState::STATE, $w->pay()::STATE);
    }

    /**
     * @test
     *
     */
    public function State()
    {
        $w = new WaitingPayment();
        $this->assertEquals(AbstractState::WAITING_PAYMENT, $w);
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsReturned()
    {
        $w = new WaitingPayment();
        $w->returned();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsAvailable()
    {
        $w = new WaitingPayment();
        $w->available();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsContest()
    {
        $w = new WaitingPayment();
        $w->contest();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsDebited()
    {
        $w = new WaitingPayment();
        $w->debited();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsInAnalysis()
    {
        $w = new WaitingPayment();
        $w->inAnalysis();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsApprove()
    {
        $w = new WaitingPayment();
        $w->approve();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsWaitingPayment()
    {
        $w = new WaitingPayment();
        $w->waitingPayment();
    }
}
