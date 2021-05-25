<?php declare(strict_types=1);


namespace BytedanceMiniApp\Handlers\Payment\Requests\QueryRefund;


use BytedanceMiniApp\Kernel\Http\Response;

class QueryRefundResponse extends Response
{
    const SUCCESS = 'SUCCESS';
    const FAIL = 'FAIL';

    public string $refundNo;

    public int $refundAmount;

    public string $refundStatus;

    public function __construct(
        string $refundNo,
        int $refundAmount,
        string $refundStatus
    )
    {
        $this->refundNo     = $refundNo;
        $this->refundAmount = $refundAmount;
        $this->refundStatus = $refundStatus;
    }

    public static function createFromArray(array $array)
    {
        return new static(
            $array['refundInfo']['refund_no'],
            $array['refundInfo']['refund_amount'],
            $array['refundInfo']['refund_status'],
        );
    }

    public function isSuccess(): bool
    {
        return $this->refundStatus === self::SUCCESS;
    }
}