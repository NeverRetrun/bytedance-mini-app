<?php declare(strict_types=1);


namespace Tests\Requests\Payment;


use BytedanceMiniApp\Handlers\Payment\Requests\CreateOrder\CreateOrderResponse;
use BytedanceMiniApp\Kernel\Http\HttpClient;
use Tests\TestCase;

class CreateOrderTest extends TestCase
{
    public function testCreteOrder(): void
    {
        $http = $this->createMock(HttpClient::class);
        $http->expects($this->any())
            ->method('post')
            ->will(
                $this->returnValue(
                    [
                        "err_no" => 0,
                        "err_tips" => "",
                        "data" => [
                            "order_id" => "6819903302604491021",
                            "order_token" => "CgsIARDiDRgBIAEoARJOCkzx9W/IwEXK7vG7HoXQWCDFrTc1/KE+fBUAtpRoKe395MM2VCeIocZtH1mba8CrWethrqwjWRJT3UMCxqOuL7795GstvfF9Xhl29RvqGgA="
                        ]
                    ]
                )
            );

        $response = $this->mockApp($http)->payment->createOrder(
            '123456',
            100,
            '测试标题',
            '测试内容',
            900
        );

        $this->assertInstanceOf(CreateOrderResponse::class, $response);
        $this->assertNotEmpty($response->orderId);
        $this->assertNotEmpty($response->orderToken);
    }
}