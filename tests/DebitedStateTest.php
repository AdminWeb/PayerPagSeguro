<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 13/06/18
 * Time: 16:01
 */

namespace AdminWeb\PayerPagSeguro\Tests;

use AdminWeb\PayerPagSeguro\States\AbstractState;
use AdminWeb\PayerPagSeguro\States\DebitedState;
use PHPUnit\Framework\TestCase;

/**
 * Class DebitedStateTest
 * @package AdminWeb\PayerPagSeguro\Tests
 * @covers \AdminWeb\PayerPagSeguro\States\DebitedState
 * @covers \AdminWeb\PayerPagSeguro\States\AbstractState
 */
class DebitedStateTest extends TestCase
{
    /**
     * @test
     *
     */
    public function State()
    {
        $d = new DebitedState();
        $this->assertEquals(AbstractState::DEBITED, $d);
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsCancel()
    {
        $d = new DebitedState();
        $d->cancel();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsContest()
    {
        $d = new DebitedState();
        $d->contest();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsApprove()
    {
        $d = new DebitedState();
        $d->approve();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsInAnalysis()
    {
        $d = new DebitedState();
        $d->inAnalysis();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsDebited()
    {
        $d = new DebitedState();
        $d->debited();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsWaitingPayment()
    {
        $d = new DebitedState();
        $d->waitingPayment();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsAvailable()
    {
        $d = new DebitedState();
        $d->available();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsReturned()
    {
        $d = new DebitedState();
        $d->returned();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsPay()
    {
        $d = new DebitedState();
        $d->pay();
    }
}
