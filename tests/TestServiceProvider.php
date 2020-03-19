<?php

namespace Ruishuang\QCloudLaravel\Tests;

use Ruishuang\QCloudLaravel\QCloud\Client;

class TestServiceProvider extends AbstractTestCase
{
    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('qcloud_sms.app_id', 'my_app_id');
        $app['config']->set('qcloud_sms.app_key', 'my_app_key');
    }

    /**
     * Test that we can create the Nexmo client
     * from container binding.
     *
     * @return void
     */
    public function testClientResolutionFromContainer()
    {
        $client = app(Client::class);

        $this->assertInstanceOf(Client::class, $client);
    }
}
