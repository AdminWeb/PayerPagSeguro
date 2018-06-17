<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 17/06/18
 * Time: 17:35
 */
namespace AdminWeb\PayerPagSeguro\Tests;
use AdminWeb\Payer\Itemable\ItemList;
use \Orchestra\Testbench\TestCase;

use AdminWeb\PayerPagSeguro\Tests\Fixtures\User;

use AdminWeb\Payer\Itemable\Item;
class SubscriptionTest extends TestCase
{


    /**
     * @covers \AdminWeb\PayerPagSeguro\Subscription
     * @expectedException \GuzzleHttp\Exception\ClientException
     */
    public function testRedirect()
    {
        $user = User::create([
            'email' => 'igor@igor.com',
            'name' => 'Igor de Paula',
            'password' => '123'
        ]);
        $item = new Item('Tv', 1, 599);
        $itemlist = new ItemList([$item]);
        $sub = $user->createSubscription('teste', $itemlist)->setReference('REF1234')->start();
        $this->assertTrue($sub->redirect());
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
            \AdminWeb\Payer\PayerServiceProvider::class,
            \AdminWeb\PayerPagSeguro\PayerPagSeguroServiceProvider::class,
        ];
    }
}
