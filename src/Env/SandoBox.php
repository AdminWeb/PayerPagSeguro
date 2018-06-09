<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 09/06/18
 * Time: 14:52
 */

namespace AdminWeb\PayerPagSeguro\Env;


use AdminWeb\Payer\EnvInterface;

class SandoBox implements EnvInterface
{
    const Env = self::SandBox;

    public function getUri()
    {
        return 'https://ws.sandbox.pagseguro.uol.com.br';
    }
}