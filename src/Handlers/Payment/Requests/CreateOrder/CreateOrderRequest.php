<?php declare(strict_types=1);

namespace BytedanceMiniApp\Handlers\Payment\Requests\CreateOrder;

use BytedanceMiniApp\Kernel\Http\Request;
use BytedanceMiniApp\Kernel\Http\Response;
use BytedanceMiniApp\Utils\Encrypt\Payment\RequestSigner;

class CreateOrderRequest extends Request
{
    public function format(array $response): Response
    {
        return CreateOrderResponse::createFromArray($response);
    }

    public function sendRequest(...$arguments): array
    {
        [
            $outOrderNo,
            $totalAmount,
            $subject,
            $body,
            $validTimestamp,
            $cpExtra,
            $notifyUrl,
            $thirdPartyId,
            $disableMsg,
            $msgPage,
            $storeUid
        ] = $arguments;

        $params = [
            'app_id' => $this->config->appId,
            'out_order_no' => $outOrderNo,
            'total_amount' => $totalAmount,
            'subject' => $subject,
            'body' => $body,
            'valid_time' => $validTimestamp,
            'cp_extra' => $cpExtra,
            'notify_url' => $notifyUrl,
            'thirdparty_id' => $thirdPartyId,
            'disable_msg' => $disableMsg,
            'msg_page' => $msgPage,
            'store_uid' => $storeUid
        ];

        $params = array_filter($params);
        $params['sing'] = RequestSigner::signature($params, $this->config->secret);
        return $this->http->post(
            'https://developer.toutiao.com/api/apps/ecpay/v1/create_order',
            $params
        );
    }
}