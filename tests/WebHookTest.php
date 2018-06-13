<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 10/06/18
 * Time: 10:16
 */

namespace AdminWeb\PayerPagSeguro\Tests;


use AdminWeb\Payer\Itemable\Item;
use AdminWeb\Payer\PayerServiceProvider;
use AdminWeb\Payer\Subscription;
use AdminWeb\PayerPagSeguro\PayerPagSeguroServiceProvider;
use AdminWeb\PayerPagSeguro\States\PaidState;
use AdminWeb\PayerPagSeguro\Tests\Fixtures\User;
use AdminWeb\PayerPagSeguro\Tests\Fixtures\WebHookControllerStub;
use Illuminate\Http\Request;
use Orchestra\Testbench\TestCase;

class WebHookTest extends TestCase
{
    /**
     * @test
     * @cover \AdminWeb\PayerPagSeguro\Http\WebHookController::handle
     */
    public function SendPostData()
    {
        $data = [
            'notificationCode' => '766B9C-AD4B044B04DA-77742F5FA653-E1AB24',
            'notificationType' => 'transaction'
        ];
        $request = Request::create(route('payer_webhook'), 'POST', $data, [], [], [], []);
        $controller = new WebHookControllerStub();
        $response = $controller->handle($request);
        $this->assertEquals($data['notificationCode'], $response['notificationCode']);
    }

    /**
     * @test
     * @cover \AdminWeb\PayerPagSeguro\Http\WebHookController::handle
     */
    public function sendPostDataReveiceXml()
    {
        $data = [
            'notificationCode' => '766B9C-AD4B044B04DA-77742F5FA653-E1AB24',
            'notificationType' => 'transaction'
        ];
        $user = User::create([
            'email' => 'igor@igor.com',
            'name' => 'Igor de Paula',
            'password' => '123'
        ]);
        $item = new Item('Tv', 1, 599);
        $user->createSubscription('teste', $item)->setReference('REF1234')->start();
        $request = Request::create(route('payer_webhook'), 'POST', $data, [], [], [], []);
        $controller = new WebHookControllerStub();
        $controller->handleXml($request);
        $sub = Subscription::where('reference_id','REF1234')->get()->first();
        $status = $sub->status;
        $this->assertEquals(PaidState::STATE, $status::STATE);
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
