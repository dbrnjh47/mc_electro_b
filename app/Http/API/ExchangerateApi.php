<?php

namespace App\Http\API;

use Log;
use GuzzleHttp\Client;

class ExchangerateApi
{
    const ENDPOINT_PUBLIC = "https://v6.exchangerate-api.com/v6/";
    // d7d47edd196f0261129abf2d
    // c3a3384352bc27c0e563b523
    private $secret_key;

    public function __construct()
    {
        $this->secret_key = env("EXCHANGERATE_SECRET_KEY");
    }
    public function getCurrencies()
    {
        return $this->request("get", "latest/RUB");
    }

    private function request($method, $url, $parameters = [])
    {
        try
        {
            $client = new \GuzzleHttp\Client();
            $response = $client->request($method, self::ENDPOINT_PUBLIC.$this->secret_key."/".$url,
                ($method == "get" ?
                    [
                        'query' => $parameters
                    ] :
                    [
                        'headers' => [
                            'Content-Type' => 'application/json',
                        ],
                        'body' => json_encode($parameters)
                    ]
                )
            );

            $responseJSON = json_decode($response->getBody(), true);
            // Log::debug($responseJSON);
            return $responseJSON;
        }
        catch(\Exception $e){
            Log::debug($e->getMessage());
            return null;
        }
    }
}
