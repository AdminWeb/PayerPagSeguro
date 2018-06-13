<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 13/06/18
 * Time: 15:37
 */

namespace AdminWeb\PayerPagSeguro\Tests;

use AdminWeb\PayerPagSeguro\States\AbstractState;
use AdminWeb\PayerPagSeguro\States\AvailableState;
use AdminWeb\PayerPagSeguro\States\ContestState;
use AdminWeb\PayerPagSeguro\States\PaidState;
use AdminWeb\PayerPagSeguro\States\ReturnedState;
use PHPUnit\Framework\TestCase;

/**
 * Class ContestStateTest
 * @package AdminWeb\PayerPagSeguro\Tests
 * @covers \AdminWeb\PayerPagSeguro\States\ContestState
 * @covers \AdminWeb\PayerPagSeguro\States\AbstractState
 */
class ContestStateTest extends TestCase
{

    public function testPay()
    {
        $c = new ContestState();
        $this->assertEquals(PaidState::STATE, $c->pay());
    }

    public function testReturned()
    {
        $c = new ContestState();
        $this->assertEquals(ReturnedState::STATE, $c->returned());
    }

    public function testAvailable()
    {
        $c = new ContestState();
        $this->assertEquals(AvailableState::STATE, $c->available());
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsWaitingPayment()
    {
        $c = new ContestState();
        $c->waitingPayment();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsDebited()
    {
        $c = new ContestState();
        $c->debited();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsInanalysis()
    {
        $c = new ContestState();
        $c->inAnalysis();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsApprove()
    {
        $c = new ContestState();
        $c->approve();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsCancel()
    {
        $c = new ContestState();
        $c->cancel();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsContest()
    {
        $c = new ContestState();
        $c->contest();
    }

    /**
     * @test
     *
     */
    public function State()
    {
        $c = new ContestState();
        $this->assertEquals(AbstractState::CONTEST, $c);
    }
}
