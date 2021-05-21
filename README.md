## Bytedance Mini App SDK

---

今日头条小程序SDK

### Requirement

---

* PHP >= 7.2
* [Composer](https://getcomposer.org/)

### Installation

---
> $ composer require cvoid/bytedance-mini-app  -vvv

### Usage

---

```php
require 'vendor/autoload.php';

$app = new \BytedanceMiniApp\BytedanceMiniApp('appId','secret',);

$response = $app
    ->login
    ->accessToken();

var_dump($response);

```

### License

----

MIT