<?php

namespace App\Http\API;

use Log;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class MKElectroApi
{
    const ENDPOINT_PUBLIC = "http://mc-api";

    public function getCategorySub()
    {
        return $this->request("post", "", [
            "type" => "get_category_sub"
        ]);
    }

    public function getCategories()
    {
        return $this->request("post", "", [
            "type" => "get_categories"
        ]);
    }

    public function getPoints()
    {
        return $this->request("post", "", [
            "type" => "get_points"
        ]);
    }

    public function getProducts($limit, $offset)
    {
        return $this->request("post", "", [
            "type" => "get_products",
            "limit" => $limit,
            "offset" => $offset,
        ]);
    }

    private function request($method, $url, $parameters = [])
    {
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request(
                $method,
                self::ENDPOINT_PUBLIC . "/" . $url,
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
            $res = $response->getBody()->getContents();
            dump($res);
            $responseJSON = json_decode($res, true);
            return $responseJSON;
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $body = $response->getBody()->getContents();

                Log::debug($body);
            } else {
                Log::debug($e->getMessage());
            }

            return null;
        }
    }
}
