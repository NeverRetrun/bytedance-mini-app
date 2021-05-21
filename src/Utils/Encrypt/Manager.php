<?php declare(strict_types=1);


namespace BytedanceMiniApp\Utils\Encrypt;


use BytedanceMiniApp\Utils\Encrypt\Mobile\DecryptedMobile;
use BytedanceMiniApp\Utils\Encrypt\Mobile\MobileEncryptor;

/**
 * @method DecryptedMobile mobile(string $sessionKey, string $iv, string $encrypted)
 * @package BytedanceMiniApp\Utils\Encrypt
 */
class Manager extends \BytedanceMiniApp\Kernel\Manager
{
    public function getClassMap(): array
    {
        return [
            'mobile' => MobileEncryptor::class,
        ];
    }
}