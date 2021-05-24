<?php declare(strict_types=1);


namespace Tests\Requests\Payment;


use BytedanceMiniApp\Handlers\Payment\Requests\CreateOrder\CreateOrderResponse;
use Tests\TestCase;

class CreateOrderTest extends TestCase
{
    public function testCreteOrder(): void
    {
        $response = $this->app->payment->createOrder(
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