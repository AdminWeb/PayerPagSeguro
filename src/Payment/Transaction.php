<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 10/06/18
 * Time: 10:58
 */

namespace AdminWeb\PayerPagSeguro\Payment;


use AdminWeb\Payer\EnvInterface;
use GuzzleHttp\Client;

class Transaction
{
    /**
     * @var EnvInterface
     */
    private $env;

    /**
     * Notification constructor.
     * @param $env
     */
    public function __construct(EnvInterface $env)
    {
        $this->setEnv($env);
    }

    public function getTransaction($transactionCode, $isSimple = false)
    {
        $client = new Client([
            'base_uri' => $this->env->getUri(),
            //'http_errors' => false
        ]);

        $xml = $client->get("/v3/transactions/{$transactionCode}", ['query' => [
            'email' => $this->env->getCredential(),
            'token' => $this->env->getToken()
        ]])->getBody()->getContents();
        $doc = new \DOMDocument();
        $doc->loadXML($xml);
        return !$isSimple ? $doc : $xml;
    }

    /**
     * @return EnvInterface
     */
    public function getEnv()
    {
        return $this->env;
    }

    /**
     * @param EnvInterface $env
     * @return Transaction
     */
    public function setEnv(EnvInterface $env)
    {
        $this->env = $env;
        return $this;
    }


}