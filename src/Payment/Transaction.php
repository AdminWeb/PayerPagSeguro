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
    private $env;

    /**
     * Notification constructor.
     * @param $env
     */
    public function __construct(EnvInterface $env)
    {
        $this->env = $env;
    }

    public function getTransaction($transactionCode)
    {
        $client =  new Client([
            'base_uri' => $this->env->getUri()
        ]);

        $response = $client->get("/v3/transactions/notifications/{$transactionCode}", ['query' => [
            'email'=>$this->env->getCredential(),
            'token'=>$this->env->getToken()
        ]]);
        return $response->getBody()->getContents();
    }




}