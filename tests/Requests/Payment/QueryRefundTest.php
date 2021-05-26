<?php declare(strict_types=1);


namespace Tests\Requests\Payment;


use BytedanceMiniApp\Handlers\Payment\Requests\CreateRefund\CreateRefundResponse;
use BytedanceMiniApp\Handlers\Payment\Requests\QueryRefund\QueryRefundResponse;
use BytedanceMiniApp\Kernel\Http\HttpClient;
use Tests\TestCase;

class QueryRefundTest extends TestCase
{
    public function testQueryRefund(): void
    {
        $http = $this->createMock(HttpClient::class);
        $http->expects($this->any())
            ->method('post')
            ->will(
                $this->returnValue(
                    [
                        "err_no" => 0,
                        "err_tips" => "",
                        "refundInfo" => [
                            'refund_no' => '6966590880278956329',
                            'refund_amount' => 100,
                            'refund_status' => 'SUCCESS',
                        ],
                    ]
                )
            );

        $response = $this->mockApp($http)->payment->queryRefund(
            '123456789'
        );

        $this->assertInstanceOf(QueryRefundResponse::class, $response);
        $this->assertNotEmpty($response->refundNo);
        $this->assertNotEmpty($response->refundAmount);
        $this->assertNotEmpty($response->refundStatus);
    }
}