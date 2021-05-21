<?php declare(strict_types=1);


namespace BytedanceMiniApp\Handlers\Payment\Requests\CreateOrder;


use BytedanceMiniApp\Kernel\Http\Response;

class CreateOrderResponse extends Response
{
    /**
     * @var string
     */
    public string $orderId;

    /**
     * @var string
     */
    public string $orderToken;

    public function __construct(
        string $orderId,
        string $orderToken
    )
    {
        $this->orderId = $orderId;
        $this->orderToken = $orderToken;
    }

    public static function createFromArray(array $array)
    {
        return new static($array['order_id'], $array['order_token']);
    }
}