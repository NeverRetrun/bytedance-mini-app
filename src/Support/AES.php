<?php declare(strict_types=1);


namespace BytedanceMiniApp\Support;


class AES
{
    /**
     * aes-128-cbc decrypt
     * @param string $cipherText
     * @param string $key
     * @param string $iv
     * @return string
     */
    public static function decrypt(
        string $cipherText,
        string $key,
        string $iv,
    ): string
    {
        return openssl_decrypt(
            $cipherText,
            'aes-128-cbc',
            $key,
            OPENSSL_RAW_DATA,
            $iv
        );
    }
}