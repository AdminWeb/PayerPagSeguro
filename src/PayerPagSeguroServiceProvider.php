<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 10/06/18
 * Time: 10:04
 */

namespace AdminWeb\PayerPagSeguro;


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

    }
}