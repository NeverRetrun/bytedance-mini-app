## Bytedance Mini App SDK

---

今日头条小程序SDK

### Requirement

---

* PHP >= 7.4
* [Composer](https://getcomposer.org/)

### Installation

---

```shell
 $ composer require cvoid/bytedance-mini-app -vvv
```
### Features

---

|  api   | 实现  |  是否完成  |
|  ----  | ----  | ----  |
| getAccessToken  | login->getAccessToken() | ☑️ |
| 登录 - code2Session  | login->code2Session() | ☑️ |
| 数据缓存 - setUserStorage  |  | |
| 数据缓存 - removeUserStorage  |  | |
| 创建二维码 - createQRCode  |  | |
| 内容安全检测|  | |
| 图片检测 V2|  | |
| 订阅消息推送 |  | |
| 服务端预下单 | payment->createOrder | ☑️ |
| 服务端支付回调 | payment->notify | ☑️ |
| 订单查询| payment->queryOrder | ☑️ |
| 退款| payment->createRefund | ☑️|
| 退款回调| payment->refundNotify | ☑️|
| 查询退款| payment->queryRefund | ☑️|
| 分账| | |
| 分账回调| | |
| 查询分账| | |
| 服务商进件| | |
| 分账方进件| | |

### Usage

---

```php
require 'vendor/autoload.php';

$app = new \BytedanceMiniApp\BytedanceMiniApp('appId', 'secret', 'salt', 'token');

$response = $app
    ->login
    ->accessToken();

var_dump($response);

```

### License

----

MIT