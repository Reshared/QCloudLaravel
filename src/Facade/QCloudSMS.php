<?php

namespace Ruishuang\QCloudLaravel\Facade;

use Illuminate\Support\Facades\Facade;
use Ruishuang\QCloudLaravel\QCloud\Client;

/**
 * Class QCloudSMS
 * @package Ruishuang\QCloudLaravel\Facade
 * @method static \Qcloud\Sms\SmsSingleSender SmsSingleSender()
 * @method static \Qcloud\Sms\SmsMultiSender SmsMultiSender()
 * @method static \Qcloud\Sms\SmsVoiceVerifyCodeSender SmsVoiceVerifyCodeSender()
 * @method static \Qcloud\Sms\SmsVoicePromptSender SmsVoicePromptSender()
 * @method static \Qcloud\Sms\SmsStatusPuller SmsStatusPuller()
 * @method static \Qcloud\Sms\SmsMobileStatusPuller SmsMobileStatusPuller()
 * @method static \Qcloud\Sms\VoiceFileUploader VoiceFileUploader()
 * @method static \Qcloud\Sms\FileVoiceSender FileVoiceSender()
 * @method static \Qcloud\Sms\TtsVoiceSender TtsVoiceSender()
 */
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
