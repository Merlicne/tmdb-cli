<?php

namespace App;

use GuzzleHttp\Client;


class TmdbClient 
{
    private $url;
    private $imageBaseUrl;
    private $apiKey;
    private $client;

    public function __construct($url, $apiKey, $imageBaseUrl)
    {
        $this->url = $url;
        $this->apiKey = $apiKey;
        $this->imageBaseUrl = $imageBaseUrl;
        $this->client = new Client();
    }

    public function get($path, $params = [])
    {
        $response = $this->client->request("GET", $this->url . $path, [
            // "query" => $params,
            "headers" => [
                "Authorization" => "Bearer " . $this->apiKey,
                "Accept" => "application/json",
            ]
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new \Exception("Error " . $response->getStatusCode() . " " . $response->getReasonPhrase() . "\n" .
                "\tURL: " . $this->url . $path . "\n" .
                "\tParams: " . json_encode($params) . "\n" .
                "\tResponse: " . $response->getBody()->getContents());
        }

        return json_decode($response->getBody()->getContents());
    }

    public function post($path, $params = [])
    {
        $response = $this->client->request("POST", $this->url . $path, [
            "form_params" => array_merge($params, ["api_key" => $this->apiKey]),
            "headers" => [
                "Authorization" => "Bearer " . $this->apiKey,
                "Accept" => "application/json",
            ]
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new \Exception("Error " . $response->getStatusCode() . " " . $response->getReasonPhrase() . "\n" .
                "\tURL: " . $this->url . $path . "\n" .
                "\tParams: " . json_encode($params) . "\n" .
                "\tResponse: " . $response->getBody()->getContents());
        }

        return json_decode($response->getBody()->getContents());
    }

    public function delete($path, $params = [])
    {
        $response = $this->client->request("DELETE", $this->url . $path, [
            "query" => array_merge($params, ["api_key" => $this->apiKey]),
            "headers" => [
                "Authorization" => "Bearer " . $this->apiKey,
                "Accept" => "application/json",
            ]
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new \Exception("Error " . $response->getStatusCode() . " " . $response->getReasonPhrase() . "\n" .
                "\tURL: " . $this->url . $path . "\n" .
                "\tParams: " . json_encode($params) . "\n" .
                "\tResponse: " . $response->getBody()->getContents());
        }

        return json_decode($response->getBody()->getContents());
    }

    public function getImageUrl($path, $size = "original")
    {
        return $this->imageBaseUrl . "/" . $size . "/" . $path;
    }


}
