<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 13/06/18
 * Time: 15:51
 */

namespace AdminWeb\PayerPagSeguro\Tests;

use AdminWeb\PayerPagSeguro\States\AbstractState;
use AdminWeb\PayerPagSeguro\States\ReturnedState;
use PHPUnit\Framework\TestCase;

/**
 * Class ReturnedStateTest
 * @package AdminWeb\PayerPagSeguro\Tests
 * @covers \AdminWeb\PayerPagSeguro\States\ReturnedState *
 * @covers \AdminWeb\PayerPagSeguro\States\AbstractState
 */
class ReturnedStateTest extends TestCase
{

    /**
     * @test
     *
     */
    public function State()
    {
        $r = new ReturnedState();
        $this->assertEquals(AbstractState::RETURNED, $r);
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsCancel()
    {
        $r = new ReturnedState();
        $r->cancel();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsContest()
    {
        $r = new ReturnedState();
        $r->contest();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsApprove()
    {
        $r = new ReturnedState();
        $r->approve();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsInAnalysis()
    {
        $r = new ReturnedState();
        $r->inAnalysis();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsDebited()
    {
        $r = new ReturnedState();
        $r->debited();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsWaitingPayment()
    {
        $r = new ReturnedState();
        $r->waitingPayment();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsAvailable()
    {
        $r = new ReturnedState();
        $r->available();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsReturned()
    {
        $r = new ReturnedState();
        $r->returned();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsPay()
    {
        $r = new ReturnedState();
        $r->pay();
    }
}
