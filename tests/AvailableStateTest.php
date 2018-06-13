<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 13/06/18
 * Time: 15:32
 */

namespace AdminWeb\PayerPagSeguro\Tests;

use AdminWeb\PayerPagSeguro\States\AbstractState;
use AdminWeb\PayerPagSeguro\States\AvailableState;
use AdminWeb\PayerPagSeguro\States\ContestState;
use AdminWeb\PayerPagSeguro\States\ReturnedState;
use PHPUnit\Framework\TestCase;

/**
 * Class AvailableStateTest
 * @package AdminWeb\PayerPagSeguro\Tests
 * @covers \AdminWeb\PayerPagSeguro\States\AvailableState
 * @covers \AdminWeb\PayerPagSeguro\States\AbstractState
 */
class AvailableStateTest extends TestCase
{

    public function testReturned()
    {
        $a = new AvailableState();
        $this->assertEquals(ReturnedState::STATE, $a->returned());
    }

    public function testContest()
    {
        $a = new AvailableState();
        $this->assertEquals(ContestState::STATE, $a->contest());
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsCancel()
    {
        $a = new AvailableState();
        $a->cancel();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsPay()
    {
        $a = new AvailableState();
        $a->pay();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsApprove()
    {
        $a = new AvailableState();
        $a->approve();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsInAnalysis()
    {
        $a = new AvailableState();
        $a->inAnalysis();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsDebited()
    {
        $a = new AvailableState();
        $a->debited();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsWaitingPayment()
    {
        $a = new AvailableState();
        $a->waitingPayment();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsAvailable()
    {
        $a = new AvailableState();
        $a->available();
    }

    /**
     * @test
     *
     */
    public function State()
    {
        $a = new AvailableState();
        $this->assertEquals(AbstractState::AVAILABLE, $a);
    }
}
