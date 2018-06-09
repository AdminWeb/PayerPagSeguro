<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 09/06/18
 * Time: 14:52
 */

namespace AdminWeb\PayerPagSeguro\Env;

use AdminWeb\Payer\EnvInterface;

class Production implements EnvInterface
{
    const ENV = self::Production;

    public function getUri()
    {
        return 'https://ws.pagseguro.uol.com.br/';
    }
}