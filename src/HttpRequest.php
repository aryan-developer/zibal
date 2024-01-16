<?php
namespace Aryandev\zibal;

class HttpRequest
{
    /**
     * @var string
     */
    public static string $JSON_CONTENT_TYPE = "application/json";
    /**
     * @var string
     */
    public static string $URL_ENCODED_CONTENT_TYPE = "application/x-www-form-urlencoded";

    /**
     * @param string $url
     * @param array $headers
     * @param mixed $data
     * @return bool|string
     */
    public static function post(string $url, array $headers = [], mixed $data = ''): bool|string
    {
        return self::endpoint($url, true, $headers, $data);
    }

    /**
     * @param string $url
     * @param array $headers
     * @param mixed $data
     * @return bool|string
     */
    public static function get(string $url, array $headers = [], mixed $data = ''): bool|string
    {
        return self::endpoint($url, false, $headers, $data);
    }

    /**
     * @param array $value
     * @return bool|string
     */
    public static function arrayToJson(array $value): bool|string
    {
        return json_encode($value);
    }

    /**
     * @param array $value
     * @return bool|string
     */
    public static function arrayToUrlEncode(array $value): bool|string
    {
        return http_build_query($value);
    }

    /**
     * @param string $url
     * @param $post
     * @param array $headers
     * @param mixed $data
     * @return bool|string
     */
    private static function endpoint(string $url,bool $post = false, array $headers = [], mixed $data = ''): bool|string
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, $post);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        if ($data) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        $resp = curl_exec($curl);
        curl_close($curl);
        return $resp;
    }
}