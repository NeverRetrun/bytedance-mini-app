<?php declare(strict_types=1);


namespace BytedanceMiniApp\Utils\Encrypt\Mobile;


use BytedanceMiniApp\Kernel\HandlerInterface;
use BytedanceMiniApp\Utils\Encrypt\Encryptor;

class MobileEncryptor implements HandlerInterface
{
    protected Encryptor $encryptor;

    public function __construct()
    {
        $this->encryptor = new Encryptor();
    }

    public function handle(...$arguments)
    {
        return $this->decrypt(...$arguments);
    }

    /**
     * 解密手机数据
     * @param string $sessionKey
     * @param string $iv
     * @param string $encrypted
     * @return DecryptedMobile
     * @throws \BytedanceMiniApp\Kernel\Exceptions\DecryptException
     */
    public function decrypt(
        string $sessionKey,
        string $iv,
        string $encrypted
    ): DecryptedMobile
    {
        return DecryptedMobile::createFromArray(
            $this->encryptor->decrypt(
                $sessionKey,
                $iv,
                $encrypted
            )
        );
    }
}