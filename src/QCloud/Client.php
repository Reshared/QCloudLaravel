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

    public function _get($class)
    {
        try {
            return app()->make("\Qcloud\Sms\{$class}", [$this->appId, $this->appKey]);
        } catch (BindingResolutionException $e) {
            throw new \RuntimeException($e->getMessage());
        } catch (\Exception $e) {
            throw new \RuntimeException($e->getMessage());
        }
    }
}
