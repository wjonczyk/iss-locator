<?php
namespace Application\Iss\Client;

use Application\Lib\ApiCurlClient;

class IssCurlClient implements IssClientInterface
{   
    private $curlClient;
    private $baseUrl;
    
    public function __construct(ApiCurlClient $client, $baseUrl)
    {
        $this->curlClient = $client;
        $this->baseUrl = $baseUrl;
    }

    public function getSatellites()
    {
        $response = $this->curlClient->call($this->baseUrl, []);
        return json_decode($response, true);
    }
    
    public function getSatelliteById($id)
    {
        $response = $this->curlClient->call($this->baseUrl . '/' . $id, []);
        return json_decode($response, true);
    }
}

