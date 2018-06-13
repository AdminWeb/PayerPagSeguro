<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 13/06/18
 * Time: 16:11
 */

namespace AdminWeb\PayerPagSeguro\Tests;


use AdminWeb\Payer\EnvInterface;
use AdminWeb\Payer\PayerServiceProvider;
use AdminWeb\PayerPagSeguro\Env\Production;
use AdminWeb\PayerPagSeguro\PayerPagSeguroServiceProvider;
use Orchestra\Testbench\TestCase;

class PayerPagSeguroProviderTest extends TestCase
{
    /**
     * @test
     * @covers \AdminWeb\PayerPagSeguro\PayerPagSeguroServiceProvider
     */
    public function GetProduction()
    {
        $app = app();
        $app['config']->set('app.env','production');
        $env = app()->make(EnvInterface::class);
        $this->assertInstanceOf(Production::class, $env);
    }

    protected function setUp()
    {
        parent::setUp();

        $this->loadLaravelMigrations(['--database' => 'testing']);
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        $this->artisan('migrate', ['--database' => 'testing']);
    }

    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);
        $app['config']->set('database.default', 'testing');
    }

    protected function getPackageProviders($app)
    {
        return [
            PayerServiceProvider::class,
            PayerPagSeguroServiceProvider::class,
        ];
    }
}
