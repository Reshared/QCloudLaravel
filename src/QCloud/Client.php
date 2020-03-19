<?php

namespace Ruishuang\QCloudLaravel\QCloud;

use Illuminate\Contracts\Container\BindingResolutionException;

class Client
{
    protected $appId;
    protected $appKey;

    public function __construct($appId, $appKey)
    {
        $this->appId = $appId;
        $this->appKey = $appKey;
    }

    public function __call($method, $params)
    {
        try {
            return app()->make("\\Qcloud\\Sms\\{$method}",
                [
                    'appid' => $this->appId,
                    'appkey' => $this->appKey,
                ]
            );
        } catch (BindingResolutionException $e) {
            throw new \RuntimeException($e->getMessage());
        } catch (\Exception $e) {
            throw new \RuntimeException($e->getMessage());
        }
    }
}
