<?php

namespace Aryandev\zibal;

class Zibal
{
    /**
     * @var string
     */
    private string $merchant;
    /**
     * @var string
     */
    private string $callbackUrl;

    private string $endpointUrl = "https://gateway.zibal.ir/";

    public function __construct($merchant, $callbackUrl)
    {
        $this->setMerchant($merchant);
        $this->setCallbackUrl($callbackUrl);
    }

    /**
     * @param int $amount
     * @param array $optionalData
     * @param bool $redirect
     * @return mixed|void
     * @throws ZibalException
     */
    public function request(int $amount, array &$optionalData = [], bool $redirect = false)
    {
        $optionalData['merchant'] = $this->getMerchant();
        $optionalData['amount'] = $amount;
        $optionalData['callbackUrl'] = $this->getCallbackUrl();
        $response = json_decode(HttpRequest::post("{$this->endpointUrl}v1/request", ["content-type:" . HttpRequest::$JSON_CONTENT_TYPE], json_encode($optionalData)));
        if ($response->result == 100) {
            if ($redirect) {
                $startGateWayUrl = "{$this->endpointUrl}start/{$response->trackId}";
                header('location: ' . $startGateWayUrl);
            } else {
                return $response;
            }
        } else {
            throw new ZibalException($response);
        }
    }

    /**
     * @param int $trackId
     * @return mixed
     */
    public function verify(int $trackId)
    {
        $response = json_decode(
            HttpRequest::post(
                "{$this->endpointUrl}v1/verify",
                [
                    HttpRequest::$JSON_CONTENT_TYPE
                ],
                [
                    'merchant' => $this->getMerchant(),
                    'trackId' => $trackId
                ]
            )
        );
        if ($response->result == 100) {
            return $response;
        } else {
            throw new ZibalException($response);
        }
    }

    /**
     * @return string
     */
    public function getMerchant(): string
    {
        return $this->merchant;
    }

    /**
     * @param string $merchant
     */
    public function setMerchant(string $merchant): void
    {
        $this->merchant = $merchant;
    }

    /**
     * @return string
     */
    public function getCallbackUrl(): string
    {
        return $this->callbackUrl;
    }

    /**
     * @param string $callbackUrl
     */
    public function setCallbackUrl(string $callbackUrl): void
    {
        $this->callbackUrl = $callbackUrl;
    }
}