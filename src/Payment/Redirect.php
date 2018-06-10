<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 09/06/18
 * Time: 14:42
 */

namespace AdminWeb\PayerPagSeguro\Payment;


use AdminWeb\Payer\EnvInterface;
use AdminWeb\Payer\Itemable\ItemList;
use GuzzleHttp\Client;

class Redirect
{
    private $email, $token, $items = [], $env, $reference, $code;

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return Redirect
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     * @return Redirect
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }


    public function __construct($email, $token, EnvInterface $env)
    {
        $this->setEmail($email);
        $this->setToken($token);
        $this->setEnv($env);
    }

    public function getLink()
    {
        $code = $this->getCode()->code;
        $link = str_replace('{{codigo-checkout}}', $code, 'https://pagseguro.uol.com.br/v2/checkout/payment.html?code={{codigo-checkout}}');
        return $link;
    }

    protected function getCode()
    {
        $c = new Client([
            'base_uri' => $this->getEnv()->getUri()
        ]);;
        $response = $c->post('/v2/checkout', ['form_params' => $this->loadData()]);
        return simplexml_load_string($response->getBody()->getContents());
    }

    protected function loadData()
    {
        $data = [
            'email' => $this->getEmail(),
            'token' => $this->getToken(),
            'currency' => 'BRL'
        ];
        $items = $this->getItems()->getItem();
        $itemsCount = $this->getItems()->count();

        for ($i = 1; $i <= $itemsCount; $i++) {
            $data["itemId{$i}"] = $items->offsetGet($i - 1)->getidItem();
            $data["itemDescription{$i}"] = $items->offsetGet($i - 1)->getName();
            $data["itemAmount{$i}"] = $items->offsetGet($i - 1)->getAmount();
            $data["itemQuantity{$i}"] = $items->offsetGet($i - 1)->getQuantity();
        }
        $data['reference'] = $this->getReference();
        return $data;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param array $items
     */
    public function setItems(ItemList $items)
    {
        $this->items = $items;
    }

    /**
     * @return mixed
     */
    public function getEnv()
    {
        return $this->env;
    }

    /**
     * @param mixed $env
     * @return Redirect
     */
    public function setEnv(EnvInterface $env)
    {
        $this->env = $env;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        if (is_null($this->reference)) {
            throw new PaymentException('The Payment need have a reference!');
        }
        return $this->reference;
    }

    /**
     * @param mixed $reference
     * @return Redirect
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }


}