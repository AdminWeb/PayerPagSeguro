<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 10/06/18
 * Time: 10:16
 */

namespace AdminWeb\PayerPagSeguro\Tests;


use AdminWeb\Payer\PayerServiceProvider;
use AdminWeb\PayerPagSeguro\Http\WebHookController;
use AdminWeb\PayerPagSeguro\PayerPagSeguroServiceProvider;
use Illuminate\Http\Request;
use Orchestra\Testbench\TestCase;

class WebHookTest extends TestCase
{
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

    /**
     * @test
     *
     */
    public function SendPostData()
    {
        $data = [
            'notificationCode' => '766B9C-AD4B044B04DA-77742F5FA653-E1AB24',
            'notificationType' => 'transaction'
        ];
        $request = Request::create(route('payer_webhook'), 'POST', $data, [], [], [], []);
        $controller = new WebHookController();
        $response = $controller->handle($request);
        $this->assertEquals($data['notificationCode'], $response['notificationCode']);
    }
}
