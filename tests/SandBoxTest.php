<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 09/06/18
 * Time: 18:11
 */

namespace AdminWeb\PayerPagSeguro\Tests;

use AdminWeb\PayerPagSeguro\Env\SandBox;
use PHPUnit\Framework\TestCase;

class SandBoxTest extends TestCase
{

    /**
     * @covers \AdminWeb\PayerPagSeguro\Env\SandBox
     */
    public function testGetUri()
    {
        $sand = new SandBox(env('PAGSEGURO_EMAIL_SANDBOX'), env('PAGSEGURO_TOKEN_SANDBOX'));
        $this->assertEquals('https://ws.sandbox.pagseguro.uol.com.br', $sand->getUri());
    }

    /**
     * @test
     * @covers \AdminWeb\PayerPagSeguro\Env\SandBox
     */
    public function GetCredentials()
    {
        $sand = new SandBox(env('PAGSEGURO_EMAIL_SANDBOX'), env('PAGSEGURO_TOKEN_SANDBOX'));
        $this->assertEquals(env('PAGSEGURO_EMAIL_SANDBOX'), $sand->getCredential());
        $this->assertEquals(env('PAGSEGURO_TOKEN_SANDBOX'), $sand->getToken());
    }
}
