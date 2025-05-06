<?php

namespace App\Http\API\Delivery;

use Log;
use GuzzleHttp\Client;

class CDEKDeliveryApi
{
    const ENDPOINT = "https://api.cdek.ru/v2/";

    private $token = null, $account, $password;
    public function __construct()
    {
        $this->account = env("CDEK_DELIVERY_ACCOUNT");
        $this->password = env("CDEK_DELIVERY_PASSWORD");
        $this->token = $this->auth();
    }

    public function getCities($data = [])
    {
        return $this->request("get", "location/cities", $data);
    }

    public function auth()
    {
        // 60 минут, но 1 запрос
        try
        {
            $client = new \GuzzleHttp\Client();
            $response = $client->request("post", self::ENDPOINT."oauth/token?parameters",
                    [
                        'headers' => [
                            'Content-Type' => 'application/x-www-form-urlencoded',
                        ],
                        'form_params' => [
                            "grant_type" => "client_credentials",
                            "client_id" => $this->account,
                            "client_secret" => $this->password
                        ]
                    ]
            );


            $responseJSON = json_decode($response->getBody(), true);
            return $responseJSON["access_token"];
        }
        catch(\Exception $e){
            Log::debug("Auth ".$e->getMessage());
            return null;
        }
    }

    private function request($method, $url, $parameters = [])
    {
        try
        {
            $client = new \GuzzleHttp\Client();
            $response = $client->request($method, self::ENDPOINT.$url,
                ($method == "get" || $method == "delete" ?
                    [
                        'query' => $parameters,
                        'headers' => ($this->token ? [
                            'Authorization' => 'Bearer ' . $this->token,
                        ] : []),
                    ] :
                    [
                        'headers' => ($this->token ? [
                            'Content-Type' => 'application/json',
                            'Authorization' => 'Bearer ' . $this->token,
                        ] : [
                            'Content-Type' => 'application/json',
                        ]),
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
