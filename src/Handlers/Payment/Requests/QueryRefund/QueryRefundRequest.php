<?php declare(strict_types=1);


namespace BytedanceMiniApp\Handlers\Payment\Requests\QueryRefund;


use BytedanceMiniApp\Handlers\Payment\Requests\QueryOrder\QueryOrderResponse;
use BytedanceMiniApp\Kernel\Http\Request;
use BytedanceMiniApp\Kernel\Http\Response;
use BytedanceMiniApp\Utils\Encrypt\Payment\RequestSigner;

class QueryRefundRequest extends Request
{
    protected function getParamNameWithDefault(): array
    {
        return [
            [
                'name' => 'outRefundNo',
                'default' => '',
            ],
            [
                'name' => 'thirdpartyId',
                'default' => null,
            ]
        ];
    }

    public static function format(array $response): Response
    {
        return QueryOrderResponse::createFromArray($response);
    }

    public function sendRequest($arguments): array
    {
        [
            $outRefundNo,
            $thirdpartyId,
        ] = $arguments;

        $params = [
            'app_id' => $this->config->appId,
            'out_refund_no' => $outRefundNo,
            'thirdparty_id' => $thirdpartyId,
        ];

        $params = array_filter($params);
        $params['sign'] = RequestSigner::signature($params, $this->config->salt);

        return $this->http->post(
            'https://developer.toutiao.com/api/apps/ecpay/v1/query_refund',
            $params
        );
    }
}