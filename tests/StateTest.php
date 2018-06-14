<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 13/06/18
 * Time: 11:51
 */

namespace AdminWeb\PayerPagSeguro\Tests;


use AdminWeb\PayerPagSeguro\States\PaidState;
use PHPUnit\Framework\TestCase;

class StateTest extends TestCase
{
    /**
     * @test
     * @cover makeState
     */
    public function SendPostDataStub()
    {
        $this->assertEquals(new PaidState(), makeState(3));
    }

    /**
     * @test
     * @expectedException \AdminWeb\Payer\States\StateException
     */
    public function MakeException()
    {
        makeState(9);
    }
}
