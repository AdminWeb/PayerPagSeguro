<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 09/06/18
 * Time: 15:16
 */

namespace AdminWeb\PayerPagSeguro\Tests;

use AdminWeb\Payer\Itemable\Item;
use AdminWeb\Payer\Itemable\ItemList;
use AdminWeb\PayerPagSeguro\Env\SandoBox;
use AdminWeb\PayerPagSeguro\Payment\Redirect;
use PHPUnit\Framework\TestCase;


class RedirectTest extends TestCase
{
    /**
     * @test
     * @covers \AdminWeb\PayerPagSeguro\Payment\Redirect
     */
    public function RedirectTemplate()
    {
        $item = new Item('Tv', '1', 599);
        $item->setidItem(3);
        $itemlist = new ItemList([$item]);
        $redirect = new Redirect(env('PAGSEGURO_EMAIL'), env('PAGSEGURO_TOKEN'), new SandoBox());
        $redirect->setReference(123);
        $redirect->setItems($itemlist);
        $ref = new \ReflectionMethod($redirect, 'loadData');
        $ref->setAccessible(true);
        $template = $ref->invoke($redirect);
        $this->assertArrayHasKey('itemId1', $template);
        $this->assertArrayHasKey('itemDescription1', $template);
        $this->assertArrayHasKey('itemAmount1', $template);
        $this->assertArrayHasKey('itemQuantity1', $template);
        $this->assertArrayHasKey('currency', $template);
        $this->assertArrayHasKey('reference', $template);
    }

    /**
     * @test
     * @expectedException \AdminWeb\PayerPagSeguro\Payment\PaymentException
     * @covers \AdminWeb\PayerPagSeguro\Payment\Redirect
     */
    public function RedirectREferenceException()
    {
        $item = new Item('Tv', '1', 599);
        $item->setidItem(3);
        $itemlist = new ItemList([$item]);
        $redirect = new Redirect(env('PAGSEGURO_EMAIL'), env('PAGSEGURO_TOKEN'), new SandoBox());
        $redirect->setItems($itemlist);
        $ref = new \ReflectionMethod($redirect, 'loadData');
        $ref->setAccessible(true);
        $template = $ref->invoke($redirect);
        $this->assertArrayHasKey('itemId1', $template);
        $this->assertArrayHasKey('itemDescription1', $template);
        $this->assertArrayHasKey('itemAmount1', $template);
        $this->assertArrayHasKey('itemQuantity1', $template);
        $this->assertArrayHasKey('currency', $template);
        $this->assertArrayHasKey('reference', $template);
    }

    /**
     * @test
     * @covers \AdminWeb\PayerPagSeguro\Payment\Redirect
     */
    public function RedirectGetLink()
    {
        $item = new Item('Tv', '1', 599);
        $item->setidItem(3);
        $itemlist = new ItemList([$item]);
        $redirect = new Redirect(env('PAGSEGURO_EMAIL'), env('PAGSEGURO_TOKEN'), new SandoBox());
        $redirect->setReference(123);
        $redirect->setItems($itemlist);

        $ref = new \ReflectionMethod($redirect, 'getCode');
        $ref->setAccessible(true);
        $code = $ref->invoke($redirect);
        $code = $code->code;
        $link =  $redirect->getLink();
        list($url, $newcode) = explode('=',$link);
        $data = [$url, $code];
        $newlink = implode('=',$data);

        $this->assertEquals(
            str_replace('{{codigo-checkout}}', $code, 'https://pagseguro.uol.com.br/v2/checkout/payment.html?code={{codigo-checkout}}'),
            $newlink
        );
    }
}
