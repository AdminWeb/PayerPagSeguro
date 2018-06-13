<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 13/06/18
 * Time: 15:56
 */

namespace AdminWeb\PayerPagSeguro\Tests;

use AdminWeb\PayerPagSeguro\States\AbstractState;
use AdminWeb\PayerPagSeguro\States\CancelledState;
use PHPUnit\Framework\TestCase;

/**
 * Class CancelledStateTest
 * @package AdminWeb\PayerPagSeguro\Tests
 * @covers \AdminWeb\PayerPagSeguro\States\CancelledState
 * @covers \AdminWeb\PayerPagSeguro\States\AbstractState
 */
class CancelledStateTest extends TestCase
{
    /**
     * @test
     *
     */
    public function State()
    {
        $c = new CancelledState();
        $this->assertEquals(AbstractState::CANCELLED, $c);
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsCancel()
    {
        $c = new CancelledState();
        $c->cancel();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsContest()
    {
        $c = new CancelledState();
        $c->contest();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsApprove()
    {
        $c = new CancelledState();
        $c->approve();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsInAnalysis()
    {
        $c = new CancelledState();
        $c->inAnalysis();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsDebited()
    {
        $c = new CancelledState();
        $c->debited();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsWaitingPayment()
    {
        $c = new CancelledState();
        $c->waitingPayment();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsAvailable()
    {
        $c = new CancelledState();
        $c->available();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsReturned()
    {
        $c = new CancelledState();
        $c->returned();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsPay()
    {
        $c = new CancelledState();
        $c->pay();
    }
}
