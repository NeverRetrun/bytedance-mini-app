<?php declare(strict_types=1);


namespace BytedanceMiniApp\Handlers\Payment;

use BytedanceMiniApp\Handlers\Payment\Requests\CreateOrder\CreateOrderRequest;
use BytedanceMiniApp\Handlers\Payment\Requests\CreateOrder\CreateOrderResponse;
use BytedanceMiniApp\Handlers\Payment\Requests\CreateRefund\CreateRefundRequest;
use BytedanceMiniApp\Handlers\Payment\Requests\CreateRefund\CreateRefundResponse;
use BytedanceMiniApp\Handlers\Payment\Requests\PaymentNotify\NotifyHandler;
use BytedanceMiniApp\Handlers\Payment\Requests\PaymentNotify\PaymentNotify;
use BytedanceMiniApp\Handlers\Payment\Requests\PaymentNotifyFactory;
use BytedanceMiniApp\Handlers\Payment\Requests\QueryOrder\QueryOrderRequest;
use BytedanceMiniApp\Handlers\Payment\Requests\QueryOrder\QueryOrderResponse;
use BytedanceMiniApp\Handlers\Payment\Requests\QueryRefund\QueryRefundRequest;
use BytedanceMiniApp\Handlers\Payment\Requests\QueryRefund\QueryRefundResponse;
use BytedanceMiniApp\Handlers\Payment\Requests\RefundNotify\RefundNotify;

/**
 * @method CreateOrderResponse createOrder(string $outOrderNo, int $totalAmount, string $subject, string $body, int $validTimestamp, ?string $cpExtra = null, ?string $notifyUrl = null, ?string $thirdPartyId = null, ?int $disableMsg = null, ?string $msgPage = null, ?string $storeUid = null)
 * @method QueryOrderResponse queryOrder(string $outOrderNo, ?string $thirdPartyId = null)
 * @method QueryRefundResponse queryRefund(string $outRefundNo, ?string $thirdPartyId = null)
 * @method CreateRefundResponse createRefund(string $outOrderNo, string $outRefundNo, int $refundAmount, string $reason, ?string $cpExtra = null, ?string $notifyUrl = null, ?string $thirdPartyId = null, ?int $disableMsg = null, ?string $msgPage = null, ?int $allSettle = null)
 * @method PaymentNotify notify(array $notify)
 * @method RefundNotify refundNotify(array $notify)
 * @package BytedanceMiniApp\Handlers\Payment
 */
class Manager extends \BytedanceMiniApp\Kernel\Manager
{
    protected function getClassMap(): array
    {
        return [
            'createOrder' => CreateOrderRequest::class,
            'queryOrder' => QueryOrderRequest::class,
            'notify' => PaymentNotifyFactory::class,
            'createRefund' => CreateRefundRequest::class,
            'queryRefund' => QueryRefundRequest::class,
            'refundNotify' => PaymentNotifyFactory::class,
        ];
    }
}