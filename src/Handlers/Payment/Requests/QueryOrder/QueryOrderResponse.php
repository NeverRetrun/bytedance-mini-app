<?php declare(strict_types=1);


namespace BytedanceMiniApp\Handlers\Payment\Requests\QueryOrder;


use BytedanceMiniApp\Kernel\Http\Response;

class QueryOrderResponse extends Response
{
    /**
     * 总金额 单位分
     * @var int
     */
    public int $totalFee;

    /**
     * 订单状态
     * @var string
     */
    public string $orderStatus;

    /**
     * 支付时间
     * @var string
     */
    public string $payTime;

    /**
     * way 字段中标识了支付渠道：2-支付宝，1-微信，3-银行卡
     * @var int
     */
    public int $way;

    /**
     * 渠道单号
     * @var string
     */
    public string $channelNo;

    /**
     * 渠道网关号
     * @var string
     */
    public string $channelGatewayNo;

    public function __construct(
        int $totalFee,
        string $orderStatus,
        string $payTime,
        int $way,
        string $channelNo,
        string $channelGatewayNo
    )
    {
        $this->totalFee         = $totalFee;
        $this->orderStatus      = $orderStatus;
        $this->payTime          = $payTime;
        $this->way              = $way;
        $this->channelNo        = $channelNo;
        $this->channelGatewayNo = $channelGatewayNo;
    }

    public static function createFromArray(array $array)
    {
        return new static(
            $array["total_fee"],
            $array["order_status"],
            $array["pay_time"],
            $array["way"],
            $array["channel_no"],
            $array["channel_gateway_no"],
        );
    }
}