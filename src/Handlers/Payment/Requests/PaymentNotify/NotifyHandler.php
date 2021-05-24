<?php declare(strict_types=1);


namespace BytedanceMiniApp\Handlers\Payment\Requests\PaymentNotify;


use BytedanceMiniApp\Kernel\Exceptions\InvalidSignatureException;
use BytedanceMiniApp\Kernel\Handler;
use BytedanceMiniApp\Support\PaymentNotifySignature;

class NotifyHandler extends Handler
{
    protected function getParamNameWithDefault(): array
    {
        return [];
    }

    public function process($arguments)
    {
        $isValid = PaymentNotifySignature::valid($arguments['msg_signature'], $arguments, $this->config->token);
        if ($isValid === false) {
            throw new InvalidSignatureException();
        }

        return PaymentNotify::createFromResponse($arguments);
    }
}