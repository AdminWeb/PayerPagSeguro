<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 09/06/18
 * Time: 15:16
 */

namespace AdminWeb\PayerPagSeguro\Tests;

use AdminWeb\Payer\EnvInterface;
use AdminWeb\Payer\Itemable\Item;
use AdminWeb\Payer\Itemable\ItemList;
use AdminWeb\Payer\PayerServiceProvider;
use AdminWeb\PayerPagSeguro\PayerPagSeguroServiceProvider;
use AdminWeb\PayerPagSeguro\Payment\Redirect;
use Orchestra\Testbench\TestCase;


class RedirectTest extends TestCase
{

    protected function setUp()
    {
        parent::setUp();

        $this->loadLaravelMigrations(['--database' => 'testing']);
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        $this->artisan('migrate', ['--database' => 'testing']);
    }

    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);
        $app['config']->set('database.default', 'testing');
    }

    protected function getPackageProviders($app)
    {
        return [
            PayerServiceProvider::class,
            PayerPagSeguroServiceProvider::class,
        ];
    }
    /**
     * @test
     * @covers \AdminWeb\PayerPagSeguro\Payment\Redirect
     */
    public function RedirectTemplate()
    {
        $env = app()->make(EnvInterface::class);
        $item = new Item('Tv', '1', 599);
        $item->setidItem(3);
        $itemlist = new ItemList([$item]);
        $redirect = new Redirect($env);
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
        $env = app()->make(EnvInterface::class);
        $item = new Item('Tv', '1', 599);
        $item->setidItem(3);
        $itemlist = new ItemList([$item]);
        $redirect = new Redirect($env);
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
     * @cover \AdminWeb\PayerPagSeguro\Payment\Redirect::getCode
     * @cover \AdminWeb\PayerPagSeguro\Payment\Redirect::getLink
     */
    public function RedirectGetLink()
    {
        $env = app()->make(EnvInterface::class);
        $item = new Item('Tv', '1', 599);
        $item->setidItem(3);
        $itemlist = new ItemList([$item]);
        $redirect = new Redirect($env);
        $redirect->setReference(123);
        $redirect->setItems($itemlist);

        $ref = new \ReflectionMethod($redirect, 'getCode');
        $ref->setAccessible(true);
        $code = $ref->invoke($redirect);
        $code = $code->code;
        $link = $redirect->getLink();
        list($url, $newcode) = explode('=', $link);
        $data = [$url, $code];
        $newlink = implode('=', $data);

        $this->assertEquals(
            str_replace('{{codigo-checkout}}', $code, 'https://pagseguro.uol.com.br/v2/checkout/payment.html?code={{codigo-checkout}}'),
            $newlink
        );
    }
}
