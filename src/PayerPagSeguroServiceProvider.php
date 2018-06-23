<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 10/06/18
 * Time: 10:04
 */

namespace AdminWeb\PayerPagSeguro;


use AdminWeb\Payer\EnvInterface;
use AdminWeb\Payer\SubscriptionInterface;
use AdminWeb\PayerPagSeguro\Env\Production;
use AdminWeb\PayerPagSeguro\Env\SandBox;
use AdminWeb\PayerPagSeguro\States\WaitingPayment;
use Illuminate\Support\ServiceProvider;

class PayerPagSeguroServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/payerpagseguro.php' => config_path('payerpagseguro.php'),
        ]);

        $this->loadRoutesFrom(__DIR__.'/../routes/routes.php');

        //$this->loadMigrationsFrom(__DIR__ . '/../migrations');

        $this->loadViewsFrom(__DIR__ . '/../views', 'payer');

    }

    public function register()
    {
        $this->app->bind(EnvInterface::class, function(){
            $env = $this->app['config']['app']['env'];
            if($env == strtolower('production')){
                return new Production(env('PAGSEGURO_EMAIL'), env('PAGSEGURO_TOKEN'));
            }
            return new SandBox(env('PAGSEGURO_EMAIL_SANDBOX'), env('PAGSEGURO_TOKEN_SANBOX'));
        });

        $this->app->bind('InitialState',function(){
            return new WaitingPayment();
        });

        $this->app->bind(SubscriptionInterface::class,function(){
            return new Subscription();
        });
    }
}