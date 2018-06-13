<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 13/06/18
 * Time: 15:14
 */

namespace AdminWeb\PayerPagSeguro\Tests;

use AdminWeb\PayerPagSeguro\States\AbstractState;
use AdminWeb\PayerPagSeguro\States\CancelledState;
use AdminWeb\PayerPagSeguro\States\InAnalysis;
use AdminWeb\PayerPagSeguro\States\PaidState;
use PHPUnit\Framework\TestCase;

/**
 * Class InAnalysisTest
 * @package AdminWeb\PayerPagSeguro\Tests
 * @covers \AdminWeb\PayerPagSeguro\States\InAnalysis
 * @covers \AdminWeb\PayerPagSeguro\States\AbstractState
 */
class InAnalysisTest extends TestCase
{

    public function testPay()
    {
        $in = new InAnalysis();
        $this->assertEquals(PaidState::STATE, $in->pay());
    }

    public function testCancel()
    {
        $in = new InAnalysis();
        $this->assertEquals(CancelledState::STATE, $in->cancel());
    }

    /**
     * @test
     *
     */
    public function State()
    {
        $in = new InAnalysis();
        $this->assertEquals(AbstractState::IN_ANALYSIS, $in);
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsApprove()
    {
        $in = new InAnalysis();
        $in->approve();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsAvailable()
    {
        $in = new InAnalysis();
        $in->available();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsInAnalysis()
    {
        $in = new InAnalysis();
        $in->inAnalysis();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsDebited()
    {
        $in = new InAnalysis();
        $in->debited();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsContest()
    {
        $in = new InAnalysis();
        $in->contest();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsReturned()
    {
        $in = new InAnalysis();
        $in->approve();
        $in->returned();
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function FailsWaitingPayment()
    {
        $in = new InAnalysis();
        $in->approve();
        $in->available();
        $in->inAnalysis();
        $in->debited();
        $in->debited();
        $in->contest();
        $in->returned();
        $in->waitingPayment();
    }
}
