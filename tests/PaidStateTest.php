<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 13/06/18
 * Time: 15:21
 */

namespace AdminWeb\PayerPagSeguro\Tests;

use AdminWeb\PayerPagSeguro\States\AbstractState;
use AdminWeb\PayerPagSeguro\States\AvailableState;
use AdminWeb\PayerPagSeguro\States\ContestState;
use AdminWeb\PayerPagSeguro\States\PaidState;
use AdminWeb\PayerPagSeguro\States\ReturnedState;
use PHPUnit\Framework\TestCase;

/**
 * Class PaidStateTest
 * @package AdminWeb\PayerPagSeguro\Tests
 * @covers \AdminWeb\PayerPagSeguro\States\PaidState
 * @covers \AdminWeb\PayerPagSeguro\States\AbstractState
 */
class PaidStateTest extends TestCase
{

    public function testReturned()
    {
        $p = new PaidState();
        $this->assertEquals(ReturnedState::STATE, $p->returned());
    }

    public function testContest()
    {
        $p = new PaidState();
        $this->assertEquals(ContestState::STATE, $p->contest());
    }

    public function testAvailable()
    {
        $p = new PaidState();
        $this->assertEquals(AvailableState::STATE, $p->available());
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsWaitingPayment()
    {
        $p = new PaidState();
        $p->waitingPayment();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsDebited()
    {
        $p = new PaidState();
        $p->debited();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsInanalysis()
    {
        $p = new PaidState();
        $p->inAnalysis();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsApprove()
    {
        $p = new PaidState();
        $p->approve();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsPay()
    {
        $p = new PaidState();
        $p->pay();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsCancel()
    {
        $p = new PaidState();
        $p->cancel();
    }

    /**
     * @test
     *
     */
    public function State()
    {
        $p = new PaidState();
        $this->assertEquals(AbstractState::PAID, $p);
    }
}
