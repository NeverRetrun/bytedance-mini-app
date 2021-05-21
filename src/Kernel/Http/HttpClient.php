<?php declare(strict_types=1);


namespace BytedanceMiniApp\Kernel\Http;


use Psr\Http\Client\ClientInterface;

class HttpClient
{
    /**
     * get request
     * @param string $uri
     * @param array $queries
     * @param array $headers
     * @return string
     */
    public function get(string $uri, array $queries = [], array $headers = []): array
    {
        $ch = curl_init();
        $query = http_build_query($queries);
        curl_setopt($ch, CURLOPT_URL, "$uri?$query");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $output = curl_exec($ch);
        curl_close($ch);

        return json_decode($output, true);
    }

    /**
     * post request
     * @param string $uri
     * @param array $params
     * @param array $headers
     * @return string
     */
    public function post(string $uri, array $params = [], array $headers = []): array
    {
        $headers[] = 'content-type: application/json';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $uri);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));

        $output = curl_exec($ch);
        curl_close($ch);

        return json_decode($output, true);
    }
}