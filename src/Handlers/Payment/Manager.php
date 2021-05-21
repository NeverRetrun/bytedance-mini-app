<?php declare(strict_types=1);


namespace BytedanceMiniApp\Handlers\Payment;

use BytedanceMiniApp\Handlers\Payment\Requests\CreateOrder\CreateOrderRequest;
use BytedanceMiniApp\Handlers\Payment\Requests\CreateOrder\CreateOrderResponse;
use BytedanceMiniApp\Handlers\Payment\Requests\QueryOrder\QueryOrderRequest;
use BytedanceMiniApp\Handlers\Payment\Requests\QueryOrder\QueryOrderResponse;

/**
 * @method CreateOrderResponse createOrder(string $outOrderNo, int $totalAmount, string $subject, string $body, int $validTimestamp, ?string $cpExtra = null, ?string $notifyUrl = null, ?string $thirdPartyId = null, ?int $disableMsg = null, ?string $msgPage = null, ?string $storeUid = null)
 * @method QueryOrderResponse queryOrder(string $outOrderNo, ?string $thirdPartyId = null)
 * @package BytedanceMiniApp\Handlers\Payment
 */
class Manager extends \BytedanceMiniApp\Kernel\Manager
{
    public function getClassMap(): array
    {
        return [
            'createOrder' => CreateOrderRequest::class,
            'queryOrder' => QueryOrderRequest::class,
        ];
    }
}