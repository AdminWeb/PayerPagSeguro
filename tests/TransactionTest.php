<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 11/06/18
 * Time: 15:58
 */

namespace AdminWeb\PayerPagSeguro\Tests;

use AdminWeb\PayerPagSeguro\Env\SandBox;
use AdminWeb\PayerPagSeguro\Payment\Transaction;
use AdminWeb\PayerPagSeguro\Tests\Fixtures\TransactionStub;
use PHPUnit\Framework\TestCase;

class TransactionTest extends TestCase
{

    /**
     * @test
     * @expectedException \GuzzleHttp\Exception\ClientException
     * @covers \AdminWeb\PayerPagSeguro\Payment\Transaction
     */
    public function GetTransaction()
    {
        $t = new Transaction(new SandBox(env('PAGSEGURO_EMAIL'), env('PAGSEGURO_TOKEN')));
        $response = $t->getTransaction('766B9C-AD4B044B04DA-77742F5FA653-E1AB24');
    }

    /**
     * @test
     * @covers \AdminWeb\PayerPagSeguro\Payment\Transaction
     */
    public function GetTransactionIsXML()
    {
        $t = new TransactionStub(new SandBox(env('PAGSEGURO_EMAIL'), env('PAGSEGURO_TOKEN')));
        $response = $t->getTransaction('766B9C-AD4B044B04DA-77742F5FA653-E1AB24');
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
        </transaction>
        ');
        $this->assertEqualXMLStructure($expected->firstChild, $actual->firstChild);
    }
}
