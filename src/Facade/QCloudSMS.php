<?php

namespace Ruishuang\QCloudLaravel\Facade;

use Illuminate\Support\Facades\Facade;
use Ruishuang\QCloudLaravel\QCloud\Client;

class QCloudSMS extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor()
    {
        return Client::class;
    }
}
