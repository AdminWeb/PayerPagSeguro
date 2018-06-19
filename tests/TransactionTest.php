<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 11/06/18
 * Time: 15:58
 */

namespace AdminWeb\PayerPagSeguro\Tests;

use AdminWeb\Payer\EnvInterface;
use AdminWeb\Payer\PayerServiceProvider;
use AdminWeb\PayerPagSeguro\PayerPagSeguroServiceProvider;
use AdminWeb\PayerPagSeguro\Payment\Transaction;
use AdminWeb\PayerPagSeguro\Tests\Fixtures\TransactionStub;
use Orchestra\Testbench\TestCase;

/**
 * Class TransactionTest
 * @package AdminWeb\PayerPagSeguro\Tests
 * @covers \AdminWeb\PayerPagSeguro\Payment\Transaction
 */
class TransactionTest extends TestCase
{
    /**
     * @test
     * @covers \AdminWeb\PayerPagSeguro\Payment\Transaction::getTransaction
     * @expectedException \GuzzleHttp\Exception\ClientException
     */
    public function GetTransaction()
    {
        $env = app()->make(EnvInterface::class);
        $t = new Transaction($env);
        $response = $t->getTransaction('766B9C-AD4B044B04DA-77742F5FA653-E1AB24');
    }

    /**
     * @test
     *
     */
    public function GetEnv()
    {
        $env = app()->make(EnvInterface::class);
        $t = new Transaction($env);
        $this->assertInstanceOf(EnvInterface::class, $t->getEnv());
    }

    /**
     * @test
     * @cover \AdminWeb\PayerPagSeguro\Payment\Transaction::getTransaction
     */
    public function GetTransactionIsXML()
    {
        $env = app()->make(EnvInterface::class);
        $t = new TransactionStub($env);
        $response = $t->getTransaction('766B9C-AD4B044B04DA-77742F5FA653-E1AB24', true);
        $expected = new \DOMDocument('foo');
        $actual = new \DOMDocument('foo');
        $actual->loadXML($response);

        $expected->loadXML('
        <transaction>
            <date></date>
            <code></code>
            <reference></reference>
            <type></type>
            <status></status>
            <paymentMethod>
                <type></type>
                <code></code>
            </paymentMethod>
            <grossAmount></grossAmount>
            <discountAmount></discountAmount>
            <creditorFees>
                <intermediationRateAmount></intermediationRateAmount>
                <intermediationFeeAmount></intermediationFeeAmount>
            </creditorFees>
            <netAmount></netAmount>
            <extraAmount></extraAmount>
            <installmentCount></installmentCount>
            <itemCount></itemCount>
            <items>
                <item>
                    <id></id>
                    <description></description>
                    <quantity></quantity>
                    <amount></amount>
                </item>
                <item>
                    <id></id>
                    <description></description>
                    <quantity></quantity>
                    <amount></amount>
                </item>
            </items>
            <sender>
                <name></name>
                <email></email>
                <phone>
                    <areaCode></areaCode>
                    <number></number>
                </phone>
            </sender>
            <shipping>
                <address>  
                    <street></street>  
                    <number></number>  
                    <complement></complement>  
                    <district></district>  
                    <postalCode></postalCode>  
                    <city></city>  
                    <state></state>  
                    <country></country>  
                </address>  
                <type></type>  
                <cost></cost>  
            </shipping>
        </transaction>');
        $this->assertEqualXMLStructure($expected->firstChild, $actual->firstChild);
    }

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
}
