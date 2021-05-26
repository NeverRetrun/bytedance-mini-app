<?php declare(strict_types=1);


namespace Tests\Requests\Payment;


use BytedanceMiniApp\Handlers\Payment\Requests\QueryOrder\QueryOrderResponse;
use BytedanceMiniApp\Kernel\Http\HttpClient;
use Tests\TestCase;

class QueryOrderTest extends TestCase
{
    public function testQueryOrder()
    {
        $http = $this->createMock(HttpClient::class);
        $http->expects($this->any())
            ->method('post')
            ->will(
                $this->returnValue(
                    [
                        "err_no" => 0,
                        "err_tips" => '',
                        "out_order_no" => "123",
                        "order_id" => "6965667405611714820",
                        "payment_info" => [
                            "total_fee" => 100,
                            "order_status" => "PROCESSING",
                            "pay_time" => '',
                            "way" => 0,
                            "channel_no" => '',
                            "channel_gateway_no" => '',
                        ]
                    ]
                )
            );


        $response = $this->mockApp($http)->payment->queryOrder('123456');

        $this->assertInstanceOf(QueryOrderResponse::class, $response);
        $this->assertNotEmpty($response->orderStatus);
    }

    public function testQueryOrderSuccess()
    {
        $new = new QueryOrderResponse(
            1,
            QueryOrderResponse::SUCCESS,
            '',
            1,
            '',
            ''
        );

        $this->assertTrue($new->isSuccess());
    }
}