<?php declare(strict_types=1);


namespace Tests\Requests\Payment;


use BytedanceMiniApp\Handlers\Payment\Requests\CreateOrder\CreateOrderResponse;
use BytedanceMiniApp\Handlers\Payment\Requests\CreateRefund\CreateRefundResponse;
use BytedanceMiniApp\Kernel\Http\HttpClient;
use Tests\TestCase;

class CreateRefundTest extends TestCase
{
    public function testCreateRefund(): void
    {
        $http = $this->createMock(HttpClient::class);
        $http->expects($this->any())
            ->method('postWithPaymentSignature')
            ->will(
                $this->returnValue(
                    [
                        "err_no" => 0,
                        "err_tips" => "",
                        "refund_no" => "6966590880278956329",
                    ]
                )
            );

        $response = $this->mockApp($http)->payment->createRefund(
            '2021052413494332718471704788',
            '123456789',
            100,
            '测试'
        );

        $this->assertInstanceOf(CreateRefundResponse::class, $response);
        $this->assertNotEmpty($response->refundNo);
    }
}