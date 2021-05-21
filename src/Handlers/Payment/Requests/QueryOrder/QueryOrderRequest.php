<?php declare(strict_types=1);


namespace BytedanceMiniApp\Handlers\Payment\Requests\QueryOrder;


use BytedanceMiniApp\Kernel\Http\Request;
use BytedanceMiniApp\Kernel\Http\Response;
use BytedanceMiniApp\Utils\Encrypt\Payment\RequestSigner;

class QueryOrderRequest extends Request
{
    public function format(array $response): Response
    {
        return QueryOrderResponse::createFromArray($response);
    }

    public function sendRequest($arguments): array
    {
        [$outOrderNo, $thirdPartyId] = $arguments;
        $result = [
            'app_id' => $this->config->appId,
            'out_order_no' => $outOrderNo,
            'thirdparty_id' => $thirdPartyId,
        ];
        $result = array_filter($result);
        $result['sign'] = RequestSigner::signature($result, $this->config->secret);

        return $this->http->post(
            'https://developer.toutiao.com/api/apps/ecpay/v1/query_order',
            $result
        );
    }
}