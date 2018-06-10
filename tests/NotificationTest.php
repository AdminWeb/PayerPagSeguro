<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 10/06/18
 * Time: 11:53
 */

namespace AdminWeb\PayerPagSeguro\Tests;

use AdminWeb\PayerPagSeguro\Env\SandoBox;
use AdminWeb\PayerPagSeguro\Payment\Notification;
use PHPUnit\Framework\TestCase;

class NotificationTest extends TestCase
{

    public function testGetNotification()
    {
        $code = '766B9C-AD4B044B04DA-77742F5FA653-E1AB24';
        $no = new Notification(new SandoBox(env('PAGSEGURO_EMAIL'), env('PAGSEGURO_TOKEN')));
        $mock = $this->createMock(Notification::class)
        ->method('getNotification', [$code])
        ->will($this->returnValue($this->returnData()));

        $response = $no->getNotification($code);
        var_dump($response);
        exit;
    }

    public function returnData()
    {
        return '<?xml version="1.0" encoding="ISO-8859-1" standalone="yes"?>  
<transaction>  
    <date>2011-02-10T16:13:41.000-03:00</date>  
    <code>9E884542-81B3-4419-9A75-BCC6FB495EF1</code>  
    <reference>REF1234</reference>
    <type>1</type>  
    <status>3</status>  
    <paymentMethod>  
        <type>2</type>  
        <code>202</code>  
    </paymentMethod>  
    <grossAmount>300021.45</grossAmount>
    <discountAmount>0.00</discountAmount>
    <creditorFees>
        <intermediationRateAmount>0.40</intermediationRateAmount>
        <intermediationFeeAmount>11970.86</intermediationFeeAmount>
    </creditorFees>
    <netAmount>288050.19</netAmount>
    <extraAmount>0.00</extraAmount>  
    <installmentCount>1</installmentCount>  
    <itemCount>3</itemCount>  
    <items>  
        <item>  
            <id>0001</id>  
            <description>Produto PagSeguroI</description>  
            <quantity>1</quantity>  
            <amount>99999.99</amount>  
        </item>  
        <item>  
            <id>0002</id>  
            <description>Produto PagSeguroII</description>  
            <quantity>2</quantity>  
            <amount>99999.98</amount>  
        </item>  
    </items>  
    <sender>  
        <name>José Comprador</name>  
        <email>comprador@uol.com.br</email>  
        <phone>  
            <areaCode>99</areaCode>  
            <number>99999999</number>  
        </phone>  
    </sender>  
    <shipping>  
        <address>  
            <street>Av. PagSeguro</street>  
            <number>9999</number>  
            <complement>99o andar</complement>  
            <district>Jardim Internet</district>  
            <postalCode>99999999</postalCode>  
            <city>Cidade Exemplo</city>  
            <state>SP</state>  
            <country>ATA</country>  
        </address>  
        <type>1</type>  
        <cost>21.50</cost>  
    </shipping>
</transaction>';
    }


}
