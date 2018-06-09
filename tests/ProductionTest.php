<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 09/06/18
 * Time: 18:10
 */

namespace AdminWeb\PayerPagSeguro\Tests;

use AdminWeb\PayerPagSeguro\Env\Production;
use PHPUnit\Framework\TestCase;

class ProductionTest extends TestCase
{

    /**
     * @covers \AdminWeb\PayerPagSeguro\Env\Production
     */
    public function testGetUri()
    {
        $prod = new Production();
        $this->assertEquals('https://ws.pagseguro.uol.com.br/', $prod->getUri());
    }
}
