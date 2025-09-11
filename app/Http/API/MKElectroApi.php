<?php

namespace App\Http\API;

use Log;
use GuzzleHttp\Client;

class MKElectroApi
{
    const ENDPOINT_PUBLIC = "http://mc-api";

    public function getPoints()
    {
        return $this->request("post", "",[
            "type" => "get_points"
        ]);
    }

    private function request($method, $url, $parameters = [])
    {
        try
        {
            $client = new \GuzzleHttp\Client();
            $response = $client->request($method, self::ENDPOINT_PUBLIC."/".$url,
                ($method == "get" ?
                    [
                        'headers' => [
                            'X-API-Key' => env("MK_ELECTRO_KEY"),
                        ],
                        'query' => $parameters
                    ] :
                    [
                        'headers' => [
                            'X-API-Key' => env("MK_ELECTRO_KEY"),
                            'Content-Type' => 'application/json',
                        ],
                        'body' => json_encode($parameters)
                    ]
                )
            );

            $responseJSON = json_decode($response->getBody()->getContents(), true);
            return $responseJSON;
        }
        catch(\Exception $e){
            Log::debug($e->getMessage());
            return null;
        }
    }
}
