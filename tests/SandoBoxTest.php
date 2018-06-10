<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 09/06/18
 * Time: 18:11
 */

namespace AdminWeb\PayerPagSeguro\Tests;

use AdminWeb\PayerPagSeguro\Env\SandoBox;
use PHPUnit\Framework\TestCase;

class SandoBoxTest extends TestCase
{

    /**
     * @covers \AdminWeb\PayerPagSeguro\Env\SandoBox
     */
    public function testGetUri()
    {
        $sand = new SandoBox(env('PAGSEGURO_EMAIL'), env('PAGSEGURO_TOKEN'));
        $this->assertEquals('https://ws.sandbox.pagseguro.uol.com.br', $sand->getUri());
    }

    /**
     * @test
     * @covers \AdminWeb\PayerPagSeguro\Env\SandoBox
     */
    public function GetCredentials()
    {
        $sand = new SandoBox(env('PAGSEGURO_EMAIL'), env('PAGSEGURO_TOKEN'));
        $this->assertEquals(env('PAGSEGURO_EMAIL'), $sand->getCredential());
        $this->assertEquals(env('PAGSEGURO_TOKEN'), $sand->getToken());
    }
}
