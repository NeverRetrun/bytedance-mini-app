<?php declare(strict_types=1);


namespace Tests\Requests\Payment;


use BytedanceMiniApp\Handlers\Payment\Requests\PaymentNotify\PaymentNotify;
use Tests\TestCase;

class NotifyTest extends TestCase
{
    public function notifyProvider(): array
    {
        return [
            [
                "msg_signature" => "a849d60b55087faa6477c8769f566f18f3959b7f",
                "type" => "payment",
                "timestamp" => "1621835402",
                "nonce" => "3054",
                "msg" => '{"appid":"tt8cfcfa4113c4608d","cp_orderno":"2021052413494332718471704788","cp_extra":"","way":"1","channel_no":"4342701106202105247096818528","channel_gateway_no":"12105240090525031699","payment_order_no":"4342701106202105247096818528","out_channel_order_no":"","total_amount":100}'
            ],
        ];
    }

    /**
     * @dataProvider notifyProvider
     * @param array $notify
     */
    public function testNotify(array $notify)
    {
        $response = $this->app->payment->notify($notify);

        $this->assertInstanceOf(PaymentNotify::class, $response);
        $this->assertNotEmpty($response->cpOrderNo);
    }

    public function testNotifySuccess()
    {
        $notify = new PaymentNotify(
            '',
            '',
            '',
            '',
        );

        $this->assertEquals(
            [
                "err_no" => 0,
                "err_tips" => "success",
            ],
            $notify->toSuccessResponse()
        );
    }
}