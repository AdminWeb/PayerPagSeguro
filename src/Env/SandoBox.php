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
    private $credential, $token;

    /**
     * Production constructor.
     * @param $credential
     * @param $token
     */
    public function __construct($credential, $token)
    {
        $this->credential = $credential;
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getCredential()
    {
        return $this->credential;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    public function getUri()
    {
        return 'https://ws.sandbox.pagseguro.uol.com.br';
    }
}