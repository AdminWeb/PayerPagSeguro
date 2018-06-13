<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 13/06/18
 * Time: 16:03
 */

namespace AdminWeb\PayerPagSeguro\Tests;


use AdminWeb\PayerPagSeguro\States\AvailableState;
use AdminWeb\PayerPagSeguro\States\CancelledState;
use AdminWeb\PayerPagSeguro\States\ContestState;
use AdminWeb\PayerPagSeguro\States\DebitedState;
use AdminWeb\PayerPagSeguro\States\FactoryState;
use AdminWeb\PayerPagSeguro\States\InAnalysis;
use AdminWeb\PayerPagSeguro\States\PaidState;
use AdminWeb\PayerPagSeguro\States\ReturnedState;
use AdminWeb\PayerPagSeguro\States\WaitingPayment;
use PHPUnit\Framework\TestCase;

/**
 * Class FactoryStateTest
 * @package AdminWeb\PayerPagSeguro\Tests
 * @covers \AdminWeb\PayerPagSeguro\States\FactoryState
 * @covers \AdminWeb\PayerPagSeguro\States\AvailableState
 * @covers \AdminWeb\PayerPagSeguro\States\CancelledState
 * @covers \AdminWeb\PayerPagSeguro\States\ContestState
 * @covers \AdminWeb\PayerPagSeguro\States\DebitedState
 * @covers \AdminWeb\PayerPagSeguro\States\InAnalysis
 * @covers \AdminWeb\PayerPagSeguro\States\PaidState
 * @covers \AdminWeb\PayerPagSeguro\States\ReturnedState
 * @covers \AdminWeb\PayerPagSeguro\States\WaitingPayment
 */
class FactoryStateTest extends TestCase
{

    /**
     * @test
     *
     */
    public function GetAvailableState()
    {
        $this->assertEquals(AvailableState::CODE, FactoryState::get(4)::CODE);
    }

    /**
     * @test
     *
     */
    public function GetCancelledState()
    {
        $this->assertEquals(CancelledState::CODE, FactoryState::get(7)::CODE);
    }/**
     * @test
     *
     */
    public function GetContestState()
    {
        $this->assertEquals(ContestState::CODE, FactoryState::get(5)::CODE);
    }
    /**
     * @test
     *
     */
    public function GetDebitedState()
    {
        $this->assertEquals(DebitedState::CODE, FactoryState::get(8)::CODE);
    }
    /**
     * @test
     *
     */
    public function GetInAnalysisState()
    {
        $this->assertEquals(InAnalysis::CODE, FactoryState::get(2)::CODE);
    }
    /**
     * @test
     *
     */
    public function GetPaidState()
    {
        $this->assertEquals(PaidState::CODE, FactoryState::get(3)::CODE);
    }
    /**
     * @test
     *
     */
    public function GetReturnedState()
    {
        $this->assertEquals(ReturnedState::CODE, FactoryState::get(6)::CODE);
    }
    /**
     * @test
     *
     */
    public function GetWaitingPaimentState()
    {
        $this->assertEquals(WaitingPayment::CODE, FactoryState::get(1)::CODE);
    }

}
