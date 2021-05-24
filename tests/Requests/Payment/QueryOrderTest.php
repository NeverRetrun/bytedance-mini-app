<?php declare(strict_types=1);


namespace Tests\Requests\Payment;


use BytedanceMiniApp\Handlers\Payment\Requests\QueryOrder\QueryOrderResponse;
use Tests\TestCase;

class QueryOrderTest extends TestCase
{
    public function testQueryOrder()
    {
        $response = $this->app->payment->queryOrder('123456');

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