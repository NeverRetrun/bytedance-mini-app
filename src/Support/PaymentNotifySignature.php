<?php declare(strict_types=1);


namespace BytedanceMiniApp\Support;


class PaymentNotifySignature
{
    /**
     * signature is valid
     * @param string $signature
     * @param array $notify
     * @param string $token
     * @return bool
     */
    public static function valid(string $signature, array $notify, string $token): bool
    {
        return $signature === self::signature($notify, $token);
    }

    /**
     * payment notify signature
     * @param array $notify
     * @param string $token
     * @return string
     */
    public static function signature(array $notify, string $token): string
    {
        $sortedString = [
            $token,
            $notify['timestamp'],
            $notify['nonce'],
            $notify['msg'] ?? '',
        ];
        sort($sortedString);
        return sha1(implode('', $sortedString));
    }
}