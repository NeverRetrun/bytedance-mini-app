<?php declare(strict_types=1);


namespace BytedanceMiniApp\Handlers\Payment\Requests;


use BytedanceMiniApp\Handlers\Payment\Requests\PaymentNotify\PaymentNotify;
use BytedanceMiniApp\Handlers\Payment\Requests\RefundNotify\RefundNotify;
use BytedanceMiniApp\Kernel\Exceptions\InvalidClassException;
use BytedanceMiniApp\Kernel\Exceptions\InvalidSignatureException;
use BytedanceMiniApp\Kernel\Handler;
use BytedanceMiniApp\Support\PaymentNotifySignature;

class PaymentNotifyFactory extends Handler
{
    public function process($arguments)
    {
        $arguments = $arguments[0];

        $isValid = PaymentNotifySignature::valid($arguments['msg_signature'], $arguments, $this->config->token);
        if ($isValid === false) {
            throw new InvalidSignatureException();
        }

        $handlers = [
            'payment' => PaymentNotify::class,
            'refund' => RefundNotify::class
        ];

        $handler = $handlers[$arguments['type']] ?? null;

        if ($handler === null) {
            throw new InvalidClassException("invalid notify type - {$arguments['type']}");
        }

        return $handler::createFromResponse($arguments);
    }

    protected function getParamNameWithDefault(): array
    {
        return [];
    }
}