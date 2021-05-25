<?php declare(strict_types=1);


namespace BytedanceMiniApp\Handlers\Payment\Requests\CreateRefund;


use BytedanceMiniApp\Kernel\Http\Response;

class CreateRefundResponse extends Response
{
    public string  $refundNo;

    public function __construct(string $refundNo)
    {
        $this->refundNo = $refundNo;
    }

    public static function createFromArray(array $array)
    {
        return new static($array['refund_no']);
    }
}